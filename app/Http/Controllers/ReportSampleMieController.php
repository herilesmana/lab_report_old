<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Department;
use App\SampleMie;
use App\VariantProduct;
use App\Shift;
use Excel;

class ReportSampleMieController extends Controller
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
    public function index()
    {
        $this->set_permissions();
        // return "[ Under maintenance! ] <a href='/lab-report/public/home'>Go to home</a>";
        $departments = Department::where('dept_group', '=', 'produksi')->get();
        $variants = VariantProduct::all();
        $shifts = Shift::get();
        return view('sample_mie.report', ['departments' => $departments, 'shifts' => $shifts, 'variants' => $variants, 'permissions' => $this->permissions]);
    }

    public function data($department = '', $status = '', $line = '', $variant = '', $start_time = '', $end_time = '', $shift = '')
    {
        $this->set_permissions();
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
        if ($shift == "null") {
            $shift = '';
        }
        if ($start_time != '' && $end_time != '') {
          $sample = DB::table('t_sample_mie')
                ->join('m_variant_product', 't_sample_mie.mid_product', '=', 'm_variant_product.mid')
                  ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                  ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                  ->join('m_department', 't_sample_mie.dept_id', '=', 'm_department.id')
                  ->select('m_department.name as dept_name','m_variant_product.name as variant','t_sample_mie.*', 't_fc.id as fc_id', 't_ka.id as ka_id', 't_fc.labu_isi as labu_isi_fc', 't_fc.labu_awal as labu_awal_fc', 't_fc.nilai as nilai_fc', 't_fc.bobot_sample as bobot_sample_fc', 't_ka.w0 as w0_ka','t_ka.w1 as w1_ka', 't_ka.w2 as w2_ka', 't_ka.nilai as nilai_ka')
                  ->where('dept_id', 'like', '%'.$department.'%')
                  ->where('t_sample_mie.status', 'like', '%'.$status.'%')
                  ->where('line_id', 'like', '%'.$line.'%')
                  ->where('shift', 'like', '%'.$shift.'%')
                  ->where('mid_product', 'like', '%'.$variant.'%')
                  ->whereBetween('sample_date', [$start_time, $end_time])
                  ->where('t_sample_mie.status', '!=', '4')
                  ->get();
        }else{
            $sample = DB::table('t_sample_mie')
                    ->join('m_variant_product', 't_sample_mie.mid_product', '=', 'm_variant_product.mid')
                    ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                    ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                    ->join('m_department', 't_sample_mie.dept_id', '=', 'm_department.id')
                    ->select('m_department.name as dept_name','m_variant_product.name as variant','t_sample_mie.*', 't_fc.id as fc_id', 't_ka.id as ka_id', 't_fc.labu_isi as labu_isi_fc', 't_fc.labu_awal as labu_awal_fc', 't_fc.nilai as nilai_fc', 't_fc.bobot_sample as bobot_sample_fc', 't_ka.w0 as w0_ka','t_ka.w1 as w1_ka', 't_ka.w2 as w2_ka', 't_ka.nilai as nilai_ka')
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('t_sample_mie.status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('shift', 'like', '%'.$shift.'%')
                    ->where('mid_product', 'like', '%'.$variant.'%')
                    ->where('sample_date', 'like', '%'.$start_time.'%')
                    ->where('t_sample_mie.status', '!=', '4')
                    ->get();
        }
        $no = 0;
        $data = array();
        foreach ($sample as $list) {
            $row = array();
            $no++;
            $row[] = $no;
            if ($list->status == 1) {
                $status = 'Created';
                $nilai_fc   = round($list->nilai_fc, 2);
                $nilai_ka  = round($list->nilai_ka, 2);
            }elseif ($list->status == 2) {
                $status = 'Uploaded';
                if ( in_array('full_report_oil', $this->permissions) ) {
                  $nilai_fc   = round($list->nilai_fc, 2);
                  $nilai_ka  = round($list->nilai_ka, 2);
                }else{
                  $nilai_fc   = '..';
                  $nilai_ka  = '..';
                }
            }elseif ($list->status == 3) {
                $status = 'Approved';
                $nilai_fc   = round($list->nilai_fc, 2);
                $nilai_ka  = round($list->nilai_ka, 2);
            }
            $row[] = $list->dept_name;
            $row[] = $list->line_id;
            $row[] = $list->shift;
            $row[] = $list->variant;
            $row[] = $status;
            if(in_array('full_report_oil', $this->permissions)) {
            $row[] = round($list->bobot_sample_fc,4);
            $row[] = round($list->labu_awal_fc,4);
            $row[] = round($list->labu_isi_fc,4);
            }
            $row[] = $nilai_fc;
            if(in_array('full_report_oil', $this->permissions)) {
            $row[] = round($list->w0_ka,4);
            $row[] = round($list->w1_ka,4);
            $row[] = round($list->w2_ka,4);
            }
            $row[] = $nilai_ka;
            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }
    public function excel($department = '', $status = '', $line = '', $variant = '', $start_time = '', $end_time = '', $shift = '')
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
        if ($shift == "null") {
            $shift = '';
        }
        $sampleArray = [];
        $select = array();
        $group_report = DB::table('auth_report')
                        ->join('auth_group_report', 'auth_report.id', '=', 'auth_group_report.report_id')
                        ->join('auth_group', 'auth_group_report.group_id', '=', 'auth_group.id')
                        ->where('auth_group_report.group_id', Auth::user()->group_id)
                        ->where('auth_report.jenis_sample', 'MIE')
                        ->select('auth_report.codename')
                        ->get();
        foreach ($group_report as $report) {
            array_push($select, $report->codename);
        }
        if ($start_time != '' && $end_time != '') {
            $tanggal = 'between '.$start_time. ' and '.$end_time;
            if ($variant == "") {
                $samples = DB::table('t_sample_mie')
                    ->join('m_variant_product', 't_sample_mie.mid_product', '=', 'm_variant_product.mid')
                      ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                      ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                      ->join('m_department', 't_sample_mie.dept_id', '=', 'm_department.id')
                      ->select($select)
                      ->where('dept_id', 'like', '%'.$department.'%')
                      ->where('t_sample_mie.status', 'like', '%'.$status.'%')
                      ->where('line_id', 'like', '%'.$line.'%')
                      ->where('shift', 'like', '%'.$shift.'%')
                      ->whereBetween('sample_date', [$start_time, $end_time])
                      ->where('t_sample_mie.status', '!=', '4')
                      ->get();
            }else{
                $samples = DB::table('t_sample_mie')
                        ->join('m_variant_product', 't_sample_mie.mid_product', '=', 'm_variant_product.mid')
                      ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                      ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                      ->join('m_department', 't_sample_mie.dept_id', '=', 'm_department.id')
                      ->select($select)
                      ->where('dept_id', 'like', '%'.$department.'%')
                      ->where('t_sample_mie.status', 'like', '%'.$status.'%')
                      ->where('line_id', 'like', '%'.$line.'%')
                      ->where('shift', 'like', '%'.$shift.'%')
                      ->where('mid_product', '=', $variant)
                      ->whereBetween('sample_date', [$start_time, $end_time])
                      ->where('t_sample_mie.status', '!=', '4')
                      ->get();
              }
        }else{
            $tanggal = $start_time;
            if ($variant == "") {
            $samples = DB::table('t_sample_mie')
                    ->join('m_variant_product', 't_sample_mie.mid_product', '=', 'm_variant_product.mid')
                    ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                    ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                    ->join('m_department', 't_sample_mie.dept_id', '=', 'm_department.id')
                    ->select($select)
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('t_sample_mie.status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('shift', 'like', '%'.$shift.'%')
                    ->where('sample_date', 'like', '%'.$start_time.'%')
                    ->where('t_sample_mie.status', '!=', '4')
                    ->get();
            }else{
            $samples = DB::table('t_sample_mie')
                    ->join('m_variant_product', 't_sample_mie.mid_product', '=', 'm_variant_product.mid')
                    ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                    ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                    ->join('m_department', 't_sample_mie.dept_id', '=', 'm_department.id')
                    ->select($select)
                    ->where('dept_id', 'like', '%'.$department.'%')
                    ->where('t_sample_mie.status', 'like', '%'.$status.'%')
                    ->where('line_id', 'like', '%'.$line.'%')
                    ->where('shift', 'like', '%'.$shift.'%')
                    ->where('mid_product', '=', $variant)
                    ->where('sample_date', 'like', '%'.$start_time.'%')
                    ->where('t_sample_mie.status', '!=', '4')
                    ->get();
                }
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
        })->download('xls');
    }
}
