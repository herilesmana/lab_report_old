<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Changelog;

class ChangelogController extends Controller
{
    var $permissions = [];
    public function set_permissions()
    {
      // query untuk mendapatkan semua permission berdasarkan auth id milik user.
        $get_permissions = DB::table('auth_permission')
                          ->join('auth_group_permission', 'auth_permission.id', '=', 'auth_group_permission.permission_id')
                          ->join('auth_group', 'auth_group.id', '=', 'auth_group_permission.group_id')
                          ->select('auth_permission.codename as codename')
                          ->where('auth_group.id','=', Auth::user()->group_id)
                          ->get();
        foreach ($get_permissions as $permission) {
            array_push($this->permissions, $permission->codename);
        }
    }
    public function index()
    {
      $this->set_permissions();
      $changelog = Changelog::orderBy('version_number', 'desc')->get();
      return view('changelog.index', ['permissions' => $this->permissions, 'changelogs' => $changelog]);
    }

    public function show()
    {
      $changelog = Changelog::all();
      return response()->json($changelog);
    }

    public function listData()
    {
        $changelog = Changelog::orderBy('name', 'asc')->get();
        return response()->json($changelog);
    }
}
