<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        // if (Auth::check()) {
        //     return redirect()->route('home');
        // }
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|max:12',
            'password' => 'required|max:255'
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['nik' => $request['nik'], 'password' => $request['password'], 'status' => 'Y'])) {
                $request->session()->put(['department' => Auth::user()->dept_id]);
                // query untuk mendapatkan semua permission berdasarkan auth id milik user.
                $permissions = DB::table('auth_permission')
                                  ->join('auth_group_permission', 'auth_permission.id', '=', 'auth_group_permission.permission_id')
                                  ->join('auth_group', 'auth_group.id', '=', 'auth_group_permission.group_id')
                                  ->select('auth_permission.codename as codename')
                                  ->where('auth_group.id','=', Auth::user()->group_id)
                                  ->get();
                $request->session()->put('permissions', []);
                foreach ($permissions as $permission) {
                    $request->session()->push('permissions', $permission->codename);
                }
                return response()->json(['success' => '1'], 200);
            }else{
                return response()->json(['success' => '0'], 401);
            }
        }else{
            return response()->json(['success' => '0','errors' => $validator->errors()]);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
