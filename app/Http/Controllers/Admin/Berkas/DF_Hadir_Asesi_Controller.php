<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Http\Controllers\Controller;
use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;

class DF_Hadir_Asesi_Controller extends Controller
{
    public function index()
    {
        $skema_sertifikasi = SkemaSertifikasi::get();
        return view('admin.berkas.df_hadir_asesi.index', [
            'skema_sertifikasi' => $skema_sertifikasi
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        return 'ok';
    }
}
