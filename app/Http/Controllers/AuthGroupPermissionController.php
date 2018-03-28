<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthGroupPermissionController extends Controller
{
    public function get_permission($auth_id)
    {
        $permission = DB::table('auth_permission')
                        ->join('auth_group_permission', 'auth_permission.id', '=', 'auth_group_permission.permission_id')
                        ->join('auth_group', 'auth_group_permission.group_id', '=', 'auth_group.id')
                        ->where('auth_group_permission.group_id', $auth_id)
                        ->select('auth_permission.codename', 'auth_permission.name')
                        ->get();
        dd($permission);
    }
}
