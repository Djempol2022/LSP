<?php

namespace App\Http\Controllers\Admin\Berkas\Api;

use App\Http\Controllers\Controller;
use App\Models\SkemaSertifikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DF_Hadir_Asesi_Controller_API extends Controller
{
    public function getDataBerkasDFHadirAsesi(Request $request)
    {

        $data = SkemaSertifikasi::with(['relasi_jurusan.relasi_muk.relasi_jadwal_uji_kompetensi.relasi_asesor_uji_kompetensi'])->findOrFail($request->id);
        $response = [
            'data' => $data
        ];

        return response()->json($response, Response::HTTP_OK);
    }
}
