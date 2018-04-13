<?php

namespace App\Http\Controllers;

use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

use App\Department;
use App\VariantProduct;
use App\FFA;
use App\PV;
use App\SampleMinyak;
use App\LogSampleMinyak;
use App\JamSample;

class SampleMinyakController extends Controller
{

    public function input()
    {
        $jam_sample = DB::table('m_jam_sample')->get();
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
        if ($request['status'] == 'Y') {
            $sample_minyak->approve = $request['status'];
        }
        if ($request['keterangan']) {
            $sample_minyak->keterangan = $request['keterangan'];
            $status = 'reject';
            $sample_minyak->status = 1;
            $keterangan = $request['keterangan'];
        }else{
            $keterangan = 'Approved by '.Auth::user()->nik;
            $sample_minyak->keterangan = 'Approved by '.Auth::user()->nik;
            $status = 'approve';
            $sample_minyak->status = 3;
        }
        $sample_minyak->approver = Auth::user()->nik;
        $sample_minyak->approve_date = date('Y-m-d');
        $sample_minyak->approve_time = date('H:i:s');
        $sample_minyak->update();
        // Untuk Log
        $log = new LogSampleMinyak;
        $log->sample_id = $request['id'];
        $log->nik = Auth::user()->nik;
        $log->log_time = date('Y-m-d H:i:s');
        $log->action = $status;
        $log->keterangan = $keterangan;
        $log->save();

        return response()->json(['success' => 1, 'id' => $request['id']], 200);
    }

    public function showHasil()
    {
        $sample_minyak = Db::table('t_sample_minyak')
                            ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                            ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                            ->select('t_sample_minyak.*', 't_pv.tangki', 't_pv.volume_titrasi as volume_titrasi_pv', 't_pv.bobot_sample as bobot_sample_pv', 't_pv.normalitas as normalitas_pv', 't_pv.nilai as nilai_pv', 't_ffa.volume_titrasi as volume_titrasi_ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 't_ffa.normalitas as normalitas_ffa', 't_ffa.nilai as nilai_ffa')
                            ->where('t_sample_minyak.approve', null)
                            ->where('t_sample_minyak.status', 2)
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

    public function per_status($status, $status_reject = '')
    {
        $sample = DB::table('t_sample_minyak')
                  ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                  ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                  ->select('t_sample_minyak.*', 't_pv.tangki', 't_pv.id as pv_id', 't_ffa.id as ffa_id')
                  ->where('t_sample_minyak.status', $status)
                  ->get();

        return json_encode($sample);
    }

    public function create_sample_id()
    {
        $variant_products = VariantProduct::all();
        $jam_sample = JamSample::all();
        $department = Department::all();
        return view('qc.create-sample', ['departments' => $department, 'jam_samples' => $jam_sample, 'variant_products' => $variant_products]);
    }

    public function upload_sample_result()
    {
        return view('qa.upload-hasil-sample');
    }

    public function create_sample(Request $request)
    {
        if (!$request->tangki) {
            return response()->json(['success' => 0, 'error' => 'Pilih tangki']);
        }elseif (!$request->variant_product) {
            return response()->json(['success' => 0, 'error' => 'Pilih Variant']);
        }
        $semua_id = array();
        for ($i=0; $i < count($request->tangki); $i++) {

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
          $line_id = $request['line'];
          $dept_id = $request['department'];
          $mid_product = $request['variant_product'];
          $sample_date = $request['tanggal_sample'];
          $input_date = date('Y-m-d');
          $sample_time = $request['jam_sample'];
          $input_time = date('H:i');
          $shift = 'NS1';
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
          $sample_minyak->status = '1';
          $sample_minyak->created_by = $created_by;
          $sample_minyak->save();

          $pv = new PV;
          $pv->sample_id = $id;
          $pv->tangki = $request->tangki[$i];
          $pv->save();
          // Insert ke FFA
          $ffa = new FFA;
          $ffa->sample_id = $id;
          $ffa->tangki = $request->tangki[$i];
          $ffa->save();
          array_push($semua_id, $id);
          // Untuk Log
          $log = new LogSampleMinyak;
          $log->sample_id = $id;
          $log->nik = Auth::user()->nik;
          $log->log_time = date('Y-m-d H:i:s');
          $log->action = 'create';
          $log->keterangan = Auth::user()->nik.' created sample sample '.$id.' at '.date('Y-m-d H:i:s');
          $log->save();
        }
        return response()->json(['success' => 1, 'semua_id' => $semua_id], 200);
    }

    public function store_sample(Request $request)
    {
        for ($i=0; $i <= $request['row']; $i++) {
            if ($request['nilai_pv_'.$i] != '' && $request['nilai_ffa_'.$i] != '' && $request['volume_titrasi_pv_'.$i] != '') {
                // Untuk kebutuhan lain
                $line_id = $request['line_'.$i];
                $tangki = $request['tangki_'.$i];
                $upload_date = date('Y-m-d');
                $upload_time = date('H:i');
                $uploaded_by = Auth::user()->nik;
                $keterangan = 'uploaded by '.$uploaded_by;
                // Mulai menyimpan
                $sample_minyak = SampleMinyak::find($request['id_'.$i]);
                $sample_minyak->upload_date = $upload_date;
                $sample_minyak->upload_time = $upload_time;
                $sample_minyak->uploaded_by = $uploaded_by;
                $sample_minyak->keterangan  = $keterangan;
                $sample_minyak->status = '2';
                $sample_minyak->update();
                // Insert ke PV
                $pv = PV::find($request['id_pv_'.$i]);
                $pv->volume_titrasi = str_replace(',', '.', $request['volume_titrasi_pv_'.$i]);
                $pv->bobot_sample = str_replace(',', '.', $request['bobot_sample_pv_'.$i]);
                $pv->normalitas = str_replace(',', '.', $request['normalitas_pv_'. $i]);
                $pv->faktor = 1000;
                $pv->nilai = str_replace(',', '.', $request['nilai_pv_'.$i]);
                $pv->update();
                // Insert ke FFA
                $ffa = FFA::find($request['id_ffa_'.$i]);
                $ffa->volume_titrasi = str_replace(',', '.', $request['volume_titrasi_ffa_'.$i]);
                $ffa->bobot_sample = str_replace(',', '.', $request['bobot_sample_ffa_'.$i]);
                $ffa->normalitas = str_replace(',', '.', $request['normalitas_ffa_'. $i]);
                $ffa->faktor = 25.6;
                $ffa->nilai = str_replace(',', '.', $request['nilai_ffa_'.$i]);
                $ffa->update();
                // Untuk Log
                $log = new LogSampleMinyak;
                $log->sample_id = $request['id_'.$i];
                $log->nik = Auth::user()->nik;
                $log->log_time = date('Y-m-d H:i:s');
                $log->action = 'upload';
                $log->keterangan = Auth::user()->nik.' uploaded sample result '.$request['id_'.$i].' at '.date('Y-m-d H:i:s');
                $log->volume_titrasi_pv = str_replace(',', '.', $request['volume_titrasi_pv_'.$i]);
                $log->bobot_sample_pv = str_replace(',', '.', $request['bobot_sample_pv_'.$i]);
                $log->normalitas_pv = str_replace(',', '.', $request['normalitas_pv_'. $i]);
                $log->faktor_pv = 1000;
                $log->nilai_pv = str_replace(',', '.', $request['nilai_pv_'.$i]);
                $log->volume_titrasi_ffa = str_replace(',', '.', $request['volume_titrasi_ffa_'.$i]);
                $log->bobot_sample_ffa = str_replace(',', '.', $request['bobot_sample_ffa_'.$i]);
                $log->normalitas_ffa = str_replace(',', '.', $request['normalitas_ffa_'. $i]);
                $log->faktor_ffa = 25.6;
                $log->nilai_ffa = str_replace(',', '.', $request['nilai_ffa_'.$i]);
                $log->save();
            }

            if ($i == $request['row']) {
                return response()->json(['success' => 1], 200);
            }
        }
    }

    public function store_sample_old(Request $request)
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
              $shift = 'NS1';
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
