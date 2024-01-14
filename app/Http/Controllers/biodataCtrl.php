<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class biodataCtrl extends Controller
{
    public function index($id){
        $data = DB::table('users')->where('id',$id)->first();
        $pendidikan = DB::table('pendidikan')->where('user_id',$id)->get();
        $pelatihan = DB::table('pelatihan')->where('user_id',$id)->get();
        $pekerjaan = DB::table('pekerjaan')->where('user_id',$id)->get();
        return view('biodata',[
            'data' => $data,
            'pendidikan' => $pendidikan,
            'pelatihan' => $pelatihan,
            'pekerjaan' => $pekerjaan,
        ]);
    }

    public function editDetail($id){
        $data = DB::table('users')->where('id',$id)->first();
        $pendidikan = DB::table('pendidikan')->where('user_id',$id)->get();
        $pelatihan = DB::table('pelatihan')->where('user_id',$id)->get();
        $pekerjaan = DB::table('pekerjaan')->where('user_id',$id)->get();
        return view('detail',[
            'data' => $data,
            'pendidikan' => $pendidikan,
            'pelatihan' => $pelatihan,
            'pekerjaan' => $pekerjaan,
        ]);
    }

    public function get3Array($id){
        $pendidikan = DB::table('pendidikan')->where('user_id',$id)->get();
        $pelatihan = DB::table('pelatihan')->where('user_id',$id)->get();
        $pekerjaan = DB::table('pekerjaan')->where('user_id',$id)->get();
        return response()->json([
            'pendidikan' => $pendidikan,
            'pelatihan' => $pelatihan,
            'pekerjaan' => $pekerjaan,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validasi = Validator::make($request->data,[
            'posisi' => 'required|string',
            'nama' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'no_ktp' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tgllahir' => 'required|date',
            'jk' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string',
            'gd' => 'required|string',
            'alamat_ktp' => 'required|string',
            'alamat_tinggal' => 'required|string',
            'no_tlp' => 'required|string',
            'skill' => 'required|string',
            'gaji' => 'required|string',
        ]);
        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 422);
        }
        $input = $validasi->validated();

        $validasi2 = Validator::make($request->riwayatPendidikan,[
            'data.*.jenjang' => 'required|string',
            'data.*.institusi' => 'required|string',
            'data.*.jurusan' => 'required|string',
            'data.*.tahun_lulus' => 'required|numeric',
            'data.*.ipk' => 'required|numeric',
        ]);
        if ($validasi2->fails()) {
            return response()->json($validasi2->errors(), 422);
        }
        DB::table('pendidikan')->where('user_id',$request->id)->delete();
        foreach ($request->riwayatPendidikan as $riwayat) {
            DB::table('pendidikan')->insert([
                'user_id' => $request->id,
                'jenjang' => $riwayat['jenjang'],
                'institusi' => $riwayat['institusi'],
                'jurusan' => $riwayat['jurusan'],
                'tahun_lulus' => $riwayat['tahun_lulus'],
                'ipk' => $riwayat['ipk'],
            ]);
        }

        $validasi3 = Validator::make($request->riwayatPelatihan,[
            'data.*.nama_kursus' => 'required|string',
            'data.*.sertifikat' => 'required|boolean',
            'data.*.tahun' => 'required|string',
        ]);
        if ($validasi3->fails()) {
            return response()->json($validasi3->errors(), 422);
        }
        DB::table('pelatihan')->where('user_id',$request->id)->delete();
        foreach ($request->riwayatPelatihan as $riwayat) {
            DB::table('pelatihan')->insert([
                'user_id' => $request->id,
                'nama_kursus' => $riwayat['nama_kursus'],
                'sertifikat' => $riwayat['sertifikat'],
                'tahun' => $riwayat['tahun'],
            ]);
        }

        $validasi4 = Validator::make($request->riwayatPekerjaan,[
            'data.*.nama_perusahaan' => 'required|string',
            'data.*.posisi' => 'required|string',
            'data.*.pendapatan' => 'required|string',
            'data.*.tahun' => 'required|string',
        ]);
        if ($validasi4->fails()) {
            return response()->json($validasi4->errors(), 422);
        }
        DB::table('pekerjaan')->where('user_id',$request->id)->delete();
        foreach ($request->riwayatPekerjaan as $riwayat) {
            DB::table('pekerjaan')->insert([
                'user_id' => $request->id,
                'nama_perusahaan' => $riwayat['nama_perusahaan'],
                'posisi' => $riwayat['posisi'],
                'pendapatan' => $riwayat['pendapatan'],
                'tahun' => $riwayat['tahun'],
            ]);
        }

        $user = User::where('id',$request->id)->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil',
        ]);
    }

    public function destroy(Request $request)
    {
        DB::table('pekerjaan')->where('user_id',$request->id)->delete();
        DB::table('pelatihan')->where('user_id',$request->id)->delete();
        DB::table('pendidikan')->where('user_id',$request->id)->delete();

        DB::table('users')->where('id',$request->id)->delete();

        return back()->with('success', 'Delete');
    }
}
