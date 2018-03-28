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
        return view('qc.create-sample', ['departments' => $department, 'jam_samples' => $jam_sample, 'variant_products' => $variant_products]);
    }
}
