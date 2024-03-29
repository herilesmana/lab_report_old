<?php

namespace App\Http\Controllers;

use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Events\SampleMieEvent;
use App\Department;
use App\VariantProduct;
use App\KA;
use App\FC;
use App\SampleMie;
use App\MShift;
use App\JamSample;
use DateTime;
use Carbon\Carbon;
use App;

use App\LogSampleMie;

class SampleMieController extends Controller
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
    public function input()
    {
        $this->set_permissions();
        $department = DB::table('m_department')->where('dept_group', '=', 'produksi')->get();
        $shift = Mshift::all();
        return view('sample_mie.input', ['departments' => $department, 'shift' => $shift, 'permissions' => $this->permissions]);
    }
    public function edit_approve()
    {
        $this->set_permissions();
        return view('sample_mie.edit-approve', ['permissions' => $this->permissions]);
    }
    public function edit($id)
    {
        $sample = DB::table('t_sample_mie')
                  ->join('m_variant_product', 't_sample_mie.mid_product', '=', 'm_variant_product.mid')
                  ->join('m_department', 't_sample_mie.dept_id', '=', 'm_department.id')
                  ->select('t_sample_mie.*', 'm_department.name as dept_name', 'm_variant_product.name as variant')
                  ->where('t_sample_mie.id', $id)
                  ->first();
        echo json_encode($sample);
    }
    public function submit_edit($id) {
      $sample_mie = SampleMie::find($id);
      $sample_mie->edit = 'Y';
      $sample_mie->status = '1';
      $sample_mie->edit_by = Auth::user()->nik;
      $sample_mie->edit_date = date('Y-m-d');
      $sample_mie->edit_time = date('H:i:s');
      $sample_mie->keterangan = 'Requested for edit by '.Auth::user()->nik;
      $sample_mie->update();
      broadcast(new SampleMieEvent($sample_mie->line_id));
      return response()->json(['success' => 1], 200);
    }
    public function delete_sample($id)
    {
      $sample_mie = SampleMie::find($id);
      $keterangan = 'deleted by '.Auth::user()->nik;
      $sample_mie->keterangan = $keterangan;
      $status = 'delete';
      $sample_mie->status = 4;
      $sample_mie->update();
      // Untuk Log
      $log = new LogSampleMie;
      $log->sample_id = $id;
      $log->nik = Auth::user()->nik;
      $log->log_time = date('Y-m-d H:i:s');
      $log->action = $status;
      $log->keterangan = $keterangan;
      $log->save();
      return response()->json(['success' => 1, 'id' => $id], 200);
    }
    public function per_status($status, $dept)
    {
        // Untuk menampilkan Ka saja
        if ($status == 9) {
            $sample = DB::table('t_sample_mie')
                ->join('m_variant_product', 't_sample_mie.mid_product', '=', 'm_variant_product.mid')
                ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                ->join('m_department', 't_sample_mie.dept_id', '=', 'm_department.id')
                ->select('t_sample_mie.keterangan','t_sample_mie.approve','t_sample_mie.approver','t_sample_mie.with_fc','m_department.name as dept_name','m_variant_product.name as variant','t_sample_mie.*', 't_fc.id as fc_id', 't_ka.id as ka_id', 't_fc.labu_isi as labu_isi_fc', 't_fc.labu_awal as labu_awal_fc', 't_fc.nilai as nilai_fc', 't_fc.bobot_sample as bobot_sample_fc', 't_ka.w0 as w0_ka','t_ka.w1 as w1_ka', 't_ka.w2 as w2_ka', 't_ka.nilai as nilai_ka')
                ->where('t_sample_mie.dept_id', $dept)
                ->where('t_sample_mie.with_fc', 'Y')
                ->where('t_sample_mie.status', 2)
                ->orderBy('t_sample_mie.shift', 'asc')
                ->orderBy('t_sample_mie.line_id', 'asc')
                ->get();
        }else{
            $sample = DB::table('t_sample_mie')
                ->join('m_variant_product', 't_sample_mie.mid_product', '=', 'm_variant_product.mid')
                ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                ->join('m_department', 't_sample_mie.dept_id', '=', 'm_department.id')
                ->select('t_sample_mie.with_fc','m_department.name as dept_name','m_variant_product.name as variant','t_sample_mie.*', 't_fc.id as fc_id', 't_ka.id as ka_id', 't_fc.labu_isi as labu_isi_fc', 't_fc.labu_awal as labu_awal_fc', 't_fc.nilai as nilai_fc', 't_fc.bobot_sample as bobot_sample_fc', 't_ka.w0 as w0_ka','t_ka.w1 as w1_ka', 't_ka.w2 as w2_ka', 't_ka.nilai as nilai_ka')
                ->where('t_sample_mie.status', $status)
                ->where('t_sample_mie.dept_id', $dept)
                ->orderBy('t_sample_mie.shift', 'asc')
                ->orderBy('t_sample_mie.line_id', 'asc')
                ->get();
        }

        return json_encode($sample);
    }

    public function upload_sample_result()
    {
        $this->set_permissions();
        $department = DB::table('m_department')->where('dept_group', '=', 'produksi')->get();
        return view('qa.upload-hasil-sample-mie', ['departments' => $department, 'permissions' => $this->permissions]);
    }
    public function upload_sample_result_fc()
    {
        $this->set_permissions();
        $department = DB::table('m_department')->where('dept_group', '=', 'produksi')->get();
        return view('qa.upload-hasil-sample-mie-fc', ['departments' => $department, 'permissions' => $this->permissions]);
    }

    public function generate_report($tanggal)
    {
      $sample_mie = Db::table('t_sample_mie')
                          ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                          ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                          ->select('t_sample_mie.*', 't_fc.labu_isi', 't_fc.labu_awal', 't_fc.nilai as nilai_fc', 't_fc.bobot_sample', 't_ka.w0','t_ka.w1', 't_ka.w2', 't_ka.nilai as nilai_ka')
                          ->where('t_sample_mie.approve', null)
                          ->where('t_sample_mie.tanggal', date('Y-m-d', strtotime($request['tanggal_sample'])))
                          ->get();
      $no = 0;
      $data = array();
      foreach ($sample_mie as $list) {
        $no++;
        $row = array();
        $row[] = $list->mid_product;
        $row[] = round($list->bobot_sample, 4);
        $row[] = round($list->labu_awal, 4);
        $row[] = round($list->labu_isi, 4);
        $row[] = round($list->nilai_ka, 2);
        $row[] = round($list->w0, 4);
        $row[] = round($list->w1, 4);
        $row[] = round($list->w2, 4);
        $row[] = round($list->nilai_fc, 2);
        $data[] = $row;
      }
      $output = array("data" => $data);
      return response()->json($output);
    }

    public function hasil()
    {
        $this->set_permissions();
        return view('sample_mie.hasil', ['permissions' => $this->permissions]);
    }

    public function approve(Request $request)
    {
        $sample_mie = SampleMie::find($request['id']);
        if ($request['status'] == 'Y') {
            $sample_mie->approve = $request['status'];
        }
        if ($request['fc'] != '') {
            $sample_mie->approve_fc = 'Y';
        }
        if ($request['keterangan']) {
            $sample_mie->keterangan = $request['keterangan'];
            $status = 'reject';
            $sample_mie->status = 1;
            $keterangan = $request['keterangan'];
        }else{
            $keterangan = 'Approved by '.Auth::user()->nik;
            $sample_mie->keterangan = 'Approved by '.Auth::user()->nik;
            $status = 'approve';
            if ($sample_mie->with_fc != "Y") {
                $sample_mie->status = 3;
            }else{
                if ($sample_mie->approve == "Y" && $sample_mie->approve_fc == "Y") {
                    $sample_mie->status = 3;
                }
            }
        }
        $sample_mie->approver = Auth::user()->nik;
        $sample_mie->approve_date = date('Y-m-d');
        $sample_mie->approve_time = date('H:i:s');
        $sample_mie->update();
        // Untuk Log
        $log = new LogSampleMie;
        $log->sample_id = $request['id'];
        $log->nik = Auth::user()->nik;
        $log->log_time = date('Y-m-d H:i:s');
        $log->action = $status;
        $log->keterangan = $keterangan;
        $log->save();

        $sample_mie = Db::table('t_sample_mie')
        ->select('t_sample_mie.line_id')
        ->where('t_sample_mie.id', $request['id'])
        ->first();

        broadcast(new SampleMieEvent($sample_mie->line_id));
        return response()->json(['success' => 1, 'id' => $request['id']], 200);
    }

    public function create_sample_id()
    {
        // $jam_sekarang = date('H:i:s');
        // if(Carbon::createFromFormat("d/m/Y H:i:s","01/01/2007 ".$jam_sekarang) >= Carbon::createFromFormat("d/m/Y H:i:s","01/01/2007 "."00:00:00") && Carbon::createFromFormat("d/m/Y H:i:s", "01/01/2007 ".$jam_sekarang) < Carbon::createFromFormat("d/m/Y H:i:s", "01/01/2007 "."07:00:00") ) {
        //     $sekarang = date('Y-m-d', strtotime('-1 days'));
        // }else{
        //     $sekarang = date('Y-m-d');
        // }
        // // Untuk Id
        // $shifts = DB::table('t_shift')->select('shift')->where('date','=', $sekarang)->first();
        // if (is_null($shifts)) {
        //   echo "<script>alert('Shift untuk tanggal ".$sekarang." belum di set')</script>";
        //   echo "<script>location.href='".App::make('url')->to('/')."'</script>";
        // }else{
        //   $shift_status = $shifts->shift;
        // }
        $this->set_permissions();
        $variant_products = VariantProduct::where('status', 'Y')->get();
        $prn_variant = VariantProduct::where('status', 'Y')->where('dept', 'PRN')->get();
        $pnc_variant = VariantProduct::where('status', 'Y')->where('dept', 'PNC')->get();
        $shift = MShift::select('*')->get();
        $department = Department::where('dept_group', '=', 'produksi')->get();
        return view('qc.create-sample-mie', ['departments' => $department, 'variant_products' => $variant_products, 'pnc_variant' => $pnc_variant, 'prn_variant' => $prn_variant, 'shifts' => $shift, 'permissions' => $this->permissions]);
    }

    public function showHasil()
    {
        $this->set_permissions();
        $_where = [];
        if (!in_array('approve_edit_sample', $this->permissions)) {
          $_where = [2];
        }else{
          $_where = [2,6];
        }
        $sample_mie = Db::table('t_sample_mie')
                            ->join('m_variant_product', 't_sample_mie.mid_product', '=', 'm_variant_product.mid')
                            ->join('t_ka', 't_sample_mie.id', '=', 't_ka.sample_id')
                            ->join('t_fc', 't_sample_mie.id', '=', 't_fc.sample_id')
                            ->join('m_department', 't_sample_mie.dept_id', '=', 'm_department.id')
                            ->select('m_department.name as dept_name','m_variant_product.name as variant','t_sample_mie.*', 't_fc.labu_isi', 't_fc.labu_awal', 't_fc.nilai as nilai_fc', 't_fc.bobot_sample', 't_ka.w0','t_ka.w1', 't_ka.w2', 't_ka.nilai as nilai_ka')
                            ->whereIn('t_sample_mie.status', $_where)
                            ->orderBy('t_sample_mie.line_id', 'asc')
                            ->get();
        $no = 0;
        $data = array();
        foreach ($sample_mie as $list) {
          $no++;
          $row = array();
          if ($list->edit != "Y") {
            $row[] = $list->line_id;
          }else{
            $row[] = "<strong class='text-red' title='Requested for edit by ".$list->edit_by."'>".$list->line_id."</strong class='text-red'>";
          }
          $row[] = $list->variant;
          $row[] = $list->shift;
          $row[] = $list->sample_date.' | '.$list->input_time;
          $row[] = ($list->labu_isi == 0 ? "-" : round($list->labu_isi, 4));
          $row[] = ($list->labu_awal == 0 ? "-" : round($list->labu_awal, 4));
          $row[] = ($list->bobot_sample == 0 ? "-" : round($list->bobot_sample, 4));
          $row[] = "<strong>".($list->nilai_fc == 0 ? "-" : round($list->nilai_fc, 2))."</strong>";
          $row[] = round($list->w0, 4);
          $row[] = round($list->w1, 4);
          $row[] = round($list->w2, 4);
          $row[] = "<strong>".round($list->nilai_ka, 2)."</strong>";
          if ($list->with_fc == "Y") {
            if ($list->nilai_fc != 0) {
                $btn_fc = "<a title=\"Approve KA\" onClick=\"Approve('".$list->id."', 'Y')\" class=\"btn btn-primary btn-sm text-white\"><i class=\"fa fa-check\"></i> FC</a>";
            }else{
                $btn_fc = "<a title=\"Approve KA\" onClick=\"alert('FC belum diinput')\" class=\"btn btn-secondary btn-sm text-white\"><i class=\"fa fa-check\"></i> FC</a>";
            }

          }else{
            $btn_fc = "";
            $btn_ka = "<a title=\"Approve KA\" onClick=\"Approve('".$list->id."')\" class=\"btn btn-primary btn-sm text-white\"><i class=\"fa fa-check\"></i> KA</a>";
          }
          if ($list->with_fc == "Y" && $list->approve == "Y") {
            $btn_ka = "<a title=\"Approve KA\" onClick=\"alert('KA sudah diinput')\" class=\"btn btn-secondary btn-sm text-white\"><i class=\"fa fa-check\"></i> KA</a>";
          }elseif($list->with_fc == "Y" && $list->approve != "Y"){
            $btn_ka = "<a title=\"Approve KA\" onClick=\"Approve('".$list->id."')\" class=\"btn btn-primary btn-sm text-white\"><i class=\"fa fa-check\"></i> KA</a>";
          }
          $row[] = $btn_ka." ".$btn_fc."
                    <a title=\"Revis\" onClick=\"Reject('".$list->id."')\" class=\"btn btn-danger btn-sm text-white\"><i class=\"fa fa-reply\"></i></a>
                    ";
          $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }

    public function create_sample(Request $request)
    {

        $last = DB::table('t_sample_mie')->where('sample_date', '=', $request['tanggal_sample'])->orderBy('id', 'desc')->first();
        if($last == null) {
            $number = '001';
        }else{
            $number = substr($last->id, 9, 3);
            $number = $number + 1;
            if($number < 10 ) {
                $number = '00'.$number;
            }elseif ($number < 100) {
                $number = '0'.$number;
            }
        }
        $tanggal = explode('-',$request['tanggal_sample']);
        if ($tanggal[2] < 10) {
          $tanggal[2] = '0'.$tanggal[2];
        }
        $tanggal[0] = substr($tanggal[0], 2, 2);
        $id = "MIE".$tanggal[0].$tanggal[1].$tanggal[2].$number;

        // Untuk kebutuhan lain
        $dept_id = $request['department'];
        $mid_product = $request['mid'];
        $sample_date = $request['tanggal_sample'];
        $line = $request['line'];
        $input_date = date('Y-m-d');
        $input_time = date('H:i');
        $shift = $request['shift'];
        $created_by = Auth::user()->nik;
        $keterangan = 'created by '.$created_by;
        // Getting NIK of receiver
        $card_number = substr($request['card_number'], 1);
        $_user = DB::table('m_user')->where('card_number', '=', $card_number)->first();
        // Mulai menyimpan
        $sample_mie = new SampleMie;
        $sample_mie->id = $id;
        $sample_mie->dept_id = $dept_id;
        $sample_mie->line_id = $line;
        $sample_mie->mid_product = $mid_product;
        $sample_mie->sample_date = $sample_date;
        $sample_mie->input_date = $input_date;
        $sample_mie->input_time = $input_time;
        $sample_mie->receive = 'Y';
        $sample_mie->receiver = $_user->nik;
        $sample_mie->shift = $shift;
        $sample_mie->status = '1';
        $sample_mie->created_by = $created_by;
        $sample_mie->save();

        $ka = new KA;
        $ka->sample_id = $id;
        $ka->save();
        // Insert ke FC
        $fc = new FC;
        $fc->sample_id = $id;
        $fc->save();
        // Untuk Log
        $log = new LogSampleMie;
        $log->sample_id = $id;
        $log->nik = Auth::user()->nik;
        $log->log_time = date('Y-m-d H:i:s');
        $log->action = 'create';
        $log->keterangan = Auth::user()->nik.' created sample sample '.$id.' at '.date('Y-m-d H:i:s');
        $log->save();
        // Melakukan broadcast event ke display
        broadcast(new SampleMieEvent($request['line']));
        // Return response berhasil
        return response()->json(['success' => 1, 'id' => $id], 200);
    }

    public function store_sample(Request $request)
    {
        $saved_id = array();
        for ($i=0; $i <= $request['row']; $i++) {
            if ($request['nilai_fc_'.$i] != '' || $request['nilai_ka_'.$i] != '') {
                if ($request['w_fc_'.$i]) {
                    $with_fc = 'Y';
                }else{
                    $with_fc = 'N';
                }
                // Untuk kebutuhan lain
                $upload_date = date('Y-m-d');
                $upload_time = date('H:i');
                $uploaded_by = Auth::user()->nik;
                $keterangan = 'uploaded by '.$uploaded_by;
                // Mulai menyimpan
                $sample_mie = SampleMie::find($request['id_'.$i]);
                $sample_mie->upload_date = $upload_date;
                $sample_mie->upload_time = $upload_time;
                $sample_mie->uploaded_by = $uploaded_by;
                $sample_mie->keterangan  = $keterangan;
                if ($sample_mie->edit != 'Y') {
                  $sample_mie->status = '2';
                }else{
                  $sample_mie->status = '6';
                }
                $sample_mie->with_fc  = $with_fc;
                $sample_mie->update();
                // Insert ke FC
                $fc = FC::find($request['id_fc_'.$i]);
                $fc->labu_isi = str_replace(',', '.', $request['labu_isi_fc_'.$i]);
                $fc->labu_awal = str_replace(',', '.', $request['labu_awal_fc_'.$i]);
                $fc->bobot_sample = str_replace(',', '.', $request['bobot_sample_fc_'. $i]);
                $fc->nilai = str_replace(',', '.', $request['nilai_fc_'.$i]);
                $fc->update();
                // Insert ke KA
                $ka = KA::find($request['id_ka_'.$i]);
                $ka->w0 = str_replace(',', '.', $request['w0_ka_'.$i]);
                $ka->w1 = str_replace(',', '.', $request['w1_ka_'.$i]);
                $ka->w2 = str_replace(',', '.', $request['w2_ka_'. $i]);
                $ka->nilai = str_replace(',', '.', $request['nilai_ka_'.$i]);
                $ka->update();
                // Untuk Log
                $log = new LogSampleMie;
                $log->sample_id = $request['id_'.$i];
                $log->nik = Auth::user()->nik;
                $log->log_time = date('Y-m-d H:i:s');
                $log->action = 'upload';
                $log->keterangan = Auth::user()->nik.' uploaded sample result '.$request['id_'.$i].' at '.date('Y-m-d H:i:s');
                $log->labu_isi_fc = str_replace(',', '.', $request['labu_isi_fc_'.$i]);
                $log->labu_awal_fc = str_replace(',', '.', $request['labu_awal_fc_'.$i]);
                $log->bobot_sample_fc = str_replace(',', '.', $request['bobot_sample_fc_'. $i]);
                $log->nilai_fc = str_replace(',', '.', $request['nilai_fc_'. $i]);
                $log->w0_ka = str_replace(',', '.', $request['w0_ka_'.$i]);
                $log->w1_ka = str_replace(',', '.', $request['w1_ka_'.$i]);
                $log->w2_ka = str_replace(',', '.', $request['w2_ka_'.$i]);
                $log->nilai_ka = str_replace(',', '.', $request['nilai_ka_'. $i]);
                $log->save();

                broadcast(new SampleMieEvent($request['line_id_'. $i]));
                array_push($saved_id, $request['id_'.$i]);
            }

            if ($i == $request['row']) {
                return response()->json(['success' => 1, 'saved_id' => $saved_id], 200);
            }
        }
    }

    public function store_sample_fc(Request $request)
    {
        $saved_id = array();
        for ($i=0; $i <= $request['row']; $i++) {
            if ($request['nilai_fc_'.$i] != '' && $request['nilai_fc_'.$i] != 0) {
                // Untuk kebutuhan lain
                $upload_date = date('Y-m-d');
                $upload_time = date('H:i');
                $uploaded_by = Auth::user()->nik;
                $keterangan = 'fc uploaded by '.$uploaded_by;
                // Mulai menyimpan
                $sample_mie = SampleMie::find($request['id_'.$i]);
                $sample_mie->upload_date = $upload_date;
                $sample_mie->upload_time = $upload_time;
                $sample_mie->uploaded_by = $uploaded_by;
                $sample_mie->keterangan  = $keterangan;
                $sample_mie->status = '2';
                $sample_mie->update();
                // Insert ke FC
                $fc = FC::find($request['id_fc_'.$i]);
                $fc->labu_isi = str_replace(',', '.', $request['labu_isi_fc_'.$i]);
                $fc->labu_awal = str_replace(',', '.', $request['labu_awal_fc_'.$i]);
                $fc->bobot_sample = str_replace(',', '.', $request['bobot_sample_fc_'. $i]);
                $fc->nilai = str_replace(',', '.', $request['nilai_fc_'.$i]);
                $fc->update();
                // Untuk Log
                $log = new LogSampleMie;
                $log->sample_id = $request['id_'.$i];
                $log->nik = Auth::user()->nik;
                $log->log_time = date('Y-m-d H:i:s');
                $log->action = 'upload_fc';
                $log->keterangan = Auth::user()->nik.' fc uploaded sample result '.$request['id_'.$i].' at '.date('Y-m-d H:i:s');
                $log->labu_isi_fc = str_replace(',', '.', $request['labu_isi_fc_'.$i]);
                $log->labu_awal_fc = str_replace(',', '.', $request['labu_awal_fc_'.$i]);
                $log->bobot_sample_fc = str_replace(',', '.', $request['bobot_sample_fc_'. $i]);
                $log->nilai_fc = str_replace(',', '.', $request['nilai_fc_'. $i]);
                $log->save();
                array_push($saved_id, $request['id_'.$i]);
            }

            if ($i == $request['row']) {
                return response()->json(['success' => 1, 'saved_id' => $saved_id], 200);
            }
        }
    }

}
