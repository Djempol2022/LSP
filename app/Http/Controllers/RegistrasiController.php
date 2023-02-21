<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Sekolah;
use App\Models\Institusi;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrasiController extends Controller
{
    public function registrasi()
    {
        return view('registrasi', [
            'sekolah' => Institusi::get(),
            'jurusan' => Jurusan::get()
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|max:255|min:5',
            'email' => 'required|unique:users|max:255|email:dns',
            'institusi_id' => 'required',
            'jurusan_id' => 'required',
            'role_id' => 'required',
            'password' => ['required', 'min:5', 'max:255'],
        ],[
            'nama_lengkap.required' => 'Nama wajib diisi',
            'nama_lengkap.min' => 'Nama minimal 5 karakter',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email' => 'Email tidak valid',
            'password.min' => 'Panjang password minimal 5 huruf',
            'password.required' => 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $register_user = User::create([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'institusi_id' => $request->institusi_id,
                'jurusan_id' => $request->jurusan_id,
                'password' => Hash::make($request->password),
                'status_terlibat_uji_kompetensi' => 0,
                'role_id' => 4
            ]);

            UserDetail::create([
                'user_id' => $register_user->id,
            ]);
            
            if(!$register_user){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi Kesalahan, Gagal Menambah Akun'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Akun Berhasil Dibuat'
                ]);
            }
        }
    }
    public function getJurusan($sekolah_id)
    {
        $jurusan = Jurusan::where('sekolah_id', $sekolah_id)->pluck('nama_jurusan', 'id');
        return response()->json($jurusan);
    }
}
