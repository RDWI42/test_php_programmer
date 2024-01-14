<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeCtrl extends Controller
{
    public function index(){
        $data = DB::table('users')->whereNotIn('id',[Auth::user()->id])->paginate(10);
        return view('home',[
            'data' => $data
        ]);
    }

    public function destroy(Request $request)
    {
        User::destroy($request->id);

        return back()->with('success', 'Delete');
    }
}
