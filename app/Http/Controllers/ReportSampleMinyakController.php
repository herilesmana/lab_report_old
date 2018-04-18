<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function data($department = '', $status = '', $line = '', $tangki = '')
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
        $sample = DB::table('t_sample_minyak')
                ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                ->select('t_sample_minyak.*', 't_pv.tangki', 't_pv.volume_titrasi as volume_titrasi_pv', 't_pv.bobot_sample as bobot_sample_pv', 't_pv.normalitas as normalitas_pv', 't_pv.nilai as nilai_pv', 't_ffa.volume_titrasi as volume_titrasi_ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 't_ffa.normalitas as normalitas_ffa', 't_ffa.nilai as nilai_ffa')
                ->where('dept_id', 'like', '%'.$department.'%')
                ->where('status', 'like', '%'.$status.'%')
                ->where('line_id', 'like', '%'.$line.'%')
                ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                ->get();
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
    public function excel($department = '', $status = '', $line = '', $tangki = '')
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
        $samples = DB::table('t_sample_minyak')
                ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                ->select('t_sample_minyak.*', 't_pv.tangki', 't_pv.volume_titrasi as volume_titrasi_pv', 't_pv.bobot_sample as bobot_sample_pv', 't_pv.normalitas as normalitas_pv', 't_pv.nilai as nilai_pv', 't_ffa.volume_titrasi as volume_titrasi_ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 't_ffa.normalitas as normalitas_ffa', 't_ffa.nilai as nilai_ffa')
                ->where('dept_id', 'like', '%'.$department.'%')
                ->where('status', 'like', '%'.$status.'%')
                ->where('line_id', 'like', '%'.$line.'%')
                ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                ->get();
        $sampleArray = [];
        $sampleArray[] = ['sample_id','status','line_id','tangki','volume_tirasi_pv', 'bobot_sample_pv', 'normalitas_pv', 'nilai_pv','volume_tirasi_ffa', 'bobot_sample_ffa', 'normalitas_ffa', 'nilai_ffa'];
        foreach ($samples as $sample) {
            $sampleArray[] = $sample;
        }
        // Generate and return the spreadsheet
        Excel::create('samples', function($excel) use ($sampleArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Samples');
            $excel->setCreator('Heri')->setCompany('PT. PAS');
            $excel->setDescription('Minyak Samples');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function($sheet) use ($sampleArray) {
                $sheet->fromArray($sampleArray, null, 'A1', false, false);
            });

        })->download('xlsx');
    }
}
