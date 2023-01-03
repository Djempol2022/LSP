<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function registrasi()
    {
        return view('registrasi', [
            'sekolah' => Sekolah::with('jurusan')->get(),
            'jurusan' => Jurusan::with('sekolah')->get()
        ]);
    }
    public function store(Request $request)
    {
        $messages = array(
            'nama_lengkap.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'required' => 'Field wajib diisi',
            'nama_lengkap.unique' => 'Nama sudah terdaftar',
            'email.unique' => 'Email sudah terdaftar',
            'nama_lengkap.min' => 'Panjang nama minimal 5 huruf',
            'email' => 'Email tidak valid',
            'password.min' => 'Panjang password minimal 5 huruf',
        );
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|unique:users|max:255|min:5',
            'email' => 'required|unique:users|max:255|email:dns',
            'sekolah_id' => 'required',
            'jurusan_id' => 'required',
            'role_id' => 'required',
            'password' => ['required', 'min:5', 'max:255']
        ], $messages);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('login')->with('success', 'Pendaftaran Berhasil');
    }
    public function getJurusan($sekolah_id)
    {
        $jurusan = Jurusan::where('sekolah_id', $sekolah_id)->pluck('nama_jurusan', 'id');
        return response()->json($jurusan);
    }
}
