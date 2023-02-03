<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Http\Controllers\Controller;
use App\Models\DaftarTUKTerverifikasi;
use App\Models\HasilVerifikasiTUK;
use App\Models\SKPenetapanTUK;
use App\Models\STVerifikasiTUK;
use Illuminate\Http\Request;
use PDF;

class BerkasController extends Controller
{
    public function index()
    {
        return view('admin.berkas.index', [
            'where' => 'Berkas'
        ]);
    }

    public function table_surat_sk_penetapan(Request $request)
    {
        $data = SKPenetapanTUK::select([
            'sk_penetapan_tuk.*'
        ]);

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $rekamTotal = $data->count();
        $data = $data->get()->toArray();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal
        ]);
    }

    public function table_surat_daftar_tuk(Request $request)
    {
        $data = DaftarTUKTerverifikasi::select([
            'df_tuk_terverifikasi.*'
        ]);

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $rekamTotal = $data->count();
        $data = $data->get()->toArray();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal
        ]);
    }

    public function table_surat_hasil_verifikasi_tuk(Request $request)
    {
        $data = HasilVerifikasiTUK::select([
            'hasil_verifikasi_tuk.*'
        ]);

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $rekamTotal = $data->count();
        $data = $data->get()->toArray();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal
        ]);
    }

    public function table_surat_st_verifikasi_tuk(Request $request)
    {
        $data = STVerifikasiTUK::select([
            'st_verifikasi_tuk.*'
        ]);

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $rekamTotal = $data->count();
        $data = $data->get()->toArray();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal
        ]);
    }

    public function show_sk_penetapan($id)
    {
        $sk_penetapan_tuk = SKPenetapanTUK::with(['relasi_sk_penetapan_tuk_child.relasi_nama_tuk', 'relasi_sk_penetapan_tuk_child.relasi_skema_sertifikasi'])->find($id);

        return response()->json($sk_penetapan_tuk);
    }

    public function cetak_sk_penetapan_pdf($id)
    {
        $sk_penetapan_tuk = SKPenetapanTUK::with(['relasi_sk_penetapan_tuk_child.relasi_nama_tuk', 'relasi_sk_penetapan_tuk_child.relasi_skema_sertifikasi'])->find($id);
        // return view('admin.berkas.sk_penetapan_tuk_terverifikasi.pdf', [
        //     'sk_penetapan_tuk' => $sk_penetapan_tuk,
        // ]);
        $pdf = PDF::loadview('admin.berkas.sk_penetapan_tuk_terverifikasi.pdf', compact('sk_penetapan_tuk'));
        return $pdf->download('SK Penetapan TUK NO SK: ' . $sk_penetapan_tuk->no_sk . '.pdf');
    }

    public function show_hasil_verifikasi_tuk($id)
    {
        $hasil_verifikasi_tuk = HasilVerifikasiTUK::with(['relasi_skema_sertifikasi.relasi_jurusan', 'relasi_sarana_prasarana.relasi_sarana_prasarana_sub.relasi_sarana_prasarana_sub2', 'relasi_penguji_hasil_verifikasi'])->find($id);

        return response()->json($hasil_verifikasi_tuk);
    }

    public function show_st_verifikasi_tuk($id)
    {
        $st_verifikasi_tuk = STVerifikasiTUK::with(['relasi_skema_sertifikasi', 'relasi_nama_jabatan'])->find($id);

        return response()->json($st_verifikasi_tuk);
    }
}
