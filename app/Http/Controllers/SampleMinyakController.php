<?php

namespace App\Http\Controllers;

use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
                      $response[] = [
                          'line' => $d['line'],
                          'tangki' => $d['tangki'],
                          'variant_product' => $d['variant_product'],
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
}
