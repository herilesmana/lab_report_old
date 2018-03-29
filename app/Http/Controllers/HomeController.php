<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\JamSample;
use App\VariantProduct;

class HomeController extends Controller
{

    public function index()
    {
        $variant_products = VariantProduct::all();
        $jam_sample = JamSample::all();
        $department = Department::all();
        $dept_name = Department::where('id', session()->get('department'))->first();
        if($dept_name->name == "QC") {
            return view('qc.create-sample', ['departments' => $department, 'jam_samples' => $jam_sample, 'variant_products' => $variant_products]);
        }elseif ($dept_name->name == "QA") {
            return view('qa.upload-hasil-sample');
        }else{
            return view('home');
        }

    }
}
