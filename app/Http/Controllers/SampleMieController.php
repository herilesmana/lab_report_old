<?php

namespace App\Http\Controllers;

use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Department;
use App\VariantProduct;
use App\KA;
use App\FC;
use App\SampleMie;
use App\MShift;

class SampleMieController extends Controller
{

    public function input()
    {
        $department = DB::table('m_department')->get();
        $shift = Mshift::all();
        return view('sample_mie.input', ['departments' => $department, 'shift' => $shift]);
    }
    public function index_report()
    {
        return view('sample_mie.report');
    }

    public function generate_report($tanggal)
    {
      $sample_mie = Db::table('t_sample_mie')
                          ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                          ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                          ->select('t_sample_mie.*', 't_fc.labu_isi', 't_fc.labu_awal', 't_fc.nilai as nilai_fc', 't_fc.bobot_sample', 't_ka.w0','t_ka.w1', 't_ka.w2', 't_ka.nilai as nilai_ka')
                          ->where('t_sample_mie.approve', null)
                          ->where('t_sample_mie.tanggal', date('Y-m-d', strtotime($request['tanggal_sample'])))
                          ->get();
      $no = 0;
      $data = array();
      foreach ($sample_mie as $list) {
        $no++;
        $row = array();
        $row[] = $list->mid_product;
        $row[] = $list->bobot_sample;
        $row[] = $list->labu_awal;
        $row[] = $list->labu_isi;
        $row[] = $list->nilai_ka;
        $row[] = $list->w0;
        $row[] = $list->w1;
        $row[] = $list->w2;
        $row[] = $list->nilai_fc;
        $data[] = $row;
      }
      $output = array("data" => $data);
      return response()->json($output);
    }

    public function hasil()
    {
        return view('sample_mie.hasil');
    }

    public function approve(Request $request)
    {
        $sample_mie = SampleMie::find($request['id']);
        $sample_mie->approve = $request['status'];
        if ($request['keterangan']) {
            $sample_mie->keterangan = $request['keterangan'];
        }
        $sample_mie->approver = Auth::user()->nik;
        $sample_mie->approve_date = date('Y-m-d');
        $sample_mie->approve_time = date('H:i:s');
        $sample_mie->update();
        return response()->json(['success' => 1, 'id' => $request['id']], 200);
    }

    public function showHasil()
    {
        $sample_mie = Db::table('t_sample_mie')
                            ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                            ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                            ->select('t_sample_mie.*', 't_fc.labu_isi', 't_fc.labu_awal', 't_fc.nilai as nilai_fc', 't_fc.bobot_sample', 't_ka.w0','t_ka.w1', 't_ka.w2', 't_ka.nilai as nilai_ka')
                            ->where('t_sample_mie.approve', null)
                            ->get();
        $no = 0;
        $data = array();
        foreach ($sample_mie as $list) {
          $no++;
          $row = array();
          $row[] = $list->mid_product;
          $row[] = $list->bobot_sample;
          $row[] = $list->labu_awal;
          $row[] = $list->labu_isi;
          $row[] = $list->nilai_ka;
          $row[] = $list->w0;
          $row[] = $list->w1;
          $row[] = $list->w2;
          $row[] = $list->nilai_fc;
          $row[] = "<div class=\"btn-group\">
                    <a title=\"Approve\" onClick=\"Approve('".$list->id."')\" class=\"btn btn-primary btn-sm text-white\"><i class=\"fa fa-check\"></i></a>
                    <a title=\"Reject\" onClick=\"Reject('".$list->id."')\" class=\"btn btn-danger btn-sm text-white\"><i class=\"fa fa-close\"></i></a>
                    </div>";
          $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }

    public function upload_sample_mie(Request $request)
    {
        $this->validate($request, [
            'sample_mie' => 'required|file|max:2000'
        ]);
        $path = $request->file('sample_mie')->getRealPath();
        $data = Excel::load($path, function($reader) {
                })->toObject();
        if(!empty($data) && $data->count()){
          foreach ($data as $key => $value) {
              if (!empty($value)) {
                  foreach ($value as $d) {
                      $variant_product = VariantProduct::where('name', $d['variant_product'])->first();
                      $response[] = [
                          'bobot_sample' => round($d['bobot_sample'], 4),
                          'labu_awal' => round($d['labu_awal'], 4),
                          'variant_product' => $variant_product->mid,
                          'labu_akhir' => round($d['labu_akhir'], 4),
                          'nilai_fc' => round(( ((float)$d['labu_akhir']-(float)$d['labu_awal'])/(float)$d['bobot_sample'] ) * 100, 2),
                          'cawan_kosong' => round($d['cawan_kosong'], 4),
                          'cawan_dengan_sample' => round($d['cawan_dengan_sample'], 4),
                          'bobot_akhir' => round($d['bobot_akhir'], 4),
                          'nilai_ka' => round(( ( (float)$d['cawan_dengan_sample']-(float)$d['bobot_akhir'] )/( (float)$d['cawan_dengan_sample']-(float)$d['cawan_kosong'] ) )*100, 4),
                      ];
                  }
              }
          }
          return response()->json($response);
        }
    }

    public function store_sample(Request $request)
    {
        $semua_id[] = array();
        for ($i=0; $i <= $request['row']; $i++) {
              // Untuk Id
              $sample = DB::table('t_sample_mie')->orderBy('created_at', 'desc')->orderBy('id', 'desc')->first();
              if (!$sample) {
                  $id = "SMI00000";
              }else{
                  $id = $sample->id;
              }
              $id_angka = (int)substr($id, 3, 5);
              if ($id_angka + 1 >= 1 && $id_angka + 1 < 10) {
                  $id = "SMI0000".($id_angka + 1);
              }elseif ($id_angka + 1 >= 10 && $id_angka + 1 < 100) {
                  $id = "SMI000".($id_angka + 1);
              }elseif ($id_angka + 1 >= 100 && $id_angka + 1 < 1000) {
                  $id = "SMI00".($id_angka + 1);
              }elseif ($id_angka + 1 >= 1000 && $id_angka + 1 < 10000) {
                  $id = "SMI0".($id_angka + 1);
              }elseif ($id_angka + 1 >= 10000 && $id_angka + 1 < 100000) {
                  $id = "SMI".($id_angka + 1);
              }
              // Untuk kebutuhan lain
              $dept_id = $request['department'];
              $mid_product = $request['variant_product_'.$i];
              $sample_date = date('Y-m-d', strtotime($request['tanggal_sample']));
              $input_date = date('Y-m-d');
              $input_time = date('H:i');
              $shift = $request['shift'];
              $created_by = Auth::user()->nik;
              $keterangan = 'created by '.$created_by;
              // Mulai menyimpan
              $sample_mie = new SampleMie;
              $sample_mie->id = $id;
              $sample_mie->dept_id = $dept_id;
              $sample_mie->mid_product = $mid_product;
              $sample_mie->sample_date = $sample_date;
              $sample_mie->input_date = $input_date;
              $sample_mie->input_time = $input_time;
              $sample_mie->shift = $shift;
              $sample_mie->created_by = $created_by;
              $sample_mie->save();
              // Insert ke KA
              $ka = new KA;
              $ka->sample_id = $id;
              $ka->w0 = $request['cawan_kosong_'.$i];
              $ka->w1 = $request['cawan_dengan_sample_'.$i];
              $ka->w2 = $request['bobot_akhir_'. $i];
              $ka->nilai = $request['nilai_ka_'.$i];
              $ka->save();
              // Insert ke FC
              $fc = new FC;
              $fc->sample_id = $id;
              $fc->labu_awal = $request['labu_awal_'.$i];
              $fc->labu_isi = $request['labu_akhir_'.$i];
              $fc->bobot_sample = $request['bobot_sample_'. $i];
              $fc->nilai = $request['nilai_fc_'.$i];
              $fc->save();
              array_push($semua_id, $id);
              if ($i == $request['row']) {
                  return response()->json(['succes' => 1, 'semua_id' => $semua_id], 200);
              }
        }
    }
}
