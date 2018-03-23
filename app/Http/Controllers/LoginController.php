<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Facades\Validator;

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
