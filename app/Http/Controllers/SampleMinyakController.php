<?php

namespace App\Http\Controllers;

use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

use App\Department;
use App\VariantProduct;
use App\FFA;
use App\PV;
use App\SampleMinyak;
use App\LogSampleMinyak;
use App\JamSample;
use DateTime;
use App;

class SampleMinyakController extends Controller
{
    var $permissions = [];
    public function get_pv($sample_id)
    {
      $pv = DB::table('t_pv')
      ->select('*')
      ->where('sample_id','=', $sample_id)
      ->get();
      return json_encode($pv);
    }
    public function edit($id)
    {
        $sample = DB::table('t_sample_minyak')
                  ->join('m_variant_product', 't_sample_minyak.mid_product', '=', 'm_variant_product.mid')
                  ->join('m_department', 't_sample_minyak.dept_id', '=', 'm_department.id')
                  ->select('t_sample_minyak.*', 'm_department.name as dept_name', 'm_variant_product.name as variant')
                  ->where('t_sample_minyak.id', $id)
                  ->first();
        echo json_encode($sample);
    }
    public function submit_edit($id) {
      $sample_minyak = SampleMinyak::find($id);
      $sample_minyak->approve  = "N";
      $sample_minyak->status = '1';
      $sample_minyak->edit = 'Y';
      $sample_minyak->editor = Auth::user()->nik;
      $sample_minyak->edit_date = date('Y-m-d');
      $sample_minyak->edit_time = date('H:i:s');
      $sample_minyak->update();
      return response()->json(['success' => 1], 200);
    }
    public function use_pv($sample_id, $pv_id)
    {
      DB::table('t_pv')
      ->where('sample_id', $sample_id)
      ->update(['used' => 'N']);
      DB::table('t_pv')
      ->where('id', $pv_id)
      ->update(['used' => 'Y']);
      return response()->json(['success' => 1], 200);
    }
    public function use_ffa($sample_id, $ffa_id)
    {
      DB::table('t_ffa')
      ->where('sample_id', $sample_id)
      ->update(['used' => 'N']);
      DB::table('t_ffa')
      ->where('id', $ffa_id)
      ->update(['used' => 'Y']);
      return response()->json(['success' => 1], 200);
    }
    public function get_ffa($sample_id)
    {
      $ffa = DB::table('t_ffa')
      ->select('*')
      ->where('sample_id','=', $sample_id)
      ->get();
      return json_encode($ffa);
    }
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
    public function delete_sample($id)
    {
      $sample_minyak = SampleMinyak::find($id);
      $keterangan = 'deleted by '.Auth::user()->nik;
      $sample_minyak->keterangan = $keterangan;
      $status = 'delete';
      $sample_minyak->status = 4;
      $sample_minyak->update();
      // Untuk Log
      $log = new LogSampleMinyak;
      $log->sample_id = $id;
      $log->nik = Auth::user()->nik;
      $log->log_time = date('Y-m-d H:i:s');
      $log->action = $status;
      $log->keterangan = $keterangan;
      $log->save();

      return response()->json(['success' => 1, 'semua_id' => $id], 200);
    }
    public function input()
    {
        $this->set_permissions();
        $jam_sample = DB::table('m_jam_sample')->get();
        $department = DB::table('m_department')->where('dept_group', '=', 'produksi')->get();
        return view('sample_minyak.input', ['jam_sample' => $jam_sample, 'departments' => $department, 'permissions' => $this->permissions]);
    }
    public function hasil()
    {
        $this->set_permissions();
        return view('sample_minyak.hasil', ['permissions' => $this->permissions]);
    }
    public function edit_approve()
    {
        $this->set_permissions();
        return view('sample_minyak.edit-approve', ['permissions' => $this->permissions]);
    }
    public function approve(Request $request)
    {
        $sample_minyak = SampleMinyak::find($request['id']);
        if ($request['status'] == 'Y') {
            $sample_minyak->approve = $request['status'];
        }
        if ($request['keterangan']) {
            $sample_minyak->keterangan = $request['keterangan'];
            $status = 'reject';
            $sample_minyak->status = 1;
            $keterangan = $request['keterangan'];
            DB::table('t_pv')->where('sample_id','=', $request['id'])
            ->where('used', '!=', 'Y')
            ->delete();
            DB::table('t_ffa')->where('sample_id','=', $request['id'])
            ->where('used', '!=', 'Y')
            ->delete();
        }else{
            $keterangan = 'Approved by '.Auth::user()->nik;
            $sample_minyak->keterangan = 'Approved by '.Auth::user()->nik;
            $status = 'approve';
            $sample_minyak->status = 3;
        }
        $sample_minyak->approver = Auth::user()->nik;
        $sample_minyak->approve_date = date('Y-m-d');
        $sample_minyak->approve_time = date('H:i:s');
        $sample_minyak->update();
        // Untuk Log
        $log = new LogSampleMinyak;
        $log->sample_id = $request['id'];
        $log->nik = Auth::user()->nik;
        $log->log_time = date('Y-m-d H:i:s');
        $log->action = $status;
        $log->keterangan = $keterangan;
        $log->save();

        return response()->json(['success' => 1, 'id' => $request['id']], 200);
    }
    public function get_revis_sample()
    {
      $sample_minyak = Db::table('t_sample_minyak')
                            ->select(array('t_sample_minyak.id', DB::raw('COUNT(t_sample_minyak.id) as jumlah_sample')))
                            ->where('t_sample_minyak.approve', null)
                            ->where('t_sample_minyak.status', 1)
                            ->where('t_sample_minyak.keterangan', '!=', null)
                            ->get();
      return response()->json($sample_minyak);
    }
    public function get_new_sample()
    {
      $sample_minyak = Db::table('t_sample_minyak')
                            ->select(array('t_sample_minyak.id', DB::raw('COUNT(t_sample_minyak.id) as jumlah_sample')))
                            ->where('t_sample_minyak.status', 1)
                            ->where('t_sample_minyak.approve', null)
                            ->get();
      return response()->json($sample_minyak);
    }
    public function showHasil()
    {
        $sample_minyak = Db::table('t_sample_minyak')
                            ->join('m_variant_product', 't_sample_minyak.mid_product', '=', 'm_variant_product.mid')
                            ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                            ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                            ->select('t_pv.used','t_ffa.used','t_pv.id','m_variant_product.name as variant','t_sample_minyak.*', 't_pv.tangki', 't_pv.volume_titrasi as volume_titrasi_pv', 't_pv.bobot_sample as bobot_sample_pv', 't_pv.normalitas as normalitas_pv', 't_pv.nilai as nilai_pv', 't_ffa.volume_titrasi as volume_titrasi_ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 't_ffa.normalitas as normalitas_ffa', 't_ffa.nilai as nilai_ffa')
                            ->where('t_sample_minyak.approve','!=', 'Y')
                            ->where('t_sample_minyak.status', 2)
                            ->groupBy('t_sample_minyak.id')
                            ->get();
        $no = 0;
        $data = array();
        foreach ($sample_minyak as $list) {
          if ($list->duplo == 'Y') {
            $btn = "<a title=\"Approve\" onClick=\"detail('".$list->id."')\" class=\"btn btn-warning btn-sm text-white\"><i class=\"fa fa-bars\"></i></a>";
            $btn_revis = "<a title=\"Revis\" onClick=\"Reject('".$list->id."')\" class=\"btn btn-danger btn-sm text-white\"><i class=\"fa fa-reply\"></i></a>";
          }else{
            $btn = "<a title=\"Approve\" onClick=\"Approve('".$list->id."')\" class=\"btn btn-primary btn-sm text-white\"><i class=\"fa fa-check\"></i></a>";
            $btn_revis = "<a title=\"Revis\" onClick=\"Reject('".$list->id."')\" class=\"btn btn-danger btn-sm text-white\"><i class=\"fa fa-reply\"></i></a>";
          }
          $no++;
          $row = array();
          $row[] = $list->id;
          $row[] = $list->line_id;
          $row[] = $list->tangki;
          $row[] = $list->variant;
          $row[] = $list->input_time;
          $row[] = round($list->bobot_sample_pv, 4);
          $row[] = round($list->volume_titrasi_pv, 2);
          $row[] = round($list->normalitas_pv, 4);
          $row[] = "<strong>".round($list->nilai_pv, 2)."</strong>";
          $row[] = round($list->bobot_sample_ffa, 4);
          $row[] = round($list->volume_titrasi_ffa, 2);
          $row[] = round($list->normalitas_ffa, 4);
          $row[] = "<strong>".round($list->nilai_ffa, 4)."</strong>";
          $row[] = "<div class=\"btn-group\">
                    ".$btn.$btn_revis."
                    </div>";
          $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }
    public function upload_sample_proses(Request $request)
    {
        $faktor_pv   = 1000;
        $faktor_ffa  = 25.6;
        $this->validate($request, [
            'minyak_proses' => 'required|file|max:2000'
        ]);
        $path = $request->file('minyak_proses')->getRealPath();
        $data = Excel::load($path, function($reader) {
                })->toObject();
        if(!empty($data) && $data->count()){
          foreach ($data as $key => $value) {
              if (!empty($value)) {
                  foreach ($value as $d) {
                      $variant_product = VariantProduct::where('name', $d['variant_product'])->first();
                      $response[] = [
                          'line' => $d['line'],
                          'tangki' => $d['tangki'],
                          'variant_product' => $variant_product->mid,
                          'volume_pv' => round($d['volume_titrasi_pv'], 2),
                          'bobot_pv' => round($d['bobot_pv'], 4),
                          'normalitas_pv' => round($d['normalitas_pv'], 4),
                          'nilai_pv' => round(((float)$d['volume_titrasi_pv']*(float)$d['normalitas_pv']*(float)$faktor_pv)/(float)$d['bobot_pv'], 2),
                          'volume_ffa' => round($d['volume_titrasi_ffa'], 2),
                          'bobot_ffa' => round($d['bobot_ffa'], 4),
                          'normalitas_ffa' => round($d['normalitas_ffa'], 4),
                          'nilai_ffa' => round(((float)$d['volume_titrasi_ffa']*(float)$d['normalitas_ffa']*(float)$faktor_ffa)/(float)$d['bobot_ffa'], 4),
                      ];
                  }
              }
          }
          return response()->json($response);
        }
    }
    public function per_status($status, $dept)
    {
        $sample = DB::table('t_sample_minyak')
                  ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                  ->join('t_ffa', 't_sample_minyak.id', '=', 't_ffa.sample_id')
                  ->join('m_variant_product', 't_sample_minyak.mid_product', '=', 'm_variant_product.mid')
                  ->join('m_department', 't_sample_minyak.dept_id', '=', 'm_department.id')
                  ->select('t_sample_minyak.ulang','t_sample_minyak.keterangan','t_sample_minyak.approve','t_sample_minyak.approver','m_department.name as dept_name','m_variant_product.name as variant','t_sample_minyak.*', 't_pv.tangki', 't_pv.id as pv_id', 't_ffa.id as ffa_id', 't_pv.volume_titrasi as volume_titrasi_pv', 't_pv.bobot_sample as bobot_sample_pv', 't_pv.normalitas as normalitas_pv', 't_pv.nilai as nilai_pv', 't_ffa.volume_titrasi as volume_titrasi_ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 't_ffa.normalitas as normalitas_ffa', 't_ffa.nilai as nilai_ffa')
                  ->where('t_sample_minyak.status', $status)
                  ->where('t_sample_minyak.dept_id', $dept)
                  ->where('t_pv.used','!=', 'N')
                  ->where('t_ffa.used','!=', 'N')
                  ->orderBy('t_sample_minyak.sample_time', 'asc')
                  ->orderBy('t_pv.tangki', 'desc')
                  ->orderBy('t_sample_minyak.line_id', 'asc')
                  ->get();
        return json_encode($sample);
    }
    public function create_sample_id()
    {
        $jam_sekarang = date('H:i:s');
        if(Carbon::createFromFormat("d/m/Y H:i:s","01/01/2007 ".$jam_sekarang) >= Carbon::createFromFormat("d/m/Y H:i:s","01/01/2007 "."00:00:00") && Carbon::createFromFormat("d/m/Y H:i:s", "01/01/2007 ".$jam_sekarang) < Carbon::createFromFormat("d/m/Y H:i:s", "01/01/2007 "."07:00:00") ) {
            $sekarang = date('Y-m-d', strtotime('-1 days'));
        }else{
            $sekarang = date('Y-m-d');
        }
        // Untuk Id
        $shifts = DB::table('t_shift')->select('shift')->where('date','=', $sekarang)->first();
        if (is_null($shifts)) {
          echo "<script>alert('Shift untuk tanggal ".$sekarang." belum di set')</script>";
          echo "<script>location.href='".App::make('url')->to('/')."'</script>";
        }else{
          $shift_status = $shifts->shift;
        }
        $this->set_permissions();
        $prn_variant = VariantProduct::where('status', 'Y')->where('dept', 'PRN')->get();
        $pnc_variant = VariantProduct::where('status', 'Y')->where('dept', 'PNC')->get();
        $jam_sample = JamSample::all();
        $department = DB::table('m_department')->where('dept_group', '=', 'produksi')->get();
        return view('qc.create-sample-minyak', ['departments' => $department, 'jam_samples' => $jam_sample, 'prn_variant' => $prn_variant, 'pnc_variant' => $pnc_variant,'permissions' => $this->permissions]);
    }
    public function upload_sample_result()
    {
        $this->set_permissions();
        $department = DB::table('m_department')->where('dept_group', '=', 'produksi')->get();
        return view('qa.upload-hasil-sample-minyak', ['departments' => $department, 'permissions' => $this->permissions]);
    }
    public function create_duplo(Request $request)
    {
        $pv = new PV;
        $pv->sample_id = $request->id;
        $pv->tangki = $request->tangki;
        $pv->save();
    }
    public function create_sample(Request $request)
    {
        $shifts = DB::table('t_shift')->select('shift')->where('date','=', $request['tanggal_sample'])->first();
        if (is_null($shifts)) {
          return response()->json(['success' => 5, 'keterangan' => 'Jadwal tanggal '.$request['tanggal_sample'].' belum di set'], 200);
        }else{
          $shift_status = $shifts->shift;
          $all_shift = DB::table('m_shift')->where("name", "like", $shift_status."%")->get();
        }
        if (!$request->tangki) {
            return response()->json(['success' => 0, 'error' => 'Pilih tangki']);
        }elseif (!$request->variant_product) {
            return response()->json(['success' => 0, 'error' => 'Pilih Variant']);
        }else{
            $ulang = '';
            if ($request->ulang == 'true') {
                $is_check = false;
                $ulang = 'Y';
            }else{
                $is_check = true;
            }
            $check = DB::table('t_sample_minyak')
                    ->join('t_pv', 't_sample_minyak.id', '=', 't_pv.sample_id')
                    ->where('t_sample_minyak.dept_id', $request['department'])
                    ->where('t_sample_minyak.sample_date', $request['tanggal_sample'])
                    ->where('t_sample_minyak.sample_time', $request['jam_sample'])
                    ->where('t_sample_minyak.line_id', $request['line'])
                    ->where('t_sample_minyak.status','!=', 4)
                    ->where('t_pv.tangki', $request->tangki)
                    ->select('t_sample_minyak.id')
                    ->orderBy('t_sample_minyak.id', 'asc');
            if ( $check->exists() && $is_check == true ) {
                return response()->json(['success' => 2, 'message' => "Sample dengan tangki ini sudah ada"], 200);
            }else{
                $semua_id = "";
                $last = DB::table('t_sample_minyak')->where('sample_date', '=', $request['tanggal_sample'])->orderBy('id', 'desc')->first();
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
                // Untuk Id
                $tanggal = explode('-',$request['tanggal_sample']);
                if ($tanggal[2] < 10) {
                  $tanggal[2] = '0'.$tanggal[2];
                }
                $tanggal[0] = substr($tanggal[0], 2, 2);
                $id = "MYK".$tanggal[0].$tanggal[1].$tanggal[2].$number;

                // Untuk kebutuhan lain
                $line_id = $request['line'];
                $dept_id = $request['department'];
                $mid_product = $request['variant_product'];
                $sample_date = $request['tanggal_sample'];
                $input_date = date('Y-m-d');
                $sample_time = $request['jam_sample'];
                $input_time = date('H:i');

                $current = DateTime::createFromFormat('H:i:s', $request['jam_sample']);
                if ($shift_status == 'SS') {
                  $shift1_start = DateTime::createFromFormat('H:i', '07:30');
                  $shift1_end = DateTime::createFromFormat('H:i', '12:00');
                  $shift2_start = DateTime::createFromFormat('H:i', '13:30');
                  $shift2_end = DateTime::createFromFormat('H:i', '16:30');
                  $shift3_start = DateTime::createFromFormat('H:i', '18:00');
                  $shift3_end = DateTime::createFromFormat('H:i', '22:30');
                }elseif ($shift_status == 'NS') {
                  $shift1_start = DateTime::createFromFormat('H:i', '07:30');
                  $shift1_end = DateTime::createFromFormat('H:i', '15:00');
                  $shift2_start = DateTime::createFromFormat('H:i', '16:30');
                  $shift2_end = DateTime::createFromFormat('H:i', '22:30');
                  $shift3_start = DateTime::createFromFormat('H:i', '00:00');
                  $shift3_end = DateTime::createFromFormat('H:i', '06:00');
                }

                if ($current >= $shift1_start && $current <= $shift1_end)
                {
                    $shift = 'NS1';
                }elseif ($current >= $shift2_start && $current <= $shift2_end)
                {
                    $shift = 'NS2';
                }elseif ($current >= $shift3_start && $current <= $shift3_end)
                {
                    $shift = 'NS3';
                }
                if (isset($request['shift'])) {
                    $shift = $request['shift'];
                }
                $created_by = Auth::user()->nik;
                $keterangan = 'created by '.$created_by;
                // Mulai menyimpan
                $sample_minyak = new SampleMinyak;
                $sample_minyak->id = $id;
                $sample_minyak->line_id = $line_id;
                $sample_minyak->dept_id = $dept_id;
                $sample_minyak->mid_product = $mid_product;
                $sample_minyak->sample_date = $sample_date;
                $sample_minyak->input_date = $input_date;
                $sample_minyak->sample_time = $sample_time;
                $sample_minyak->input_time = $input_time;
                $sample_minyak->shift = $shift;
                $sample_minyak->status = '1';
                $sample_minyak->ulang = $ulang;
                $sample_minyak->created_by = $created_by;
                $sample_minyak->save();
                $pv = new PV;
                $pv->sample_id = $id;
                $pv->tangki = $request->tangki;
                $pv->used = "Y";
                $pv->save();
                // Insert ke FFA
                $ffa = new FFA;
                $ffa->sample_id = $id;
                $ffa->tangki = $request->tangki;
                $ffa->used = "Y";
                $ffa->save();
                $semua_id .= " ".$id.",";
                // Untuk Log
                $log = new LogSampleMinyak;
                $log->sample_id = $id;
                $log->nik = Auth::user()->nik;
                $log->log_time = date('Y-m-d H:i:s');
                $log->action = 'create';
                $log->keterangan = Auth::user()->nik.' created sample sample '.$id.' at '.date('Y-m-d H:i:s');
                $log->save();
                return response()->json(['success' => 1, 'semua_id' => $semua_id], 200);
            }
        }
    }
    public function store_sample(Request $request)
    {
        $saved_id = array();
        $failed_id = array();

        for ($i=(int)$request['row']+1; $i <= $request['prn_last_index']; $i++) {
            $pv = new PV;
            $pv->sample_id = $request['duplo_sample_id_'.$i];
            $pv->tangki = $request['duplo_tangki_'.$i];
            $pv->volume_titrasi = str_replace(',', '.', $request['duplo_volume_titrasi_pv_'.$i]);
            $pv->bobot_sample = str_replace(',', '.', $request['duplo_bobot_sample_pv_'.$i]);
            $pv->normalitas = str_replace(',', '.', $request['duplo_normalitas_pv_'. $i]);
            $pv->faktor = 1000;
            $pv->nilai = str_replace(',', '.', $request['duplo_nilai_pv_'.$i]);
            $pv->used = "N";
            $pv->save();
            // Insert ke FFA
            $ffa = new FFA;
            $ffa->sample_id = $request['duplo_sample_id_'.$i];
            $ffa->tangki = $request['duplo_tangki_'.$i];
            $ffa->volume_titrasi = str_replace(',', '.', $request['duplo_volume_titrasi_ffa_'.$i]);
            $ffa->bobot_sample = str_replace(',', '.', $request['duplo_bobot_sample_ffa_'.$i]);
            $ffa->normalitas = str_replace(',', '.', $request['duplo_normalitas_ffa_'. $i]);
            $ffa->faktor = 25.6;
            $ffa->nilai = str_replace(',', '.', $request['duplo_nilai_ffa_'.$i]);
            $ffa->used = "N";
            $ffa->save();

            $sample_minyak = SampleMinyak::find($request['duplo_sample_id_'.$i]);
            $sample_minyak->duplo = 'Y';
            $sample_minyak->update();
            // Untuk Log
            $log = new LogSampleMinyak;
            $log->sample_id = $request['duplo_sample_id_'.$i];
            $log->nik = Auth::user()->nik;
            $log->log_time = date('Y-m-d H:i:s');
            $log->action = 'duplo';
            $log->keterangan = Auth::user()->nik.' duplo sample '.$request['duplo_sample_id_'.$i].' pv nilai '.$request['duplo_nilai_pv_'.$i].' ffa nilai '.$request['duplo_nilai_ffa_'.$i].' at '.date('Y-m-d H:i:s');
            $log->save();
        }
        for ($i=(int)$request['pnc_row']+1; $i <= $request['pnc_last_index']; $i++) {
            $pv = new PV;
            $pv->sample_id = $request['duplo_sample_id_'.$i];
            $pv->tangki = $request['duplo_tangki_'.$i];
            $pv->volume_titrasi = str_replace(',', '.', $request['duplo_volume_titrasi_pv_'.$i]);
            $pv->bobot_sample = str_replace(',', '.', $request['duplo_bobot_sample_pv_'.$i]);
            $pv->normalitas = str_replace(',', '.', $request['duplo_normalitas_pv_'. $i]);
            $pv->faktor = 1000;
            $pv->nilai = str_replace(',', '.', $request['duplo_nilai_pv_'.$i]);
            $pv->used = "N";
            $pv->save();
            // Insert ke FFA
            $ffa = new FFA;
            $ffa->sample_id = $request['duplo_sample_id_'.$i];
            $ffa->tangki = $request['duplo_tangki_'.$i];
            $ffa->volume_titrasi = str_replace(',', '.', $request['duplo_volume_titrasi_ffa_'.$i]);
            $ffa->bobot_sample = str_replace(',', '.', $request['duplo_bobot_sample_ffa_'.$i]);
            $ffa->normalitas = str_replace(',', '.', $request['duplo_normalitas_ffa_'. $i]);
            $ffa->faktor = 25.6;
            $ffa->nilai = str_replace(',', '.', $request['duplo_nilai_ffa_'.$i]);
            $pv->used = "N";
            $ffa->save();

            $sample_minyak = SampleMinyak::find($request['duplo_sample_id_'.$i]);
            $sample_minyak->duplo = 'Y';
            $sample_minyak->update();
            // Untuk Log
            $log = new LogSampleMinyak;
            $log->sample_id = $request['duplo_sample_id_'.$i];
            $log->nik = Auth::user()->nik;
            $log->log_time = date('Y-m-d H:i:s');
            $log->action = 'duplo';
            $log->keterangan = Auth::user()->nik.' duplo sample '.$request['duplo_sample_id_'.$i].' pv nilai '.$request['duplo_nilai_pv_'.$i].' ffa nilai '.$request['duplo_nilai_ffa_'.$i].' at '.date('Y-m-d H:i:s');
            $log->save();
        }
      if (isset($request['row'])) {
        for ($i=0; $i <= $request['row']; $i++) {
          if ( !is_numeric($request['volume_titrasi_pv_'.$i]) || !is_numeric($request['bobot_sample_pv_'.$i]) || !is_numeric($request['normalitas_pv_'. $i]) || !is_numeric($request['nilai_pv_'.$i]) || !is_numeric($request['volume_titrasi_ffa_'.$i]) || !is_numeric($request['bobot_sample_ffa_'.$i]) || !is_numeric($request['normalitas_ffa_'. $i]) )
            {
                array_push($failed_id, $request['id_'.$i]);
            }else{
                if ($request['volume_titrasi_pv_'.$i] != '' && $request['bobot_sample_pv_'.$i] != '' && $request['normalitas_pv_'. $i] != '' && $request['nilai_pv_'.$i] != '' && $request['volume_titrasi_ffa_'.$i] != '' && $request['bobot_sample_ffa_'.$i] != '' && $request['normalitas_ffa_'. $i] !== '' && $request['nilai_ffa_'.$i] != '' && $request['nilai_pv_'.$i] != 0 && $request['nilai_ffa_'.$i] != 0)
                {
                    // Untuk kebutuhan lain
                    $line_id = $request['line_'.$i];
                    $tangki = $request['tangki_'.$i];
                    $upload_date = date('Y-m-d');
                    $upload_time = date('H:i');
                    $uploaded_by = Auth::user()->nik;
                    $keterangan = 'uploaded by '.$uploaded_by;
                    // Mulai menyimpan
                    $sample_minyak = SampleMinyak::find($request['id_'.$i]);
                    $sample_minyak->upload_date = $upload_date;
                    $sample_minyak->upload_time = $upload_time;
                    $sample_minyak->uploaded_by = $uploaded_by;
                    $sample_minyak->keterangan  = $keterangan;
                    $sample_minyak->status = '2';
                    $sample_minyak->update();
                    // Insert ke PV
                    $pv = PV::find($request['id_pv_'.$i]);
                    $pv->volume_titrasi = str_replace(',', '.', $request['volume_titrasi_pv_'.$i]);
                    $pv->bobot_sample = str_replace(',', '.', $request['bobot_sample_pv_'.$i]);
                    $pv->normalitas = str_replace(',', '.', $request['normalitas_pv_'. $i]);
                    $pv->faktor = 1000;
                    $pv->nilai = str_replace(',', '.', $request['nilai_pv_'.$i]);
                    $pv->update();
                    // Insert ke FFA
                    $ffa = FFA::find($request['id_ffa_'.$i]);
                    $ffa->volume_titrasi = str_replace(',', '.', $request['volume_titrasi_ffa_'.$i]);
                    $ffa->bobot_sample = str_replace(',', '.', $request['bobot_sample_ffa_'.$i]);
                    $ffa->normalitas = str_replace(',', '.', $request['normalitas_ffa_'. $i]);
                    $ffa->faktor = 25.6;
                    $ffa->nilai = str_replace(',', '.', $request['nilai_ffa_'.$i]);
                    $ffa->update();
                    // Untuk Log
                    $log = new LogSampleMinyak;
                    $log->sample_id = $request['id_'.$i];
                    $log->nik = Auth::user()->nik;
                    $log->log_time = date('Y-m-d H:i:s');
                    $log->action = 'upload';
                    $log->keterangan = Auth::user()->nik.' uploaded sample result '.$request['id_'.$i].' at '.date('Y-m-d H:i:s');
                    $log->volume_titrasi_pv = str_replace(',', '.', $request['volume_titrasi_pv_'.$i]);
                    $log->bobot_sample_pv = str_replace(',', '.', $request['bobot_sample_pv_'.$i]);
                    $log->normalitas_pv = str_replace(',', '.', $request['normalitas_pv_'. $i]);
                    $log->faktor_pv = 1000;
                    $log->nilai_pv = str_replace(',', '.', $request['nilai_pv_'.$i]);
                    $log->volume_titrasi_ffa = str_replace(',', '.', $request['volume_titrasi_ffa_'.$i]);
                    $log->bobot_sample_ffa = str_replace(',', '.', $request['bobot_sample_ffa_'.$i]);
                    $log->normalitas_ffa = str_replace(',', '.', $request['normalitas_ffa_'. $i]);
                    $log->faktor_ffa = 25.6;
                    $log->nilai_ffa = str_replace(',', '.', $request['nilai_ffa_'.$i]);
                    $log->save();
                    array_push($saved_id, $request['id_'.$i]);
                }
            }
            if ($i == $request['row']) {
                return response()->json(['success' => 1, 'saved_id' => $saved_id, 'failed_id' => $failed_id], 200);
            }
        }
      }elseif(isset($request['pnc_row'])){
        for ($i=0; $i <= $request['pnc_row']; $i++) {
          if ( !is_numeric($request['volume_titrasi_pv_'.$i]) || !is_numeric($request['bobot_sample_pv_'.$i]) || !is_numeric($request['normalitas_pv_'. $i]) || !is_numeric($request['nilai_pv_'.$i]) || !is_numeric($request['volume_titrasi_ffa_'.$i]) || !is_numeric($request['bobot_sample_ffa_'.$i]) || !is_numeric($request['normalitas_ffa_'. $i]) )
            {
                array_push($failed_id, $request['id_'.$i]);
            }else{
                if ($request['volume_titrasi_pv_'.$i] != '' && $request['bobot_sample_pv_'.$i] != '' && $request['normalitas_pv_'. $i] != '' && $request['nilai_pv_'.$i] != '' && $request['volume_titrasi_ffa_'.$i] != '' && $request['bobot_sample_ffa_'.$i] != '' && $request['normalitas_ffa_'. $i] !== '' && $request['nilai_ffa_'.$i] != '' && $request['nilai_pv_'.$i] != 0 && $request['nilai_ffa_'.$i] != 0)
                {
                    // Untuk kebutuhan lain
                    $line_id = $request['line_'.$i];
                    $tangki = $request['tangki_'.$i];
                    $upload_date = date('Y-m-d');
                    $upload_time = date('H:i');
                    $uploaded_by = Auth::user()->nik;
                    $keterangan = 'uploaded by '.$uploaded_by;
                    // Mulai menyimpan
                    $sample_minyak = SampleMinyak::find($request['id_'.$i]);
                    $sample_minyak->upload_date = $upload_date;
                    $sample_minyak->upload_time = $upload_time;
                    $sample_minyak->uploaded_by = $uploaded_by;
                    $sample_minyak->keterangan  = $keterangan;
                    $sample_minyak->status = '2';
                    $sample_minyak->update();
                    // Insert ke PV
                    $pv = PV::find($request['id_pv_'.$i]);
                    $pv->volume_titrasi = str_replace(',', '.', $request['volume_titrasi_pv_'.$i]);
                    $pv->bobot_sample = str_replace(',', '.', $request['bobot_sample_pv_'.$i]);
                    $pv->normalitas = str_replace(',', '.', $request['normalitas_pv_'. $i]);
                    $pv->faktor = 1000;
                    $pv->nilai = str_replace(',', '.', $request['nilai_pv_'.$i]);
                    $pv->update();
                    // Insert ke FFA
                    $ffa = FFA::find($request['id_ffa_'.$i]);
                    $ffa->volume_titrasi = str_replace(',', '.', $request['volume_titrasi_ffa_'.$i]);
                    $ffa->bobot_sample = str_replace(',', '.', $request['bobot_sample_ffa_'.$i]);
                    $ffa->normalitas = str_replace(',', '.', $request['normalitas_ffa_'. $i]);
                    $ffa->faktor = 25.6;
                    $ffa->nilai = str_replace(',', '.', $request['nilai_ffa_'.$i]);
                    $ffa->update();
                    // Untuk Log
                    $log = new LogSampleMinyak;
                    $log->sample_id = $request['id_'.$i];
                    $log->nik = Auth::user()->nik;
                    $log->log_time = date('Y-m-d H:i:s');
                    $log->action = 'upload';
                    $log->keterangan = Auth::user()->nik.' uploaded sample result '.$request['id_'.$i].' at '.date('Y-m-d H:i:s');
                    $log->volume_titrasi_pv = str_replace(',', '.', $request['volume_titrasi_pv_'.$i]);
                    $log->bobot_sample_pv = str_replace(',', '.', $request['bobot_sample_pv_'.$i]);
                    $log->normalitas_pv = str_replace(',', '.', $request['normalitas_pv_'. $i]);
                    $log->faktor_pv = 1000;
                    $log->nilai_pv = str_replace(',', '.', $request['nilai_pv_'.$i]);
                    $log->volume_titrasi_ffa = str_replace(',', '.', $request['volume_titrasi_ffa_'.$i]);
                    $log->bobot_sample_ffa = str_replace(',', '.', $request['bobot_sample_ffa_'.$i]);
                    $log->normalitas_ffa = str_replace(',', '.', $request['normalitas_ffa_'. $i]);
                    $log->faktor_ffa = 25.6;
                    $log->nilai_ffa = str_replace(',', '.', $request['nilai_ffa_'.$i]);
                    $log->save();
                    array_push($saved_id, $request['id_'.$i]);
                }
            }
            if ($i == $request['pnc_row']) {
                return response()->json(['success' => 1, 'saved_id' => $saved_id, 'failed_id' => $failed_id], 200);
            }
        }
      }else{
        return $request['row'];
      }
    }

    // public function store_sample_old(Request $request)
    // {
    //     $lines[] = array();
    //     $semua_id[] = array();
    //     for ($i=0; $i <= $request['row']; $i++) {
    //         // Jika satu sample untuk banyak tangki
    //         // if(!in_array($request['line_'.$i], $lines)) {
    //
    //           // Untuk Id
    //           $sample = DB::table('t_sample_minyak')->orderBy('created_at', 'desc')->orderBy('id', 'desc')->first();
    //           if (!$sample) {
    //               $id = "SMK00000";
    //           }else{
    //               $id = $sample->id;
    //           }
    //           $id_angka = (int)substr($id, 3, 5);
    //           if ($id_angka + 1 >= 1 && $id_angka + 1 < 10) {
    //               $id = "SMK0000".($id_angka + 1);
    //           }elseif ($id_angka + 1 >= 10 && $id_angka + 1 < 100) {
    //               $id = "SMK000".($id_angka + 1);
    //           }elseif ($id_angka + 1 >= 100 && $id_angka + 1 < 1000) {
    //               $id = "SMK00".($id_angka + 1);
    //           }elseif ($id_angka + 1 >= 1000 && $id_angka + 1 < 10000) {
    //               $id = "SMK0".($id_angka + 1);
    //           }elseif ($id_angka + 1 >= 10000 && $id_angka + 1 < 100000) {
    //               $id = "SMK".($id_angka + 1);
    //           }
    //           // Untuk kebutuhan lain
    //           $line_id = $request['line_'.$i];
    //           $dept_id = $request['department'];
    //           $mid_product = $request['variant_product_'.$i];
    //           $sample_date = date('Y-m-d', strtotime($request['tanggal_sample']));
    //           $input_date = date('Y-m-d');
    //           $sample_time = $request['jam_sample'];
    //           $input_time = date('H:i');
    //           $shift = 'NS1';
    //           $created_by = Auth::user()->nik;
    //           $keterangan = 'created by '.$created_by;
    //           // Mulai menyimpan
    //           $sample_minyak = new SampleMinyak;
    //           $sample_minyak->id = $id;
    //           $sample_minyak->line_id = $line_id;
    //           $sample_minyak->dept_id = $dept_id;
    //           $sample_minyak->mid_product = $mid_product;
    //           $sample_minyak->sample_date = $sample_date;
    //           $sample_minyak->input_date = $input_date;
    //           $sample_minyak->sample_time = $sample_time;
    //           $sample_minyak->input_time = $input_time;
    //           $sample_minyak->shift = $shift;
    //           $sample_minyak->created_by = $created_by;
    //           $sample_minyak->save();
    //         // Jika satu sample untuk banyak tangki
    //         //   array_push($lines, $request['line_'.$i]);
    //         // }
    //         // Insert ke PV
    //         $pv = new PV;
    //         $pv->sample_id = $id;
    //         $pv->tangki = $request['tangki_'.$i];
    //         $pv->volume_titrasi = $request['volume_pv_'.$i];
    //         $pv->bobot_sample = $request['bobot_pv_'.$i];
    //         $pv->normalitas = $request['normalitas_pv_'. $i];
    //         $pv->faktor = 1000;
    //         $pv->nilai = $request['nilai_pv_'.$i];
    //         $pv->save();
    //         // Insert ke FFA
    //         $ffa = new FFA;
    //         $ffa->sample_id = $id;
    //         $ffa->tangki = $request['tangki_'.$i];
    //         $ffa->volume_titrasi = $request['volume_ffa_'.$i];
    //         $ffa->bobot_sample = $request['bobot_ffa_'.$i];
    //         $ffa->normalitas = $request['normalitas_ffa_'. $i];
    //         $ffa->faktor = 25.6;
    //         $ffa->nilai = $request['nilai_ffa_'.$i];
    //         $ffa->save();
    //         array_push($semua_id, $id);
    //         if ($i == $request['row']) {
    //             return response()->json(['succes' => 1, 'semua_id' => $semua_id], 200);
    //         }
    //     }
    // }
}
