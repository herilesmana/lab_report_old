<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Department;
use App\SampleMinyak;
use App\Shift;
use App\VariantProduct;
use Excel;

class ReportSampleMinyakController extends Controller
{
    var $permissions = [];
    public function set_permissions()
    {
      // query untuk mendapatkan semua permission berdasarkan auth id milik user.
        $get_permissions = DB::table('auth_permission')
                          ->join('auth_group_permission', 'auth_permission.id', '=', 'auth_group_permission.permission_id')
                          ->join('auth_group', 'auth_group.id', '=', 'auth_group_permission.group_id')
                          ->select('auth_permission.codename as codename')
                          ->where('auth_group.id','=', Auth::user()->group_id)
                          ->get();
        foreach ($get_permissions as $permission) {
            array_push($this->permissions, $permission->codename);
        }
    }
    public function get_ffa()
    {
      $sample = DB::table('t_sample_minyak')
              ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
              ->select('t_sample_minyak.sample_time','t_ffa.nilai as nilai_ffa')
              ->where('sample_date', '2018-05-14')
              ->where('t_ffa.tangki', 'MP')
              ->where('line_id', 'LINE 01 BAG')
              ->where('dept_id', '2')
              ->where('t_sample_minyak.status', '3')
              ->get();
      return response()->json($sample);
    }
    public function get_pv()
    {
      $sample = DB::table('t_sample_minyak')
              ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
              ->select('t_sample_minyak.sample_time','t_pv.nilai as nilai_pv')
              ->where('sample_date', '2018-05-14')
              ->where('t_pv.tangki', 'MP')
              ->where('line_id', 'LINE 01 BAG')
              ->where('dept_id', '2')
              ->where('t_sample_minyak.status', '3')
              ->get();
      return response()->json($sample);
    }
    public function index()
    {
        $this->set_permissions();
        $departments = Department::where('dept_group', '=', 'produksi')->get();
        $variants = VariantProduct::get();
        $shifts = Shift::get();
        return view('sample_minyak.report', ['variants' => $variants, 'shifts' => $shifts, 'departments' => $departments, 'permissions' => $this->permissions]);
    }
    public function average($department = '', $status = '', $line = '', $tangki = '', $start_time = '', $end_time = '', $variant = '', $shift = '')
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
        if ($variant == "null") {
            $variant = '';
        }
        if ($shift == "null") {
            $shift = '';
        }
        if ($start_time != '' && $end_time != '' && $start_time != $end_time) {
          if ($variant == '') {
          $pv = SampleMinyak::selectRaw('avg(t_pv.nilai) as average_pv')
                  ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                  ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                  ->where('dept_id', 'like', '%'.$department.'%')
                  ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                  ->where('line_id', 'like', '%'.$line.'%')
                  ->whereBetween('sample_date', [$start_time, $end_time])
                  ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                  ->where('shift', 'like', '%'.$shift.'%')
                  ->where('t_sample_minyak.status', '!=', '4')
                  ->where('t_pv.used', '!=','N')
                  ->where('t_ffa.used', '!=','N')
                  ->get();
          $ffa = SampleMinyak::selectRaw('avg(t_ffa.nilai) as average_ffa')
                  ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                  ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                  ->where('dept_id', 'like', '%'.$department.'%')
                  ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                  ->where('line_id', 'like', '%'.$line.'%')
                  ->whereBetween('sample_date', [$start_time, $end_time])
                  ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                  ->where('t_sample_minyak.status', '!=', '4')
                  ->where('shift', 'like', '%'.$shift.'%')
                  ->where('t_pv.used', '!=','N')
                  ->where('t_ffa.used', '!=','N')
                  ->get();
          }else{
          $pv = SampleMinyak::selectRaw('avg(t_pv.nilai) as average_pv')
                  ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                  ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                  ->where('dept_id', 'like', '%'.$department.'%')
                  ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                  ->where('line_id', 'like', '%'.$line.'%')
                  ->whereBetween('sample_date', [$start_time, $end_time])
                  ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                  ->where('shift', 'like', '%'.$shift.'%')
                  ->where('mid_product', '=', $variant)
                  ->where('t_sample_minyak.status', '!=', '4')
                  ->where('t_pv.used', '!=','N')
                  ->where('t_ffa.used', '!=','N')
                  ->get();
          $ffa = SampleMinyak::selectRaw('avg(t_ffa.nilai) as average_ffa')
                  ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                  ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                  ->where('dept_id', 'like', '%'.$department.'%')
                  ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                  ->where('line_id', 'like', '%'.$line.'%')
                  ->whereBetween('sample_date', [$start_time, $end_time])
                  ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                  ->where('mid_product', '=', $variant)
                  ->where('t_sample_minyak.status', '!=', '4')
                  ->where('shift', 'like', '%'.$shift.'%')
                  ->where('t_pv.used', '!=','N')
                  ->where('t_ffa.used', '!=','N')
                  ->get();
          }
        }else{
          if ($variant == '') {
            $pv = SampleMinyak::selectRaw('avg(t_pv.nilai) as average_pv')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('sample_date', 'like', '%'.$start_time.'%')
                    ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                    ->where('shift', 'like', '%'.$shift.'%')
                    ->where('t_sample_minyak.status', '!=', '4')
                    ->where('t_pv.used', '!=','N')
                    ->where('t_ffa.used', '!=','N')
                    ->get();
            $ffa = SampleMinyak::selectRaw('avg(t_ffa.nilai) as average_ffa')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('shift', 'like', '%'.$shift.'%')
                    ->where('sample_date', 'like', '%'.$start_time.'%')
                    ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                    ->where('t_sample_minyak.status', '!=', '4')
                    ->where('t_pv.used', '!=','N')
                    ->where('t_ffa.used', '!=','N')
                    ->get();
          }else{
            $pv = SampleMinyak::selectRaw('avg(t_pv.nilai) as average_pv')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('sample_date', 'like', '%'.$start_time.'%')
                    ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                    ->where('shift', 'like', '%'.$shift.'%')
                    ->where('mid_product', '=', $variant)
                    ->where('t_sample_minyak.status', '!=', '4')
                    ->where('t_pv.used', '!=','N')
                    ->where('t_ffa.used', '!=','N')
                    ->get();
            $ffa = SampleMinyak::selectRaw('avg(t_ffa.nilai) as average_ffa')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('shift', 'like', '%'.$shift.'%')
                    ->where('sample_date', 'like', '%'.$start_time.'%')
                    ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                    ->where('mid_product', '=', $variant)
                    ->where('t_sample_minyak.status', '!=', '4')
                    ->where('t_pv.used', '!=','N')
                    ->where('t_ffa.used', '!=','N')
                    ->get();
          }
        }
        foreach ($pv as $nilai) {
          $nilai_pv = $nilai->average_pv;
        }
        foreach ($ffa as $nilai) {
          $nilai_ffa = $nilai->average_ffa;
        }
        $output = array('avg_pv' =>$nilai_pv, 'avg_ffa' => $nilai_ffa);
        return response()->json($output);
    }
    public function data($department = '', $status = '', $line = '', $tangki = '', $start_time = '', $end_time = '', $variant = '', $shift = '')
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
        if ($shift == "null") {
            $shift = '';
        }
        if ($variant == "null") {
            $variant = '';
        }
        if ($start_time != '' && $end_time != '' && $start_time != $end_time) {
          if ($variant == "") {
          $sample = DB::table('t_sample_minyak')
                  ->join('m_variant_product', 't_sample_minyak.mid_product', '=', 'm_variant_product.mid')
                  ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                  ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                  ->select('m_variant_product.name as variant','t_sample_minyak.*', 't_pv.tangki', 't_pv.volume_titrasi as volume_titrasi_pv', 't_pv.bobot_sample as bobot_sample_pv', 't_pv.normalitas as normalitas_pv', 't_pv.nilai as nilai_pv', 't_ffa.volume_titrasi as volume_titrasi_ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 't_ffa.normalitas as normalitas_ffa', 't_ffa.nilai as nilai_ffa')
                  ->where('dept_id', 'like', '%'.$department.'%')
                  ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                  ->where('line_id', 'like', '%'.$line.'%')
                  ->whereBetween('sample_date', [$start_time, $end_time])
                  ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                  ->where('shift', 'like', '%'.$shift.'%')
                  ->where('t_sample_minyak.status', '!=', '4')
                  ->where('t_pv.used', '!=','N')
                  ->where('t_ffa.used', '!=','N')
                  ->get();
          }else{
          $sample = DB::table('t_sample_minyak')
                  ->join('m_variant_product', 't_sample_minyak.mid_product', '=', 'm_variant_product.mid')
                  ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                  ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                  ->select('m_variant_product.name as variant','t_sample_minyak.*', 't_pv.tangki', 't_pv.volume_titrasi as volume_titrasi_pv', 't_pv.bobot_sample as bobot_sample_pv', 't_pv.normalitas as normalitas_pv', 't_pv.nilai as nilai_pv', 't_ffa.volume_titrasi as volume_titrasi_ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 't_ffa.normalitas as normalitas_ffa', 't_ffa.nilai as nilai_ffa')
                  ->where('dept_id', 'like', '%'.$department.'%')
                  ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                  ->where('line_id', 'like', '%'.$line.'%')
                  ->whereBetween('sample_date', [$start_time, $end_time])
                  ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                  ->where('shift', 'like', '%'.$shift.'%')
                  ->where('mid_product', '=', $variant)
                  ->where('t_sample_minyak.status', '!=', '4')
                  ->where('t_pv.used', '!=','N')
                  ->where('t_ffa.used', '!=','N')
                  ->get();
          }

        }else{
            if ($variant == "") {
            $sample = DB::table('t_sample_minyak')
                    ->join('m_variant_product', 't_sample_minyak.mid_product', '=', 'm_variant_product.mid')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                    ->select('m_variant_product.name as variant','t_sample_minyak.*', 't_pv.tangki', 't_pv.volume_titrasi as volume_titrasi_pv', 't_pv.bobot_sample as bobot_sample_pv', 't_pv.normalitas as normalitas_pv', 't_pv.nilai as nilai_pv', 't_ffa.volume_titrasi as volume_titrasi_ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 't_ffa.normalitas as normalitas_ffa', 't_ffa.nilai as nilai_ffa')
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('sample_date', 'like', '%'.$start_time.'%')
                    ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                    ->where('shift', 'like', '%'.$shift.'%')
                    ->where('t_sample_minyak.status', '!=', '4')
                    ->where('t_pv.used', '!=','N')
                    ->where('t_ffa.used', '!=','N')
                    ->get();
            }else{
            $sample = DB::table('t_sample_minyak')
                    ->join('m_variant_product', 't_sample_minyak.mid_product', '=', 'm_variant_product.mid')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                    ->select('m_variant_product.name as variant','t_sample_minyak.*', 't_pv.tangki', 't_pv.volume_titrasi as volume_titrasi_pv', 't_pv.bobot_sample as bobot_sample_pv', 't_pv.normalitas as normalitas_pv', 't_pv.nilai as nilai_pv', 't_ffa.volume_titrasi as volume_titrasi_ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 't_ffa.normalitas as normalitas_ffa', 't_ffa.nilai as nilai_ffa')
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('sample_date', 'like', '%'.$start_time.'%')
                    ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                    ->where('shift', 'like', '%'.$shift.'%')
                    ->where('t_sample_minyak.status', '!=', '4')
                    ->where('mid_product', '=', $variant)
                    ->where('t_pv.used', '!=','N')
                    ->where('t_ffa.used', '!=','N')
                    ->get();
            }

        }
        $no = 0;
        $data = array();
        foreach ($sample as $list) {
            $row = array();
            $no++;
            $row[] = $no;
            if ($list->status == 1) {
                $status = 'Created';
            }elseif ($list->status == 2) {
                $status = 'Uploaded';
            }elseif ($list->status == 3) {
                $status = 'Approved';
            }
            $row[] = $list->line_id;
            $row[] = $list->tangki;
            $row[] = $status;
            $row[] = round($list->bobot_sample_pv, 4);
            $row[] = round($list->volume_titrasi_pv, 2);
            $row[] = round($list->normalitas_pv, 2);
            $row[] = round($list->nilai_pv, 2);
            $row[] = round($list->bobot_sample_ffa, 4);
            $row[] = round($list->volume_titrasi_ffa, 2);
            $row[] = round($list->normalitas_ffa, 4);
            $row[] = round($list->nilai_ffa, 4);
            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }
    public function excel($department = '', $status = '', $line = '', $tangki = '', $start_time = '', $end_time = '', $variant = '', $shift = '')
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
        if ($variant == "null") {
            $variant = '';
        }
        if ($shift == "null") {
            $shift = '';
        }
        $sampleArray = [];
        $select = array();
        $group_report = DB::table('auth_report')
                        ->join('auth_group_report', 'auth_report.id', '=', 'auth_group_report.report_id')
                        ->join('auth_group', 'auth_group_report.group_id', '=', 'auth_group.id')
                        ->where('auth_group_report.group_id', Auth::user()->group_id)
                        ->where('auth_report.jenis_sample', 'MYK')
                        ->select('auth_report.codename')
                        ->get();
        foreach ($group_report as $report) {
            array_push($select, $report->codename);
        }
        if ($start_time != '' && $end_time != '') {
            $tanggal = 'between '.$start_time. ' and '.$end_time;
            if ($variant == "") {
            $samples = DB::table('t_sample_minyak')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                    ->join('m_variant_product', 't_sample_minyak.mid_product', '=', 'm_variant_product.mid')
                    ->join('m_department', 't_sample_minyak.dept_id', '=', 'm_department.id')
                    ->select($select)
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->whereBetween('sample_date', [$start_time, $end_time])
                    ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                    ->where('shift', 'like', '%'.$shift.'%')
                    ->where('t_pv.used', '!=','N')
                    ->where('t_ffa.used', '!=','N')
                    ->get();
            }else{
            $samples = DB::table('t_sample_minyak')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                    ->join('m_variant_product', 't_sample_minyak.mid_product', '=', 'm_variant_product.mid')
                    ->join('m_department', 't_sample_minyak.dept_id', '=', 'm_department.id')
                    ->select($select)
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->whereBetween('sample_date', [$start_time, $end_time])
                    ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                    ->where('shift', 'like', '%'.$shift.'%')
                    ->where('mid_product', '=', $variant)
                    ->where('t_pv.used', '!=','N')
                    ->where('t_ffa.used', '!=','N')
                    ->get();
            }

        }else{
            $tanggal = $start_time;
            if ($variant == "") {
            $samples = DB::table('t_sample_minyak')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                    ->join('m_variant_product', 't_sample_minyak.mid_product', '=', 'm_variant_product.mid')
                    ->join('m_department', 't_sample_minyak.dept_id', '=', 'm_department.id')
                    ->select($select)
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('sample_date', '=', $start_time)
                    ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                    ->where('shift', 'like', '%'.$shift.'%')
                    ->where('t_pv.used', '!=','N')
                    ->where('t_ffa.used', '!=','N')
                    ->get();
            }else{
            $samples = DB::table('t_sample_minyak')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                    ->join('m_variant_product', 't_sample_minyak.mid_product', '=', 'm_variant_product.mid')
                    ->join('m_department', 't_sample_minyak.dept_id', '=', 'm_department.id')
                    ->select($select)
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('t_sample_minyak.status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('sample_date', '=', $start_time)
                    ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
                    ->where('shift', 'like', '%'.$shift.'%')
                    ->where('mid_product', '=', $variant)
                    ->where('t_pv.used', '!=','N')
                    ->where('t_ffa.used', '!=','N')
                    ->get();
            }
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
        })->download('xls');
    }
}
