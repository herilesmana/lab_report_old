<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AuthPermission;

class AuthGroupPermissionController extends Controller
{
    public function getById($group_id)
    {
        $id = array();
        $option = '';
        $group_permission = DB::table('auth_permission')
                        ->join('auth_group_permission', 'auth_permission.id', '=', 'auth_group_permission.permission_id')
                        ->join('auth_group', 'auth_group_permission.group_id', '=', 'auth_group.id')
                        ->where('auth_group_permission.group_id', $group_id)
                        ->select('auth_permission.id')
                        ->get();
        $permissions = AuthPermission::all();
        foreach ($group_permission as $permission) {
            array_push($id, $permission->id);
        }
        foreach ($permissions as $permission) {
            if (in_array($permission->id, $id)) {
                $option .= "<div class='custom-control custom-checkbox'><input checked type='checkbox' name='permissions[]' value='".$permission->id."' id='".$permission->codename."'><label for='".$permission->codename."'>".$permission->name."</label></div>";
            }else{
                $option .= "<div class='custom-control custom-checkbox'><input type='checkbox' name='permissions[]' value='".$permission->id."' id='".$permission->codename."'><label for='".$permission->codename."'>".$permission->name."</label></div>";
            }
        }

        return response()->json(['options' => $option], 200);
    }
}
