<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\MShift;
class ShiftController extends Controller
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
        return view('shift.index', ['permissions' => $this->permissions]);
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
          $shift->created_by = Auth::user()->nik;
          $shift->updated_by = Auth::user()->nik;
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
          $shift->updated_by = Auth::user()->nik;
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

    // function untuk get shift berdasarkan department
    public function get_sample_pershift($dept_id,$tanggal_sample)
    {
        $shifts = DB::table('t_shift')->select('shift')->where('date','=', $tanggal_sample)->first();
        if (is_null($shifts)) {
          return response()->json(['success' => 5, 'keterangan' => 'Jadwal tanggal '.$tanggal_sample], 200);
        }
        if ( $shifts->shift == 'SS') {
          $like = 'SS';
        }else{
          $like = 'NS';
        }
        $all_shift = DB::table('m_shift')->where("name", "like", $like."%")->get();
        $options = [];
        foreach ($all_shift as $shift) {
            $kumpulan_sampel = '';
            $samples = DB::table('t_sample_minyak')
                    ->join('m_shift', 't_sample_minyak.shift', '=', 'm_shift.name')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('m_variant_product', 't_sample_minyak.mid_product', '=', 'm_variant_product.mid')
                    ->where('t_sample_minyak.dept_id', $dept_id)
                    ->where('t_sample_minyak.sample_date', $tanggal_sample)
                    ->where('t_sample_minyak.shift', $shift->name)
                    ->where('t_pv.tangki', 'BB')
                    ->select('t_sample_minyak.shift','m_variant_product.name as variant', 't_sample_minyak.id', 't_sample_minyak.status', 't_pv.tangki as tangki')
                    ->orderBy('m_shift.name', 'asc');
            if ($samples->exists()) {
                foreach ($samples->get() as $sample) {
                    // Pastikan bukan id yang sudah dihapus
                    if ($sample->status != 4) {
                        // Untuk icon penanda status
                        if ($sample->status == 1) {
                            $status = '<i class="fa fa-flask"></i>';
                        }elseif ($sample->status == 2) {
                            $status = '<i class="fa fa-clock-o"></i>';
                        }elseif ($sample->status == 3) {
                            $status = '<i class="fa fa-check"></i>';
                        }
                        $sample_id = substr($sample->id, 0, 3)."...".substr($sample->id, 9, 3);
                        $kumpulan_sampel .= "<li>".$status." ".$sample_id." (".$sample->tangki.")</li>";
                        // $kumpulan_sampel2 .= "<li class='alert alert-success'>".$sample->id."-".$sample->variant."-".$sample->tangki." <button onClick='hapusSample(\"".$sample->id."\")' type='button' class='close' style='background-color: #f64846; color: #ffffff'><span aria-hidden='true'>&times;</span></button></li>";
                    }
                }
                $option = "
                        <div onClick=\"alert('Anda sudah membuat sample ini!')\" style=\"position: relative; height: 100px; margin: 2px; width: 140px\" class=\"btn btn-outline-green text-left\">
                          <strong>".$shift->name."</strong><br>
                          <ul style=\"list-style:none;margin:0;padding:0\">
                            ".$kumpulan_sampel."
                          </ul>
                        </div>";
                      array_push($options, $option);
            }else{
                $option = "<div onClick=\"BBCreateSample('".$shift->name."')\" style=\"position: relative;height: 100px; margin: 2px; width: 140px\" class=\"btn btn-outline-info text-left\"><strong>".$shift->name."</strong><br><span style=\"font-size: 10px;\">Menunggu Sample</span></div>";
                array_push($options, $option);
            }
        }
        return response()->json(['option' => $options], 200);
    }
}
