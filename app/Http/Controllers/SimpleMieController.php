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

class SampleMieController extends Controller
{

    public function input()
    {
        $department = DB::table('m_department')->get();
        return view('sample_minyak.input', ['jam_sample' => $jam_sample, 'departments' => $department]);
    }

    public function hasil()
    {
        return view('sample_minyak.hasil');
    }

    public function approve(Request $request)
    {
        $sample_minyak = SampleMinyak::find($request['id']);
        $sample_minyak->approve = $request['status'];
        if ($request['keterangan']) {
            $sample_minyak->keterangan = $request['keterangan'];
        }
        $sample_minyak->approver = Auth::user()->nik;
        $sample_minyak->approve_date = date('Y-m-d');
        $sample_minyak->approve_time = date('H:i:s');
        $sample_minyak->update();
        return response()->json(['success' => 1, 'id' => $request['id']], 200);
    }

    public function showHasil()
    {
        $sample_minyak = Db::table('t_sample_minyak')
                            ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                            ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                            ->select('t_sample_minyak.*', 't_pv.tangki', 't_pv.volume_titrasi as volume_titrasi_pv', 't_pv.bobot_sample as bobot_sample_pv', 't_pv.normalitas as normalitas_pv', 't_pv.nilai as nilai_pv', 't_ffa.volume_titrasi as volume_titrasi_ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 't_ffa.normalitas as normalitas_ffa', 't_ffa.nilai as nilai_ffa')
                            ->where('t_sample_minyak.approve', null)
                            ->get();
        $no = 0;
        $data = array();
        foreach ($sample_minyak as $list) {
          $no++;
          $row = array();
          $row[] = $list->line_id;
          $row[] = $list->tangki;
          $row[] = $list->mid_product;
          $row[] = $list->volume_titrasi_pv;
          $row[] = $list->bobot_sample_pv;
          $row[] = $list->normalitas_pv;
          $row[] = round($list->nilai_pv, 4);
          $row[] = $list->volume_titrasi_ffa;
          $row[] = $list->bobot_sample_ffa;
          $row[] = $list->normalitas_ffa;
          $row[] = round($list->nilai_ffa, 4);
          $row[] = "<div class=\"btn-group\">
                    <a title=\"Approve\" onClick=\"Approve('".$list->id."')\" class=\"btn btn-primary btn-sm text-white\"><i class=\"fa fa-check\"></i></a>
                    <a title=\"Reject\" onClick=\"Reject('".$list->id."')\" class=\"btn btn-danger btn-sm text-white\"><i class=\"fa fa-close\"></i></a>
                    </div>";
          $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }

    public function upload_sample_proses(Request $request)
    {
        $faktor_pv   = 1000;
        $faktor_ffa  = 25.6;
        $this->validate($request, [
            'minyak_proses' => 'required|file|max:2000'
        ]);
        $path = $request->file('minyak_proses')->getRealPath();
        $data = Excel::load($path, function($reader) {
                })->toObject();
        if(!empty($data) && $data->count()){
          foreach ($data as $key => $value) {
              if (!empty($value)) {
                  foreach ($value as $d) {
                      $variant_product = VariantProduct::where('name', $d['variant_product'])->first();
                      $response[] = [
                          'line' => $d['line'],
                          'tangki' => $d['tangki'],
                          'variant_product' => $variant_product->mid,
                          'volume_pv' => round($d['volume_titrasi_pv'], 2),
                          'bobot_pv' => round($d['bobot_pv'], 4),
                          'normalitas_pv' => round($d['normalitas_pv'], 4),
                          'nilai_pv' => round(((float)$d['volume_titrasi_pv']*(float)$d['normalitas_pv']*(float)$faktor_pv)/(float)$d['bobot_pv'], 2),
                          'volume_ffa' => round($d['volume_titrasi_ffa'], 2),
                          'bobot_ffa' => round($d['bobot_ffa'], 4),
                          'normalitas_ffa' => round($d['normalitas_ffa'], 4),
                          'nilai_ffa' => round(((float)$d['volume_titrasi_ffa']*(float)$d['normalitas_ffa']*(float)$faktor_ffa)/(float)$d['bobot_ffa'], 4),
                      ];
                  }
              }
          }
          return response()->json($response);
        }
    }

    public function store_sample(Request $request)
    {
        $lines[] = array();
        $semua_id[] = array();
        for ($i=0; $i <= $request['row']; $i++) {
            // Jika satu sample untuk banyak tangki
            // if(!in_array($request['line_'.$i], $lines)) {

              // Untuk Id
              $sample = DB::table('t_sample_minyak')->orderBy('created_at', 'desc')->orderBy('id', 'desc')->first();
              if (!$sample) {
                  $id = "SMK00000";
              }else{
                  $id = $sample->id;
              }
              $id_angka = (int)substr($id, 3, 5);
              if ($id_angka + 1 >= 1 && $id_angka + 1 < 10) {
                  $id = "SMK0000".($id_angka + 1);
              }elseif ($id_angka + 1 >= 10 && $id_angka + 1 < 100) {
                  $id = "SMK000".($id_angka + 1);
              }elseif ($id_angka + 1 >= 100 && $id_angka + 1 < 1000) {
                  $id = "SMK00".($id_angka + 1);
              }elseif ($id_angka + 1 >= 1000 && $id_angka + 1 < 10000) {
                  $id = "SMK0".($id_angka + 1);
              }elseif ($id_angka + 1 >= 10000 && $id_angka + 1 < 100000) {
                  $id = "SMK".($id_angka + 1);
              }
              // Untuk kebutuhan lain
              $line_id = $request['line_'.$i];
              $dept_id = $request['department'];
              $mid_product = $request['variant_product_'.$i];
              $sample_date = date('Y-m-d', strtotime($request['tanggal_sample']));
              $input_date = date('Y-m-d');
              $sample_time = $request['jam_sample'];
              $input_time = date('H:i');
              $shift = '1';
              $created_by = Auth::user()->nik;
              $keterangan = 'created by '.$created_by;
              // Mulai menyimpan
              $sample_minyak = new SampleMinyak;
              $sample_minyak->id = $id;
              $sample_minyak->line_id = $line_id;
              $sample_minyak->dept_id = $dept_id;
              $sample_minyak->mid_product = $mid_product;
              $sample_minyak->sample_date = $sample_date;
              $sample_minyak->input_date = $input_date;
              $sample_minyak->sample_time = $sample_time;
              $sample_minyak->input_time = $input_time;
              $sample_minyak->shift = $shift;
              $sample_minyak->created_by = $created_by;
              $sample_minyak->save();
            // Jika satu sample untuk banyak tangki
            //   array_push($lines, $request['line_'.$i]);
            // }
            // Insert ke PV
            $pv = new PV;
            $pv->sample_id = $id;
            $pv->tangki = $request['tangki_'.$i];
            $pv->volume_titrasi = $request['volume_pv_'.$i];
            $pv->bobot_sample = $request['bobot_pv_'.$i];
            $pv->normalitas = $request['normalitas_pv_'. $i];
            $pv->faktor = 1000;
            $pv->nilai = $request['nilai_pv_'.$i];
            $pv->save();
            // Insert ke FFA
            $ffa = new FFA;
            $ffa->sample_id = $id;
            $ffa->tangki = $request['tangki_'.$i];
            $ffa->volume_titrasi = $request['volume_ffa_'.$i];
            $ffa->bobot_sample = $request['bobot_ffa_'.$i];
            $ffa->normalitas = $request['normalitas_ffa_'. $i];
            $ffa->faktor = 25.6;
            $ffa->nilai = $request['nilai_ffa_'.$i];
            $ffa->save();
            array_push($semua_id, $id);
            if ($i == $request['row']) {
                return response()->json(['succes' => 1, 'semua_id' => $semua_id], 200);
            }
        }
    }
}