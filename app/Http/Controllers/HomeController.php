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
            return view('home');
        }elseif ($department->name == "QA") {
            return view('home');
        }else{
            return view('home');
        }

    }
}
