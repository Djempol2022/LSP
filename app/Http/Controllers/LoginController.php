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
        if (Auth::attempt($request->only('email', 'password'))) {
            if (auth()->user()->relasi_role->role == 'admin') {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Berhasil login sebagai Admin !',
                    'route' => route('admin.Dashboard')
                ]);
                // return redirect()->route('admin.Dashboard');
            } elseif (auth()->user()->relasi_role->role == 'asesi') {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Berhasil login sebagai Asesi !',
                    'route' => route('asesi.Dashboard')
                ]);
                // return redirect()->route('asesi.Dashboard');
            } elseif (auth()->user()->relasi_role->role == 'asesor') {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Berhasil login sebagai Asesor !',
                    'route' => route('asesor.Dashboard')
                ]);
                // return redirect()->route('asesor.Dashboard');
            } elseif (auth()->user()->relasi_role->role == 'peninjau') {
                return "Peninjau";
                // return redirect()->route('dealer.Dashboard');
            }
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Login gagal, Username / password salah !',
            ]);
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
