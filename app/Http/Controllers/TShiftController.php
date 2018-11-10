<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\TShift;

class TShiftController extends Controller
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
        return view('transaction_shift.index', ['permissions' => $this->permissions]);
    }
    public function get_shift($tanggal_awal, $tanggal_akhir)
    {
      $shifts = DB::table('t_shift')
        ->select('id','shift', 'date')
        ->get();
      echo json_encode($shifts);
    }
    public function set_shift(Request $request)
    {
      for ($i=1; $i <= $request['row']; $i++) { 
        if ( isset( $request['shift'.$i] ) ) {
          $shift_value = "SS";
        }else{
          $shift_value = "NS";
        }
        if ($request['id'.$i] == '') {
          $shift = new TShift;
          $shift->date = $request['tanggal'.$i];
          $shift->shift = $shift_value;
          $shift->created_by = Auth::user()->nik;
          $shift->updated_by = Auth::user()->nik;
          $shift->save();
        }else{
          $shift = TShift::find($request['id'.$i]);
          $shift->date = $request['tanggal'.$i];
          $shift->shift = $shift_value;
          $shift->updated_by = Auth::user()->nik;
          $shift->update();
        }
      }
      return response()->json(['success' => '1', 'action' => 'created']);
    }
}
