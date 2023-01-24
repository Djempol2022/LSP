<?php

namespace App\Http\Controllers\Asesor;

use App\Models\User; 
use App\Models\User_Asesor; 
use App\Models\Jurusan; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsesorController extends Controller
{
    public function dashboard(){
      $user = User::first();
        return view('asesor.dashboard.dashboard', compact('user'));
    }
    public function halamanprofil(){
        $user = User::first();
        $profil_asesor = User_Asesor::where('users_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        $jurusan = Jurusan::get();
        return view('asesor.dashboard.profile',compact('user', 'profil_asesor','jurusan'));
    }
    public function editprofil(Request $request){
        $user = User::first();
        // $editprofil = User_Asesor::find(Auth::user()->id);
        // dd($editprofil);
        User_Asesor::where('users _id', Auth::user()->id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,   
            // 'users_id' => $request->users_id,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat_rumah' => $request->alamat_rumah,
        ]);
        
        User::find(Auth::user()->id)->update([
            'jurusan_id' => $request->jurusan_id
        ]);
        
        // $editprofil->save();
        return redirect()->back()->with('success');



    }
}
