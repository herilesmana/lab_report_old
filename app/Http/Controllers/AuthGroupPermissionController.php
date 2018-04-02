<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthGroupPermissionController extends Controller
{
    public function getById($auth_id)
    {
        $id = array();
        $permissions = DB::table('auth_permission')
                        ->join('auth_group_permission', 'auth_permission.id', '=', 'auth_group_permission.permission_id')
                        ->join('auth_group', 'auth_group_permission.group_id', '=', 'auth_group.id')
                        ->where('auth_group_permission.group_id', $auth_id)
                        ->select('auth_permission.id')
                        ->get();
        foreach ($permissions as $permission) {
            array_push($id, $permission->id);
        }
        return $id;
    }
}
