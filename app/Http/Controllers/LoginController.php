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
            if (auth()->user()->relasi_roles->role == 'admin') {
    
                return "Admin";
                // return redirect()->route('biro.Dashboard');
            } 
            elseif (auth()->user()->relasi_roles->role == 'asesi') {
                // return "Asesi";
                return redirect()->route('asesi.Dashboard');
            }
            elseif (auth()->user()->relasi_roles->role == 'asesor') {
                return "Asesor";
                // return redirect()->route('dealer.Dashboard');
            }
            elseif (auth()->user()->relasi_roles->role == 'peninjau') {
                return "Peninjau";
                // return redirect()->route('dealer.Dashboard');
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
        return redirect('/');
    }
}
