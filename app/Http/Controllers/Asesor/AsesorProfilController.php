<?php

namespace App\Http\Controllers\Asesor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AsesorProfilController extends Controller
{
    public function index()
    {
        $user = User::with(
            'relasi_pekerjaan',
            'relasi_user_detail.relasi_kebangsaan',
            'relasi_user_detail.relasi_kualifikasi_pendidikan',
            'relasi_jurusan',
        )
            ->find(Auth::user()->id);
        return view('asesor.profil.detail_profil', ['data' => $user]);
    }
}
