<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;
class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function department()
    {
        return $this->belongsTo('App\Department', 'dept_id');
    }

    public function listData()
    {
        $user = User::orderBy('name', 'asc')->get();
        $no = 0;
        $data = array();
        foreach ($user as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nik;
            $row[] = $list->dept_id;
            $row[] = $list->name;
            $row[] = $list->jabatan;
            $row[] = $list->email;
            if ($list->status == 'Y') $status = 'Aktif';
            else $status = 'Tidak aktif';
            $row[] = $status;
            $row[] = '<div class="btn-group">
                      <a onClick="editForm('.$list->nik.')" class="btn btn-primary btn-sm text-white"><i class="fa fa-pencil"></i></a>
                      <a onClick="deleteData('.$list->nik.')" class="btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i></a>
                      </div>';
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
            'nik' => 'required|max:12|unique:m_user',
            'name' => 'required|max:50',
            'dept_id' => 'required|max:3',
            'name' => 'required|max:50',
            'jabatan' => 'required|max:30',
            'email' => 'required|email|max:100'
        ]);
        if($validator->passes()){
          $user = new User;
          $user->nik = $request['nik'];
          $user->name = $request['name'];
          $user->dept_id = $request['dept_id'];
          $user->jabatan = $request['jabatan'];
          $user->email = $request['email'];
          $user->dept_id = $request['dept_id'];
          $user->status = $status;
          $user->created_by = '25749';
          $user->updated_by = '25749';
          $user->save();
          return response()->json(['success' => '1', 'action' => 'created']);
        }else{
          return response()->json(['success' => '0','errors' => $validator->errors()]);
        }

    }

    public function edit($id)
    {
        $user = User::find($id);
        echo json_encode($user);
    }

    public function update(Request $request, $id)
    {
        if ($request['status']) $status = 'Y';
        else $status = 'N';

        $validator = Validator::make($request->all(), [
            'nik' => 'required|max:12',
            'name' => 'required|max:50',
            'dept_id' => 'required|max:3',
            'name' => 'required|max:50',
            'jabatan' => 'required|max:30',
            'email' => 'required|email|max:100'
        ]);

        if($validator->passes()){
          $user = User::find($id);
          $user->name = $request['name'];
          $user->dept_id = $request['dept_id'];
          $user->jabatan = $request['jabatan'];
          $user->email = $request['email'];
          $user->dept_id = $request['dept_id'];
          $user->status = $status;
          $user->created_by = '25749';
          $user->updated_by = '25749';
          $user->update();
          return response()->json(['success' => '1', 'action' => 'updated']);
        }else{
          return response()->json(['success' => '0','errors' => $validator->errors()]);
        }
    }

    public function status($status, $id)
    {
        $user = User::find($id);
        $user->status = $status;
        $user->update();
    }

    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();
      return response()->json(['action' => 'deleted']);
    }
}
