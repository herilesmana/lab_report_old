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
                          'variant' => $d['variant_product'],
                          'volume_pv' => $d['volume_pv'],
                          'bobot_pv' => $d['bobot_pv'],
                          'normalitas_pv' => $d['normalitas_pv'],
                          'nilai_pv' => $d['volume_pv'],
                          'volume_ffa' => $d['volume_ffa'],
                          'bobot_ffa' => $d['bobot_ffa'],
                          'normalitas_ffa' => $d['normalitas_ffa'],
                          'nilai_ffa' => $d['volume_ffa'],
                      ];
                  }
              }
          }
          return response()->json($response);
        }
    }
}
