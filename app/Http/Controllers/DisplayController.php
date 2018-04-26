<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisplayController extends Controller
{
    public function index($dept = '', $line = '')
    {
        return view('display.view', ['dept' => $dept, 'line' => $line]);
    }
    public function get_last_minyak($tangki = '', $dept = '', $line = '')
    {
      $sample_minyak = Db::table('t_sample_minyak')
      ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
      ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
      ->join('m_department', 't_sample_minyak.dept_id', '=', 'm_department.id')
      ->select('m_department.name as nama_department','t_sample_minyak.*', 't_pv.tangki','t_pv.nilai as nilai_pv','t_ffa.nilai as nilai_ffa')
      ->where('t_sample_minyak.status', 3)
      ->where('t_pv.tangki', 'like', '%'.$tangki.'%')
      ->where('m_department.name', '=', $dept)
      ->where('line_id', '=', str_replace('%20', ' ', $line))
      ->latest()
      ->first();
      return json_encode($sample_minyak);
    }
}
