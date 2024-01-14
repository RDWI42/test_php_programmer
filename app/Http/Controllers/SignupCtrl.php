<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SignupCtrl extends Controller
{
    public function index(){
        return view('signup');
    }

    public function create(Request $request)
    {
        $validasi = Validator::make($request->all(),[
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);
        if ($validasi->fails()) {
            return redirect('signup');
        }
        $input = $validasi->validated();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        return redirect('/')->with('success', 'Create');
    }
}
