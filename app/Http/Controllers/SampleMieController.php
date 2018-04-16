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
use App\JamSample;

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

    public function create_sample_id()
    {
        $variant_products = VariantProduct::all();
        $jam_sample = JamSample::all();
        $department = Department::all();
        return view('qc.create-sample', ['departments' => $department, 'jam_samples' => $jam_sample, 'variant_products' => $variant_products]);
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

    public function create_sample(Request $request)
    {
        $semua_id = array();
        for ($i=0; $i < count($request->tangki); $i++) {

          // Untuk Id
          $id = "MIE".date('ymdhis');

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

}
