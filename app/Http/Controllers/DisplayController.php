<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;
use App\Line;

class DisplayController extends Controller
{
    public function index($dept = '', $line = '')
    {
        $department = Department::all();
        if ($dept == '' && $line == '') {
            return view('display.index', ['departments' => $department]);
        }else{
            return view('display.perline', ['dept' => $dept, 'line' => $line]);
        }
    }
    public function index2($dept = '', $line = '')
    {
        $department = Department::all();
        if ($dept == '' && $line == '') {
            return view('display2.index', ['departments' => $department]);
        }else{
            return view('display2.perline', ['dept' => $dept, 'line' => $line]);
        }
    }
    public function all_line($dept = '')
    {
        $department = DB::table('m_department')
        ->select('id','name')
        ->where('name', $dept)
        ->first();
        return view('display.all_line', ['dept' => $department]);
    }
    function minyak_get_history($dept,$line)
    {
        $sample_minyak = Db::table('t_sample_minyak')
        ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
        ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
        ->join('m_department', 't_sample_minyak.dept_id', '=', 'm_department.id')
        ->select('t_ffa.used','t_pv.used','t_sample_minyak.duplo','t_sample_minyak.ulang','t_sample_minyak.input_time','t_sample_minyak.sample_time','t_pv.nilai as nilai_pv','t_ffa.nilai as nilai_ffa')
        ->where('t_sample_minyak.status', 3)
        ->where('t_pv.tangki', '=', 'MP')
        ->where('m_department.name', '=', $dept)
        ->where('line_id', '=', str_replace('-', ' ', $line))
        ->where('t_pv.used', '=', 'Y')
        ->where('t_ffa.used', '=', 'Y')
        ->where('t_pv.used', '!=', 'N')
        ->where('t_ffa.used', '!=', 'N')
        ->orderBy('t_sample_minyak.updated_at', 'desc')
        ->take(5)
        ->get();
        return json_encode($sample_minyak);
    }
    public function get_last_minyak($tangki = '', $dept = '', $line = '')
    {
      $sample_minyak = Db::table('t_sample_minyak')
      ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
      ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
      ->join('m_department', 't_sample_minyak.dept_id', '=', 'm_department.id')
      ->join('m_variant_product', 't_sample_minyak.mid_product', '=', 'm_variant_product.mid')
      ->select('m_variant_product.name as variant','m_variant_product.jenis as jenis_variant','m_department.name as nama_department','t_sample_minyak.*', 't_pv.tangki','t_pv.nilai as nilai_pv','t_ffa.nilai as nilai_ffa')
      ->where('t_sample_minyak.status', 3)
      ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
      ->where('m_department.name', '=', $dept)
      ->where('line_id', '=', str_replace('-', ' ', $line))
      ->where('t_pv.used', '!=', 'N')
      ->where('t_ffa.used', '!=', 'N')
      ->orderBy('t_sample_minyak.updated_at', 'desc')
      ->first();
      return json_encode($sample_minyak);
    }
    function mie_get_result($dept, $line)
    {
        $sample_mie = Db::table('t_sample_mie')
        ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
        ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
        ->join('m_variant_product', 't_sample_mie.mid_product', '=', 'm_variant_product.mid')
        ->join('m_department', 't_sample_mie.dept_id', '=', 'm_department.id')
        ->select('m_variant_product.name as variant','t_sample_mie.created_at','t_sample_mie.mid_product','t_sample_mie.shift','t_fc.nilai as nilai_fc','t_ka.nilai as nilai_ka')
        ->where('t_sample_mie.status', 3)
        ->where('m_department.name', '=', $dept)
        ->where('line_id', '=', str_replace('-', ' ', $line))
        ->orderBy('t_sample_mie.updated_at', 'desc')
        ->first();
        return json_encode($sample_mie);
    }
    function mie_get_history($dept, $line)
    {
        $sample_mie = Db::table('t_sample_mie')
        ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
        ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
        ->join('m_department', 't_sample_mie.dept_id', '=', 'm_department.id')
        ->select('t_sample_mie.mid_product','t_sample_mie.shift','t_fc.nilai as nilai_fc','t_ka.nilai as nilai_ka')
        ->where('t_sample_mie.status', 3)
        ->where('m_department.name', '=', $dept)
        ->where('line_id', '=', str_replace('-', ' ', $line))
        ->orderBy('t_sample_mie.updated_at', 'desc')
        ->take(5)
        ->get();
        return json_encode($sample_mie);
    }

}
