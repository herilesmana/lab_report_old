<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Line;
use App\Department;

class LineController extends Controller
{
    public function index()
    {
      $department = Department::all();
      return view('line.index', ['departments' => $department]);
    }

    public function listData()
    {
        $line = DB::table('m_line')
                ->join('m_department', 'm_line.dept_id', '=', 'm_department.id')
                ->select('m_line.*', 'm_department.name as dept_name')
                ->get();
        $no = 0;
        $data = array();
        foreach ($line as $list) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $list->id;
          $row[] = $list->dept_name;
          if ($list->status == 'Y') $status = 'Aktif';
          else $status = 'Tidak aktif';
          $row[] = $status;
          $row[] = "<div class=\"btn-group\">
                    <a onClick=\"editForm('".$list->id."')\" class=\"btn btn-primary btn-sm text-white\"><i class=\"fa fa-pencil\"></i></a>
                    <a onClick=\"deleteData('".$list->id."')\" class=\"btn btn-danger btn-sm text-white\"><i class=\"fa fa-trash\"></i></a>
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
            'id' => 'required|max:15|unique:m_line',
            'dept' => 'required|max:50'
        ]);
        if($validator->passes()){
          $line = new Line;
          $line->id = $request['id'];
          $line->dept_id = $request['dept'];
          $line->status = $status;
          $line->created_by = Auth::user()->nik;
          $line->updated_by = Auth::user()->nik;
          $line->save();
          return response()->json(['success' => '1', 'action' => 'created']);
        }else{
          return response()->json(['success' => '0','errors' => $validator->errors()]);
        }

    }

    public function edit($id)
    {
        $line = Line::find($id);
        echo json_encode($line);
    }

    public function per_department($dept_id)
    {
        $line = DB::table('m_line')
                ->where('dept_id','=',$dept_id)
                ->orderBy('dept_id', 'asc')
                ->get();
        echo json_encode($line);
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
          $line = Line::find($id);
          $line->dept_name = $request['dept_name'];
          $line->status = $status;
          $line->updated_by = Auth::user()->nik;
          $line->update();
          return response()->json(['success' => '1', 'action' => 'updated']);
        }else{
          return response()->json(['success' => '0','errors' => $validator->errors()]);
        }
    }

    public function status($status, $id)
    {
        $line = Line::find($id);
        $line->status = $status;
        $line->update();
    }

    public function get($dept_id,$tanggal_sample,$jam_sample)
    {
        $option = '';
        $in_sample_lines = array();

        $all_line = DB::table('m_line')->where('dept_id', $dept_id)->get();

        foreach ($all_line as $line) {
            $samples = DB::table('t_sample_minyak')
                    ->where('t_sample_minyak.dept_id', $dept_id)
                    ->where('t_sample_minyak.sample_date', $tanggal_sample)
                    ->where('t_sample_minyak.sample_time', $jam_sample)
                    ->where('t_sample_minyak.line_id', $line->id)
                    ->select('t_sample_minyak.line_id', 't_sample_minyak.id', 't_sample_minyak.status')
                    ->orderBy('t_sample_minyak.line_id', 'asc');
            if ($samples->exists()) {
                foreach ($samples->get() as $sample) {
                    if ($sample->status == 1) {
                        $status = 'Menunggu Hasil';
                    }elseif ($sample->status == 2) {
                        $status = 'Menunggu Approve';
                    }elseif ($sample->status == 3) {
                        $status = 'Selesai';
                    }
                    $option .= "<button onClick=\"createSample('".$line->id."')\" style=\"height: 80px; margin: 2px; width: 140px\" type=\"button\" class=\"btn btn-outline-green text-left\"><strong>".$line->id."</strong><br><span style=\"font-size: 10px;\">".$status."</span><br><span style=\"font-size: 10px;\">ID : ".$sample->id."</span></button>";
                }
            }else{
                $option .= "<button onClick=\"createSample('".$line->id."')\" style=\"height: 80px; margin: 2px; width: 140px\" type=\"button\" class=\"btn btn-outline-info text-left\"><strong>".$line->id."</strong><br><span style=\"font-size: 10px;\">Menunggu Sample</span></button>";
            }
        }
        return response()->json(['option' => $option], 200);
    }

    public function destroy($id)
    {
      $line = Line::find($id);
      $line->delete();
      return response()->json(['action' => 'deleted']);
    }
}
