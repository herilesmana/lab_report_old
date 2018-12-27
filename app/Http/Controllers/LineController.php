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
      $department = Department::all();
      return view('line.index', ['departments' => $department, 'permissions' => $this->permissions]);
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

    // function untuk get line berdasarkan sample minyak
    public function get_by_minyak($dept_id,$tanggal_sample,$jam_sample)
    {
        $options = [];
        $details = [];
        $in_sample_lines = array();

        $all_line = DB::table('m_line')->where('dept_id', $dept_id)->get();

        foreach ($all_line as $line) {
            $samples = DB::table('t_sample_minyak')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->join('m_variant_product', 't_sample_minyak.mid_product', '=', 'm_variant_product.mid')
                    ->where('t_sample_minyak.dept_id', $dept_id)
                    ->where('t_sample_minyak.sample_date', $tanggal_sample)
                    ->where('t_sample_minyak.sample_time', $jam_sample)
                    ->where('t_sample_minyak.line_id', $line->id)
                    ->select('t_sample_minyak.approve','t_sample_minyak.mid_product','t_sample_minyak.ulang','t_sample_minyak.line_id','m_variant_product.name as variant', 't_sample_minyak.id', 't_sample_minyak.status', 't_pv.tangki as tangki')
                    ->orderBy('t_sample_minyak.line_id', 'asc');
            if ($samples->exists()) {

                // variabel untuk menyimpan sample dengan id line yang sama.
                $kumpulan_sampel = "";
                $kumpulan_sampel2 = "";
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
                        if ($sample->ulang == 'Y') {
                            $ket = "<i class='fa fa-refresh'></i>";
                            $ulang_button = "";
                        }else{
                            $ket = "";
                            $ulang_button = "<button type='button' onClick=\"samplingUlang('".$line->id."','".$sample->mid_product."','".$sample->tangki."')\" class='btn btn-sm btn-outline-blue'><i class='fa fa-rotate-left'></i> Sampling Ulang</button>";
                        }
                        if ($sample->approve == 'Y') {
                            $hapus_button = "<i class='close'>Approved</i>";
                        }else{
                            $hapus_button = "<button onClick='hapusSample(\"".$sample->id."\")' type='button' class='close' style='background-color: #f64846; color: #ffffff'><span aria-hidden='true'>&times;</span></button>";
                        }
                        $kumpulan_sampel .= "<li>".$status." ".$sample_id." (".$sample->tangki.") ".$ket."</li>";
                        $kumpulan_sampel2 .= "<li class='alert alert-success'>".$sample->id."-".$sample->variant."-".$sample->tangki." ".$ulang_button.$hapus_button."</li>";
                    }
                }
                $detail = '
                <div class="modal" tabindex="-1" id="'.str_replace(' ','-',$line->id).'" role="dialog">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Create Sample</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          <form>
                            <div class="modal-body">'.$kumpulan_sampel2.'</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onClick="createSample(\''.$line->id.'\')">Buat Baru</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                      </div>
                  </div>
                </div>
                ';
                $option = "
                        <div onClick=\"detail('".str_replace(' ', '-', $line->id)."')\" style=\"position: relative; min-height: 100px; margin-right: 0px;margin-top: 2px;margin-bottom: 2px; width: 140px\" class=\"btn btn-outline-green text-left\">
                          <strong>".$line->id."</strong><br>
                          <ul style=\"list-style:none;margin:0;padding:0\">
                            ".$kumpulan_sampel."
                          </ul>
                        </div>";
                      array_push($options, $option);
                      array_push($details, $detail);
            }else{
                if ($line->id == 'BB Noodle Bag' || $line->id == 'BB Noodle Cup') {
                    $option = "<div style=\"display: none; position: relative;min-height: 100px; margin: 2px; width: 140px\" class=\"btn btn-outline-secondary text-left\"><strong>".$line->id."</strong><br><span style=\"font-size: 10px;\">Menunggu Sample</span></div>";
                }else{
                    $option = "<div onClick=\"createSample('".$line->id."')\" style=\"position: relative;min-height: 100px; margin: 2px; width: 140px\" class=\"btn btn-outline-info text-left\"><strong>".$line->id."</strong><br><span style=\"font-size: 10px;\">Menunggu Sample</span></div>";
                }
                array_push($options, $option);
            }
        }
        return response()->json(['option' => $options, 'detail' => $details], 200);
    }

    // function untuk get line berdasarkan sample mie
    public function get_by_mie($dept_id,$tanggal_sample,$shift)
    {
        $options = [];
        $details = [];
        $in_sample_lines = array();

        $all_line = DB::table('m_line')->where('dept_id', $dept_id)->get();

        foreach ($all_line as $line) {
            $samples = DB::table('t_sample_mie')
                    ->join('m_variant_product', 't_sample_mie.mid_product', '=', 'm_variant_product.mid')
                    ->where('t_sample_mie.dept_id', $dept_id)
                    ->where('t_sample_mie.sample_date', $tanggal_sample)
                    ->where('t_sample_mie.shift', $shift)
                    ->where('t_sample_mie.line_id', $line->id)
                    ->select('t_sample_mie.shift as shift','t_sample_mie.line_id','m_variant_product.name as variant', 't_sample_mie.id', 't_sample_mie.status')
                    ->orderBy('t_sample_mie.line_id', 'asc');
            if ($samples->exists()) {

                // variabel untuk menyimpan sample dengan id line yang sama.
                $kumpulan_sampel = "";
                $kumpulan_sampel2 = "";
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
                        $kumpulan_sampel = "<li style=\"padding: 2px; border-radius:5px;box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12)\">".$status." ".$sample->id."<br/>".$sample->variant."</li>";
                        $kumpulan_sampel2 .= "<li class='alert alert-success'>".$sample->id."-".$sample->variant."<button onClick='hapusSample(\"".$sample->id."\")' type='button' class='close' style='background-color: #f64846; color: #ffffff'><span aria-hidden='true'>&times;</span></button></li>";
                    }
                }
                $detail = '
                <div class="modal" tabindex="-1" id="mie'.str_replace(' ','-',$line->id).'" role="dialog">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Create Sample</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          <form>
                            <div class="modal-body">'.$kumpulan_sampel2.'</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onClick="createSample(\''.$line->id.'\')">Ganti Variant</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                      </div>
                  </div>
                </div>
                ';
                $option = "
                        <div onClick=\"detail('".str_replace(' ', '-', $line->id)."')\" style=\"min-height: 100px; margin: 0px; width: 140px\" class=\"btn btn-outline-green text-left\">
                          <strong>".$line->id."</strong><br>
                          <ul style=\"list-style:none;margin:0;padding:0\">
                            ".$kumpulan_sampel."
                          </ul>
                        </div>";
                      array_push($options, $option);
                      array_push($details, $detail);
            }else{
                if ($line->id != 'BB Noodle Bag' && $line->id != 'BB Noodle Cup') {
                  $option = "<div onClick=\"createSample('".$line->id."')\" style=\"height: 100px; margin: 2px; width: 140px\" class=\"btn btn-outline-info text-left\"><strong>".$line->id."</strong><br><span style=\"font-size: 10px;\">Menunggu Sample</span></div>";
                  array_push($options, $option);
                }
            }
        }
        return response()->json(['option' => $options, 'detail' => $details], 200);
    }

    public function get_one_line($dept)
    {
       $line = DB::table('m_line')
              ->where('dept_id','=',$dept)
              ->orderBy('dept_id', 'asc')
              ->first();
      echo json_encode($line);
    }

    public function get_all_line($dept)
    {
       $line = DB::table('m_line')
              ->where('dept_id','=',$dept)
              ->orderBy('id', 'asc')
              ->get();
      echo json_encode($line);
    }

    public function destroy($id)
    {
      $line = Line::find($id);
      $line->delete();
      return response()->json(['action' => 'deleted']);
    }
}
