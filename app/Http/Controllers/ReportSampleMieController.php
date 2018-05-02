<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Department;
use App\SampleMie;
use App\VariantProduct;
use Excel;

class ReportSampleMieController extends Controller
{
    public function index()
    {
        // return "[ Under maintenance! ] <a href='/lab-report/public/home'>Go to home</a>";
        $departments = Department::where('dept_group', '=', Auth::user()->dept_group)->get();
        $variants = VariantProduct::all();
        return view('sample_mie.report', ['departments' => $departments, 'variants' => $variants]);
    }

    public function data($department = '', $status = '', $line = '', $variant = '', $start_time = '', $end_time = '')
    {
        if ($department == "null") {
            $department = '';
        }
        if ($status == "null") {
            $status = '';
        }
        if ($line == "null") {
            $line = '';
        }
        if ($variant == "null") {
            $variant = '';
        }
        if ($start_time != '' && $end_time != '' && $start_time != $end_time) {
          $sample = DB::table('t_sample_mie')
                  ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                  ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                  ->select('t_sample_mie.*', 't_fc.id as fc_id', 't_ka.id as ka_id', 't_fc.labu_isi as labu_isi_fc', 't_fc.labu_awal as labu_awal_fc', 't_fc.nilai as nilai_fc', 't_fc.bobot_sample as bobot_sample_fc', 't_ka.w0 as w0_ka','t_ka.w1 as w1_ka', 't_ka.w2 as w2_ka', 't_ka.nilai as nilai_ka')
                  ->where('dept_id', 'like', '%'.$department.'%')
                  ->where('t_sample_mie.status', 'like', '%'.$status.'%')
                  ->where('line_id', 'like', '%'.$line.'%')
                  ->where('mid_product', 'like', '%'.$variant.'%')
                  ->whereBetween('sample_date', [$start_time, $end_time])
                  ->where('t_sample_mie.status', '!=', '4')
                  ->get();
        }else{
            $sample = DB::table('t_sample_mie')
                    ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                    ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                    ->join('m_varaint_product', 't_sample_mie.MID', '=', 't_ka.sample_id')
                    ->select('t_sample_mie.*', 't_fc.id as fc_id', 't_ka.id as ka_id', 't_fc.labu_isi as labu_isi_fc', 't_fc.labu_awal as labu_awal_fc', 't_fc.nilai as nilai_fc', 't_fc.bobot_sample as bobot_sample_fc', 't_ka.w0 as w0_ka','t_ka.w1 as w1_ka', 't_ka.w2 as w2_ka', 't_ka.nilai as nilai_ka')
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('t_sample_mie.status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('mid_product', 'like', '%'.$variant.'%')
                    ->where('sample_date', 'like', '%'.$start_time.'%')
                    ->where('t_sample_mie.status', '!=', '4')
                    ->get();
        }
        $no = 0;
        $data = array();
        foreach ($sample as $list) {
            $no++;
            $row = array();
            $row[] = '<input type="checkbox" value="" name="id[]">';
            $row[] = $list->id;
            if ($list->status == 1) {
                $status = 'Created';
            }elseif ($list->status == 2) {
                $status = 'Uploaded';
            }elseif ($list->status == 3) {
                $status = 'Approved';
            }
            $row[] = $status;
            $row[] = $list->line_id;
            $row[] = $list->mid_product;
            $row[] = $list->bobot_sample_fc;
            $row[] = $list->labu_awal_fc;
            $row[] = $list->labu_isi_fc;
            $row[] = $list->nilai_fc;
            $row[] = $list->w0_ka;
            $row[] = $list->w1_ka;
            $row[] = $list->w2_ka;
            $row[] = $list->nilai_ka;
            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }
    public function excel($department = '', $status = '', $line = '', $variant = '', $start_time = '', $end_time = '')
    {
        if ($department == "null") {
            $department = '';
        }
        if ($status == "null") {
            $status = '';
        }
        if ($line == "null") {
            $line = '';
        }
        if ($variant == "null") {
            $variant = '';
        }
        $sampleArray = [];
        if ($start_time != '' && $end_time != '') {
            $tanggal = 'between '.$start_time. ' and '.$end_time;
            $samples = DB::table('t_sample_mie')
                    ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                    ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                    ->select('t_sample_mie.*', 't_fc.id as fc_id', 't_ka.id as ka_id', 't_fc.labu_isi as labu_isi_fc', 't_fc.labu_awal as labu_awal_fc', 't_fc.nilai as nilai_fc', 't_fc.bobot_sample as bobot_sample_fc', 't_ka.w0 as w0_ka','t_ka.w1 as w1_ka', 't_ka.w2 as w2_ka', 't_ka.nilai as nilai_ka')
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->whereBetween('sample_date', [$start_time, $end_time])
                    ->where('t_sample_mie.mid_product', 'like', '%'.$variant.'%')
                    ->get();
        }else{
            $tanggal = $start_time;
            $samples = DB::table('t_sample_mie')
                    ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                    ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                    ->select('t_sample_mie.*', 't_fc.id as fc_id', 't_ka.id as ka_id', 't_fc.labu_isi as labu_isi_fc', 't_fc.labu_awal as labu_awal_fc', 't_fc.nilai as nilai_fc', 't_fc.bobot_sample as bobot_sample_fc', 't_ka.w0 as w0_ka','t_ka.w1 as w1_ka', 't_ka.w2 as w2_ka', 't_ka.nilai as nilai_ka')
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('sample_date', '=', $start_time)
                    ->where('t_sample_mie.mid_product', 'like', '%'.$variant.'%')
                    ->get();
        }

        foreach ($samples as $sample) {
            $sampleArray[] = $sample;
        }
        Excel::create('Report Mie Sample '.$tanggal , function($excel) use ($sampleArray){
            $sampleArray = json_decode( json_encode($sampleArray), true);

            // Set the title
            $excel->setTitle('Report Mie Sample');

            // Chain the setters
            $excel->setCreator(Auth::user()->nik)
                  ->setCompany('PT. PAS');
            $excel->sheet('sheet1', function($sheet) use ($sampleArray) {
            $sheet->fromArray($sampleArray);

            });

            // Call them separately
            $excel->setDescription('Report Mie Sample');
        })->download('xlsx');
    }
}
