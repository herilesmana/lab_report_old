<?php

namespace App\Http\Controllers;

use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Department;
use App\VariantProduct;
use App\FFA;
use App\PV;
use App\SampleMinyak;

class SampleMinyakController extends Controller
{

    public function input()
    {
        $jam_sample = DB::table('m_jam_sample')->get();
        $department = DB::table('m_department')->get();
        return view('sample_minyak.input', ['jam_sample' => $jam_sample, 'departments' => $department]);
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
        for ($i=0; $i <= $request['row']; $i++) {
            if(!in_array($request['line_'.$i], $lines)) {
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
              array_push($lines, $request['line_'.$i]);
            }
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
            if ($i == $request['row']) {
                return response()->json(['succes' => 1], 200);
            }
        }
    }
}
