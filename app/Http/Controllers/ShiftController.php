<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\MShift;
class ShiftController extends Controller
{
    public function index()
    {
        return view('shift.index');
    }

    public function listData()
    {
        $shift = MShift::orderBy('name', 'asc')->get();
        $no = 0;
        $data = array();
        foreach ($shift as $list) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $list->name;
          $row[] = $list->jam_awal;
          $row[] = $list->jam_akhir;
          if ($list->status == 'Y') $status = 'Aktif';
          else $status = 'Tidak aktif';
          $row[] = $status;
          $row[] = "<div class=\"btn-group\">
                    <a onClick=\"editForm('".$list->name."')\" class=\"btn btn-primary btn-sm text-white\"><i class=\"fa fa-pencil\"></i></a>
                    <a onClick=\"deleteData('".$list->name."')\" class=\"btn btn-danger btn-sm text-white\"><i class=\"fa fa-trash\"></i></a>
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
            'name' => 'required|max:50|unique:m_shift',
            'jam_awal' => 'required',
            'jam_akhir' => 'required'
        ]);
        if($validator->passes()){
          $shift = new MShift;
          $shift->name = $request['name'];
          $shift->jam_awal = $request['jam_awal'];
          $shift->jam_akhir = $request['jam_akhir'];
          $shift->status = $status;
          $shift->created_by = '25749';
          $shift->updated_by = '25749';
          $shift->save();
          return response()->json(['success' => '1', 'action' => 'created']);
        }else{
          return response()->json(['success' => '0','errors' => $validator->errors()]);
        }

    }

    public function edit($id)
    {
        $id = str_replace('%20', ' ', $id);
        $shift = MShift::find("$id");
        echo json_encode($shift);
    }

    public function update(Request $request, $id)
    {
        if ($request['status']) $status = 'Y';
        else $status = 'N';
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'jam_awal' => 'required',
            'jam_akhir' => 'required'
        ]);
        if($validator->passes()){
          $shift = MShift::find($id);
          $shift->name = $request['name'];
          $shift->jam_awal = $request['jam_awal'];
          $shift->jam_akhir = $request['jam_akhir'];
          $shift->status = $status;
          $shift->updated_by = '25749';
          $shift->update();
          return response()->json(['success' => '1', 'action' => 'updated']);
        }else{
          return response()->json(['success' => '0','errors' => $validator->errors()]);
        }
    }

    public function status($status, $id)
    {
        $shift = MShift::find($id);
        $shift->status = $status;
        $shift->update();
    }

    public function destroy($id)
    {
      $shift = MShift::find($id);
      $shift->delete();
      return response()->json(['action' => 'deleted']);
    }
}
