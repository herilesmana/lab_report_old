<?php

namespace App\Http\Controllers;

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
}
