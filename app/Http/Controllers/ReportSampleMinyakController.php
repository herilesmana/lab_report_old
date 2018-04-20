<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Department;
use App\SampleMinyak;
use Excel;

class ReportSampleMinyakController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('sample_minyak.report', ['departments' => $departments]);
    }
    public function data($department = '', $status = '', $line = '', $tangki = '', $start_time = '', $end_time = '')
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
        if ($tangki == "null") {
            $tangki = '';
        }
        if ($start_time != '' && $end_time != '') {
            $sample = DB::table('t_sample_minyak')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                    ->select('t_sample_minyak.*', 't_pv.tangki', 't_pv.volume_titrasi as volume_titrasi_pv', 't_pv.bobot_sample as bobot_sample_pv', 't_pv.normalitas as normalitas_pv', 't_pv.nilai as nilai_pv', 't_ffa.volume_titrasi as volume_titrasi_ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 't_ffa.normalitas as normalitas_ffa', 't_ffa.nilai as nilai_ffa')
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->whereBetween('sample_date', [$start_time, $end_time])
                    ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                    ->get();
        }else{
            $sample = DB::table('t_sample_minyak')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                    ->select('t_sample_minyak.*', 't_pv.tangki', 't_pv.volume_titrasi as volume_titrasi_pv', 't_pv.bobot_sample as bobot_sample_pv', 't_pv.normalitas as normalitas_pv', 't_pv.nilai as nilai_pv', 't_ffa.volume_titrasi as volume_titrasi_ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 't_ffa.normalitas as normalitas_ffa', 't_ffa.nilai as nilai_ffa')
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('sample_date', 'like', '%'.$start_time.'%')
                    ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                    ->get();
        }
        $no = 0;
        $data = array();
        foreach ($sample as $list) {
            $no++;
            $row = array();
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
            $row[] = $list->tangki;
            $row[] = $list->volume_titrasi_pv;
            $row[] = $list->bobot_sample_pv;
            $row[] = $list->normalitas_pv;
            $row[] = $list->nilai_pv;
            $row[] = $list->volume_titrasi_ffa;
            $row[] = $list->bobot_sample_ffa;
            $row[] = $list->normalitas_ffa;
            $row[] = $list->nilai_ffa;
            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }
    public function excel($department = '', $status = '', $line = '', $tangki = '', $start_time = '', $end_time = '')
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
        if ($tangki == "null") {
            $tangki = '';
        }
        $sampleArray = [];
        if ($start_time != '' && $end_time != '') {
            $tanggal = 'between '.$start_time. ' and '.$end_time;
            $samples = DB::table('t_sample_minyak')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                    ->select('t_sample_minyak.*', 't_pv.tangki', 't_pv.volume_titrasi as volume_titrasi_pv', 't_pv.bobot_sample as bobot_sample_pv', 't_pv.normalitas as normalitas_pv', 't_pv.nilai as nilai_pv', 't_ffa.volume_titrasi as volume_titrasi_ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 't_ffa.normalitas as normalitas_ffa', 't_ffa.nilai as nilai_ffa')
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->whereBetween('sample_date', [$start_time, $end_time])
                    ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                    ->get();
        }else{
            $tanggal = $start_time;
            $samples = DB::table('t_sample_minyak')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                    ->select('t_sample_minyak.*', 't_pv.tangki', 't_pv.volume_titrasi as volume_titrasi_pv', 't_pv.bobot_sample as bobot_sample_pv', 't_pv.normalitas as normalitas_pv', 't_pv.nilai as nilai_pv', 't_ffa.volume_titrasi as volume_titrasi_ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 't_ffa.normalitas as normalitas_ffa', 't_ffa.nilai as nilai_ffa')
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('sample_date', '=', $start_time)
                    ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                    ->get();
        }

        foreach ($samples as $sample) {
            $sampleArray[] = $sample;
        }
        Excel::create('Report Minyak Sample '.$tanggal , function($excel) use ($sampleArray){
            $sampleArray = json_decode( json_encode($sampleArray), true);

            // Set the title
            $excel->setTitle('Report Minyak Sample');

            // Chain the setters
            $excel->setCreator(Auth::user()->nik)
                  ->setCompany('PT. PAS');
            $excel->sheet('sheet1', function($sheet) use ($sampleArray) {
            $sheet->fromArray($sampleArray);

            });

            // Call them separately
            $excel->setDescription('Report Minyak Sample');
        })->download('xlsx');
    }
}
