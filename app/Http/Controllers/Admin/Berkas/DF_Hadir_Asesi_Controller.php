<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Http\Controllers\Controller;
use App\Models\AsesorUjiKompetensi;
use App\Models\SkemaSertifikasi;
use App\Models\User;
use Illuminate\Http\Request;

class DF_Hadir_Asesi_Controller extends Controller
{
    public function index()
    {
        $skema_sertifikasi = SkemaSertifikasi::get();
        $nama_asesi = User::where('role_id', 4)->get(['id', 'nama_lengkap', 'institusi_id']);
        $nama_asesor = User::where('role_id', 3)->get(['id', 'nama_lengkap']);
        $b = User::with('relasi_asesor_uji_kompetensi.relasi_asesi_uji_kompetensi')->where('role_id', 3)->get();
        dd($b);
        return view('admin.berkas.df_hadir_asesi.index', [
            'skema_sertifikasi' => $skema_sertifikasi,
            'nama_asesi' => $nama_asesi,
            'nama_asesor' => $nama_asesor
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        return 'ok';
    }
}
