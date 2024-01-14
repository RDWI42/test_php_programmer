<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginCtrl extends Controller
{
    public function index(){
        return view('Login');
    }

    public function loginProcess(Request $request){
        $validasi = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($validasi)){
            $request->session()->regenerate();
            if(Auth::user()->level == 'admin'){
                return redirect()->intended('/home');
            }else{
                return redirect()->intended('/biodata/'.Auth::user()->id);
            }
        }
        return back()->with('LoginError','login Failed');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }
}
