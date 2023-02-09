<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Http\Controllers\Controller;
use App\Models\NamaJabatan;
use App\Models\NamaTempatUjiKompetensi;
use App\Models\X03STVerifikasiTUK;
use Illuminate\Http\Request;
use Validator;

class X03_ST_verifikasi_TUK_controller extends Controller
{
    public function index()
    {
        $nama_tuk = NamaTempatUjiKompetensi::get();
        return view('admin.berkas.x03_st_verifikasi_tuk.index', [
            'nama_tuk' => $nama_tuk,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'no_surat' => 'required',
            'nama_tuk' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'waktu' => 'required',
            'nama.*' => 'required',
            'nama' => 'required',
            'jabatan.*' => 'required',
            'jabatan' => 'required',
            'tempat_ditetapkan' => 'required',
            'tanggal_ditetapkan' => 'required',
            'jabatan_bttd' => 'required',
            'nama_bttd' => 'required',
            'no_met_bttd' => 'required',
        ], [
            'no_surat.required' => 'Wajib diisi',
            'nama_tuk.required' => 'Wajib diisi',
            'tanggal_mulai.required' => 'Wajib diisi',
            'tanggal_selesai.required' => 'Wajib diisi',
            'waktu.required' => 'Wajib diisi',
            'nama.*.required' => 'Nama Wajib diisi',
            'nama.required' => 'Nama Wajib diisi',
            'jabatan.*.required' => 'Jabatan Wajib diisi',
            'jabatan.required' => 'Jabatan Wajib diisi',
            'tempat_ditetapkan.required' => 'Wajib diisi',
            'tanggal_ditetapkan.required' => 'Wajib diisi',
            'jabatan_bttd.required' => 'Wajib diisi',
            'nama_bttd.required' => 'Wajib diisi',
            'no_met_bttd' => 'Wajib diisi',
        ]);

        if (!$validator->passes()) return redirect()->back()->withErrors($validator)
            ->withInput();

        $x03_st_verifikasi_tuk = X03STVerifikasiTUK::create([
            'nama_tuk_id' => $request->nama_tuk,
            'no_surat' => $request->no_surat,
            'tempat_ditetapkan' => $request->tempat_ditetapkan,
            'tanggal_ditetapkan' => $request->tanggal_ditetapkan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'waktu' => $request->waktu,
            'jabatan_bttd' => $request->jabatan_bttd,
            'nama_bttd' => $request->nama_bttd,
            'no_met_bttd' => $request->no_met_bttd,
            'ttd' => $request->ttd
        ])->id;

        for ($i = 0; $i < count($request->nama); $i++) {
            NamaJabatan::create([
                'x03_st_verifikasi_tuk_id' => $x03_st_verifikasi_tuk,
                'nama' => $request->nama[$i],
                'jabatan' => $request->jabatan[$i],
            ]);
        }

        return redirect()->back();
    }
}
