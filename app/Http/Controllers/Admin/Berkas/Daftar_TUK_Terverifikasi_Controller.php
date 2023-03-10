<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Http\Controllers\Controller;
use App\Models\DaftarTUKTerverifikasi;
use App\Models\DaftarTUKTerverifikasiChild;
use App\Models\NamaTempatUjiKompetensi;
use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;
use Validator;

class Daftar_TUK_Terverifikasi_Controller extends Controller
{
    public function index()
    {
        return view('admin.berkas.daftar_tuk_terverifikasi.index', [
            'nama_tuk' => NamaTempatUjiKompetensi::get(),
            'skema_sertifikasi' => SkemaSertifikasi::get()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tempat_ditetapkan' => 'required',
            'tanggal_ditetapkan' => 'required',
            'jabatan_bttd' => 'required',
            'nama_bttd' => 'required',
            'nama_tuk.*' => 'required',
            'nama_skema_sertifikasi.*' => 'required',
            'penanggung_jawab.*' => 'required',
            'nama_tuk' => 'required',
            'nama_skema_sertifikasi' => 'required',
            'penanggung_jawab' => 'required',
        ], [
            'tempat_ditetapkan.required' => 'Wajib diisi',
            'tanggal_ditetapkan.required' => 'Wajib diisi',
            'jabatan_bttd.required' => 'Wajib diisi',
            'nama_bttd.required' => 'Wajib diisi',
            'nama_tuk.required' => 'Wajib diisi',
            'nama_skema_sertifikasi.required' => 'Wajib diisi',
            'penanggung_jawab.required' => 'Wajib diisi',
            'nama_tuk.*.required' => 'Wajib diisi',
            'nama_skema_sertifikasi.*.required' => 'Wajib diisi',
            'penanggung_jawab.*.required' => 'Wajib diisi',
        ]);

        if (!$validator->passes()) return redirect()->back()->withErrors($validator)
            ->withInput();

        $df_tuk_terverifikasi = DaftarTUKTerverifikasi::create([
            'tempat_ditetapkan' => $request->tempat_ditetapkan,
            'tanggal_ditetapkan' => $request->tanggal_ditetapkan,
            'nama_bttd' => $request->nama_bttd,
            'jabatan_bttd' => $request->jabatan_bttd,
            'ttd' => $request->ttd,
        ])->id;

        for ($i = 0; $i < count($request->nama_tuk); $i++) {
            DaftarTUKTerverifikasiChild::create([
                'df_tuk_terverifikasi_id' => $df_tuk_terverifikasi,
                'nama_tuk_id' => $request->nama_tuk[$i],
                'skema_sertifikasi_id' => $request->nama_skema_sertifikasi[$i],
                'penanggung_jawab' => $request->penanggung_jawab[$i]
            ]);
        }

        return redirect('/admin/berkas?berkas=' . $request->input('dropdown_value'))->with('success', 'Data berhasil ditambahkan!');
    }
}
