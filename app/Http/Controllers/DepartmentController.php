<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Department;
use App\LogDepartment;

class DepartmentController extends Controller
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
      return view('department.index', ['permissions' => $this->permissions]);
    }

    public function show()
    {
      $department = Department::all();
      return response()->json($department);
    }

    public function listData()
    {
        $department = Department::orderBy('name', 'asc')->get();
        $no = 0;
        $data = array();
        foreach ($department as $list) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $list->id;
          $row[] = $list->name;
          if ($list->dept_group == 'produksi') $dept_group = '<i class="fa fa-check"></i>';
          else $dept_group = '';
          $row[] = $dept_group;
          if ($list->status == 'Y') $status = 'Aktif';
          else $status = 'Tidak aktif';
          $row[] = $status;
          $row[] = "<div class=\"btn-group\">
                    <a onClick=\"editForm('".$list->id."')\" class=\"btn btn-primary btn-sm text-white\"><i class=\"fa fa-pencil\"></i></a>
                    <!-- <a onClick=\"deleteData('".$list->id."')\" class=\"btn btn-danger btn-sm text-white\"><i class=\"fa fa-trash\"></i></a> -->
                    </div>";
          $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }
    public function store(Request $request)
    {
        if ($request['status']) $status = 'Y';
        else $status = 'N';

        $validator = Validator::make($request->all(), [
            'id' => 'required|max:3|unique:m_department',
            'name' => 'required|max:50'
        ]);
        if($validator->passes()){
          $department = new Department;
          $department->id = $request['id'];
          $department->name = $request['name'];
          $department->dept_group = $request['produksi'];
          $department->status = $status;
          $department->created_by = Auth::user()->nik;
          $department->updated_by = Auth::user()->nik;
          $department->save();
          // Untuk Log
          $log = new LogDepartment;
          $log->dept_id = $request['id'];
          $log->nik = Auth::user()->nik;
          $log->log_time = date('Y-m-d H:i:s');
          $log->action = 'create';
          $log->keterangan = Auth::user()->nik.' created dept_id '.$request['id'].' at '.date('Y-m-d H:i:s');
          $log->save();

          return response()->json(['success' => '1', 'action' => 'created']);
        }else{
          return response()->json(['success' => '0','errors' => $validator->errors()]);
        }

    }

    public function edit($id)
    {
        $department = Department::find($id);
        echo json_encode($department);
    }

    public function update(Request $request, $id)
    {
        if ($request['status']) $status = 'Y';
        else $status = 'N';
        $validator = Validator::make($request->all(), [
            'id' => 'required|max:3',
            'name' => 'required|max:50'
        ]);
        if($validator->passes()){
          $department = Department::find($id);
          $department->name = $request['name'];
          $department->dept_group = $request['produksi'];
          $department->status = $status;
          $department->updated_by = Auth::user()->nik;
          $department->update();
          // Untuk Log
          $log = new LogDepartment;
          $log->dept_id = $request['id'];
          $log->nik = Auth::user()->nik;
          $log->log_time = date('Y-m-d H:i:s');
          $log->action = 'update';
          $log->keterangan = Auth::user()->nik.' updated dept_id '.$request['id'].' at '.date('Y-m-d H:i:s');
          $log->save();
          return response()->json(['success' => '1', 'action' => 'updated']);
        }else{
          return response()->json(['success' => '0','errors' => $validator->errors()]);
        }
    }

    public function status($status, $id)
    {
        $department = Department::find($id);
        $department->status = $status;
        $department->update();
        // Untuk Log
        $log = new LogDepartment;
        $log->dept_id = $request['id'];
        $log->nik = Auth::user()->nik;
        $log->log_time = date('Y-m-d H:i:s');
        $log->action = 'change_status';
        $log->keterangan = Auth::user()->nik.' created dept_id '.$request['id'].' at '.date('Y-m-d H:i:s');
        $log->save();
    }

    public function destroy($id)
    {
      $department = Department::find($id);
      $department->delete();
      // Untuk Log
      $log = new LogDepartment;
      $log->dept_id = $request['id'];
      $log->nik = Auth::user()->nik;
      $log->log_time = date('Y-m-d H:i:s');
      $log->action = 'delete';
      $log->keterangan = Auth::user()->nik.' deleted dept_id '.$request['id'].' at '.date('Y-m-d H:i:s');
      $log->save();
      return response()->json(['action' => 'deleted']);
    }
}
