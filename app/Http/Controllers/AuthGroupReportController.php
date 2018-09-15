<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AuthReport;

class AuthGroupReportController extends Controller
{
    public function getById($group_id)
    {
        $id = array();
        $option = '';
        $group_report = DB::table('auth_report')
                        ->join('auth_group_report', 'auth_report.id', '=', 'auth_group_report.report_id')
                        ->join('auth_group', 'auth_group_report.group_id', '=', 'auth_group.id')
                        ->where('auth_group_report.group_id', $group_id)
                        ->select('auth_report.id')
                        ->get();
        $reports = AuthReport::all();
        foreach ($group_report as $report) {
            array_push($id, $report->id);
        }
        foreach ($reports as $report) {
            if (in_array($report->id, $id)) {
                $option .= "<div class='custom-control custom-checkbox'><input checked type='checkbox' name='reports[]' value='".$report->id."' id='".$report->codename."'> <label for='".$report->codename."'>".$report->name."</label></div>";
            }else{
                $option .= "<div class='custom-control custom-checkbox'><input type='checkbox' name='reports[]' value='".$report->id."' id='".$report->codename."'> <label for='".$report->codename."'>".$report->name."</label></div>";
            }
        }

        return response()->json(['options' => $option], 200);
    }
}
