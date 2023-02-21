<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $request->validate([

            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::attempt($request->only('email','password'))){
            if (auth()->user()->relasi_role->role == 'admin') {
    
                return redirect()->route('admin.Dashboard');
            } 
            elseif (auth()->user()->relasi_role->role == 'asesi') {
                // return "Asesi";
                return redirect()->route('asesi.Dashboard');
            }
            elseif (auth()->user()->relasi_role->role == 'asesor') {

                return redirect()->route('asesor.Dashboard');
            }
            elseif (auth()->user()->relasi_role->role == 'peninjau') {
                return redirect()->route('peninjau.Dashboard');
            }
        }else{
            toast('Gagal Login, <br> <small>Cek kembali Email dan Password Anda</small>','error');
            return redirect()->route('Login');
        }
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('Login');
    }
}
