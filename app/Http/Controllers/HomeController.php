<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
class HomeController extends Controller
{

    public function index($jenis = '')
    {
        $department = Department::where('id', session()->get('department'))->first();
        if($department->name == "QC") {
            return redirect()->action(
              'SampleMinyakController@create_sample_id', ['jenis' => $jenis]
            );
        }elseif ($department->name == "QA") {
            return redirect()->action('SampleMinyakController@upload_sample_result', ['jenis' => $jenis]);
        }else{
            return view('home');
        }

    }
}
