<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\SkemaSertifikasi;
use App\Models\X04BeritaAcara;
use Illuminate\Http\Request;
use Validator;

class X04_Berita_Acara_Controller extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::with('relasi_skema_sertifikasi')->get();
        $skema_sertifikasi = SkemaSertifikasi::get();
        return view('admin.berkas.x04_berita_acara.index', [
            'jurusans' => $jurusan,
            'skema_sertifikasi' => $skema_sertifikasi,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jurusan' => 'required',
            'skema_sertifikasi' => 'required',
            'nama_bttd' => 'required',
            'jabatan_bttd' => 'required',
            'nip_bttd' => 'required',
        ], [
            'jurusan.required' => 'Wajib diisi',
            'skema_sertifikasi.required' => 'Wajib diisi',
            'nama_bttd.required' => 'Wajib diisi',
            'jabatan_bttd.required' => 'Wajib diisi',
            'nip_bttd.required' => 'Wajib diisi',
        ]);

        if (!$validator->passes()) return redirect()->back()->withErrors($validator)
            ->withInput();

        X04BeritaAcara::create([
            'skema_sertifikasi_id' => $request->skema_sertifikasi,
            'jabatan_bttd' => $request->jabatan_bttd,
            'nama_bttd' => $request->nama_bttd,
            'nip_bttd' => $request->nip_bttd,
            'ttd' => $request->ttd,
        ]);

        return redirect()->route('admin.Berkas');
    }
}
