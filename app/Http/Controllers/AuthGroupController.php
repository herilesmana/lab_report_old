<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuthGroup;
use App\AuthGroupPermission;
use Illuminate\Support\Facades\Validator;

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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50|unique:auth_group'
        ]);
        if($validator->passes())
        {
            $auth_group = new AuthGroup;
            $auth_group->name = $request['name'];
            $auth_group->save();
            if (!$request->permissions) {
                return response()->json(['success' => '1', 'action' => 'created']);
            }else{
                $auth_group = AuthGroup::orderBy('created_at', 'desc')
                ->take(1)
                ->first();
                for ($i=0; $i < count($request->permissions) ; $i++) {
                    $group_permission = new AuthGroupPermission;
                    $group_permission->group_id = $auth_group->id;
                    $group_permission->permission_id = $request->permissions[$i];
                    $group_permission->save();
                }
                return response()->json(['success' => '1', 'action' => 'created']);
            }
        }else{
            return response()->json(['success' => '0','errors' => $validator->errors()]);
        }
    }
}
