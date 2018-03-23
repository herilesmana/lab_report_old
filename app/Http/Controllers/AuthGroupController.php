<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuthGroup;

class AuthGroupController extends Controller
{
    public function index()
    {
        return view('otorisasi.auth-group');
    }
    public function show()
    {
        $auth_group = AuthGroup::orderBy('name', 'asc')->get();
        $no = 0;
        $data = array();
        foreach ($auth_group as $list) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = "<a href=\"javascript:;\" onClick=\"setAuthPermission('".$list->id."')\">".$list->name."</a>";
          $row[] = "<div class=\"btn-group\">
                    <a onClick=\"deleteData('".$list->id."')\" class=\"btn btn-danger btn-sm text-white\"><i class=\"fa fa-trash\"></i></a>
                    </div>";
          $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }

    public function edit($id)
    {
        $auth_group = AuthGroup::find($id);
        echo json_encode($auth_group);
    }
}
