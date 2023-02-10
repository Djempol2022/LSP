<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Http\Controllers\Controller;
use App\Models\DaftarTUKTerverifikasi;
use App\Models\DFHadirAsesorPleno;
use App\Models\HasilVerifikasiTUK;
use App\Models\SKPenetapanTUK;
use App\Models\STVerifikasiTUK;
use App\Models\X03STVerifikasiTUK;
use App\Models\X04BeritaAcara;
use App\Models\ZBAPecahRP;
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
        ])->latest();

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
        ])->latest();

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
        ])->latest();

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
        ])->latest();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $rekamTotal = $data->count();
        $data = $data->get()->toArray();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal
        ]);
    }

    public function table_surat_x03_st_verifikasi_tuk(Request $request)
    {
        $data = X03STVerifikasiTUK::select([
            'x03_st_verifikasi_tuk.*'
        ])->latest();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $rekamTotal = $data->count();
        $data = $data->get()->toArray();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal
        ]);
    }

    public function table_surat_x04_berita_acara(Request $request)
    {
        $data = X04BeritaAcara::select([
            'x04_berita_acara.*'
        ])->latest();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $rekamTotal = $data->count();
        $data = $data->get()->toArray();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal
        ]);
    }

    public function table_surat_z_ba_pecah_rp(Request $request)
    {
        $data = ZBAPecahRP::select([
            'z_ba_pecah_rp.*'
        ])->where('status', 0)->latest();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();

        return response()->json([
            'data' => $data,
        ]);
    }

    public function table_surat_z_ba_rp(Request $request)
    {
        $data = ZBAPecahRP::select([
            'z_ba_pecah_rp.*'
        ])->where('status', 1)->latest();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();

        return response()->json([
            'data' => $data,
        ]);
    }

    public function table_surat_df_hadir_asesor_pleno(Request $request)
    {
        $data = DFHadirAsesorPleno::select([
            'df_hadir_asesor_pleno.*'
        ])->where('is_pleno', 1)->latest();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();

        return response()->json([
            'data' => $data,
        ]);
    }

    public function table_surat_df_hadir_asesor(Request $request)
    {
        $data = DFHadirAsesorPleno::select([
            'df_hadir_asesor_pleno.*'
        ])->where('is_pleno', 0)->latest();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();

        return response()->json([
            'data' => $data,
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

    public function show_daftar_tuk($id)
    {
        $daftar_tuk = DaftarTUKTerverifikasi::with(['relasi_daftar_tuk_terverifikasi_child.relasi_nama_tuk', 'relasi_daftar_tuk_terverifikasi_child.relasi_skema_sertifikasi'])->find($id);

        return response()->json($daftar_tuk);
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

    public function show_x03_st_verifikasi_tuk($id)
    {
        $x03_st_verifikasi_tuk = X03STVerifikasiTUK::with(['relasi_nama_tuk', 'relasi_nama_jabatan'])->find($id);

        return response()->json($x03_st_verifikasi_tuk);
    }

    public function show_x04_berita_acara($id)
    {
        $x04_berita_acara = X04BeritaAcara::with(['relasi_skema_sertifikasi.relasi_jurusan'])->find($id);

        return response()->json($x04_berita_acara);
    }

    public function show_z_ba_pecah_rp($id)
    {
        $z_ba_pecah_rp = ZBAPecahRP::with(['relasi_skema_sertifikasi', 'relasi_institusi', 'relasi_nama_tuk', 'relasi_nama_jabatan', 'relasi_bahasan_diskusi'])->find($id);

        return response()->json($z_ba_pecah_rp);
    }

    public function show_z_ba_rp($id)
    {
        $z_ba_rp = ZBAPecahRP::with(['relasi_skema_sertifikasi', 'relasi_institusi', 'relasi_nama_tuk', 'relasi_nama_jabatan', 'relasi_bahasan_diskusi'])->find($id);

        return response()->json($z_ba_rp);
    }

    public function show_df_hadir_asesor_pleno($id)
    {
        $df_hadir_asesor_pleno = DFHadirAsesorPleno::with(['relasi_nama_jabatan'])->find($id);

        return response()->json($df_hadir_asesor_pleno);
    }

    public function show_df_hadir_asesor($id)
    {
        $df_hadir_asesor = DFHadirAsesorPleno::with(['relasi_nama_jabatan'])->find($id);

        return response()->json($df_hadir_asesor);
    }
}
