<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuthPermission;

class AuthPermissionController extends Controller
{
    public function showAll()
    {
        $permissions = AuthPermission::all();
        return $permissions;
    }

    public function create(Request $request)
    {
        return $request->all();
    }
}
