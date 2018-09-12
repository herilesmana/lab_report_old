<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuthReport;

class AuthReportController extends Controller
{
    public function showAll()
    {
        $reports = AuthReport::all();
        return $reports;
    }

    public function create(Request $request)
    {
        return $request->all();
    }
}
