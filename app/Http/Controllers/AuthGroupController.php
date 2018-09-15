<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuthGroup;
use App\AuthGroupPermission;
use App\AuthGroupReport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthGroupController extends Controller
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
        return view('otorisasi.auth-group', ['permissions' => $this->permissions]);
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

            if ($request->permissions && $request->reports ) {
                $auth_group = AuthGroup::orderBy('created_at', 'desc')
                ->take(1)
                ->first();
                for ($i=0; $i < count($request->permissions) ; $i++) {
                    $group_permission = new AuthGroupPermission;
                    $group_permission->group_id = $auth_group->id;
                    $group_permission->permission_id = $request->permissions[$i];
                    $group_permission->save();
                }
                for ($i=0; $i < count($request->reports) ; $i++) {
                    $group_report = new AuthGroupReport;
                    $group_report->group_id = $auth_group->id;
                    $group_report->report_id = $request->reports[$i];
                    $group_report->save();
                }
                return response()->json(['success' => '1', 'action' => 'created']);
            }elseif (!$request->permissions && $request->reports ) {
                $auth_group = AuthGroup::orderBy('created_at', 'desc')
                ->take(1)
                ->first();
                for ($i=0; $i < count($request->reports) ; $i++) {
                    $group_report = new AuthGroupReport;
                    $group_report->group_id = $auth_group->id;
                    $group_report->report_id = $request->reports[$i];
                    $group_report->save();
                }
                return response()->json(['success' => '1', 'action' => 'created']);
            }elseif ($request->permissions && !$request->reports ) {
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
            }else{
                return response()->json(['success' => '1', 'action' => 'created']);
            }
        }else{
            return response()->json(['success' => '0','errors' => $validator->errors()]);
        }
    }
    public function destroy($id)
    {
      $auth_group_permissions = DB::table('auth_group_permission')->where('group_id', '=', $id);
      $auth_group_permissions->delete();
      $auth_group_reports = DB::table('auth_group_report')->where('group_id', '=', $id);
      $auth_group_reports->delete();
      $auth_group = AuthGroup::find($id);
      $auth_group->delete();
      return response()->json(['action' => 'deleted']);
    }
    public function change(Request $request, $group_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50'
        ]);
        if($validator->passes())
        {
            $permission_sekarang = array();
            $group_permission = DB::table('auth_permission')
                            ->join('auth_group_permission', 'auth_permission.id', '=', 'auth_group_permission.permission_id')
                            ->join('auth_group', 'auth_group_permission.group_id', '=', 'auth_group.id')
                            ->where('auth_group_permission.group_id', $group_id)
                            ->select('auth_permission.id')
                            ->get();
            foreach ($group_permission as $permission) {
                array_push($permission_sekarang, $permission->id);
            }

            $report_sekarang = array();
            $group_report = DB::table('auth_report')
                            ->join('auth_group_report', 'auth_report.id', '=', 'auth_group_report.report_id')
                            ->join('auth_group', 'auth_group_report.group_id', '=', 'auth_group.id')
                            ->where('auth_group_report.group_id', $group_id)
                            ->select('auth_report.id')
                            ->get();
            foreach ($group_report as $report) {
                array_push($report_sekarang, $report->id);
            }

            if (!$request->permissions || !$request->reports) {
              // Hapus semua jika tidak ada permission yang di checklist
              $group_permission = AuthGroupPermission::where('group_id', $group_id);
              $group_permission->delete();
              $group_report = AuthGroupReport::where('group_id', $group_id);
              $group_report->delete();
            }else{
                // Insert jika ada permission tambahan
                for ($i=0; $i < count($request->permissions) ; $i++) {
                    if (!in_array($request->permissions[$i], $permission_sekarang)) {
                      $group_permission = new AuthGroupPermission;
                      $group_permission->group_id = $group_id;
                      $group_permission->permission_id = $request->permissions[$i];
                      $group_permission->save();
                    }
                }
                // Delete jika ada permission yang diuncheck
                for ($i=0; $i < count($permission_sekarang) ; $i++) {
                    if (!in_array($permission_sekarang[$i], $request->permissions)) {
                      $group_permission = AuthGroupPermission::where('permission_id', $permission_sekarang[$i])
                      ->where('group_id', $group_id);
                      $group_permission->delete();
                    }
                }

                // Insert jika ada report tambahan
                for ($i=0; $i < count($request->reports) ; $i++) {
                    if (!in_array($request->reports[$i], $report_sekarang)) {
                      $group_report = new AuthGroupReport;
                      $group_report->group_id = $group_id;
                      $group_report->report_id = $request->reports[$i];
                      $group_report->save();
                    }
                }
                // Delete jika ada report yang diuncheck
                for ($i=0; $i < count($report_sekarang) ; $i++) {
                    if (!in_array($report_sekarang[$i], $request->reports)) {
                      $group_report = AuthGroupReport::where('report_id', $report_sekarang[$i])
                      ->where('group_id', $group_id);
                      $group_report->delete();
                    }
                }
            }
            return response()->json(['success' => '1', 'action' => 'changed']);
        }else{
            return response()->json(['success' => '0','errors' => $validator->errors()]);
        }
    }
}
