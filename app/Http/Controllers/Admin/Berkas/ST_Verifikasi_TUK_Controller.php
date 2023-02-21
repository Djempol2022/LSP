<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Http\Controllers\Controller;
use App\Models\NamaJabatan;
use App\Models\SkemaSertifikasi;
use App\Models\STVerifikasiTUK;
use Illuminate\Http\Request;
use Validator;

class ST_Verifikasi_TUK_Controller extends Controller
{
    public function index()
    {
        $skema_sertifikasi = SkemaSertifikasi::get();
        return view('admin.berkas.st_verifikasi_tuk.index', [
            'skema_sertifikasi' => $skema_sertifikasi
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_surat' => 'required',
            'tempat_uji' => 'required',
            'skema_sertifikasi' => 'required',
            'tanggal_dilaksanakan' => 'required',
            'nama.*' => 'required',
            'nama' => 'required',
            'jabatan.*' => 'required',
            'jabatan' => 'required',
            'tempat_ditetapkan' => 'required',
            'tanggal_ditetapkan' => 'required',
            'jabatan_bttd' => 'required',
            'nama_bttd' => 'required',
        ], [
            'no_surat.required' => 'Wajib diisi',
            'tempat_uji.required' => 'Wajib diisi',
            'skema_sertifikasi.required' => 'Wajib diisi',
            'tanggal_dilaksanakan.required' => 'Sarana dan Prasarana Wajib diisi',
            'nama.*.required' => 'Nama Wajib diisi',
            'nama.required' => 'Nama Wajib diisi',
            'jabatan.*.required' => 'Jabatan Wajib diisi',
            'jabatan.required' => 'Jabatan Wajib diisi',
            'tempat_ditetapkan.required' => 'Wajib diisi',
            'tanggal_ditetapkan.required' => 'Wajib diisi',
            'jabatan_bttd.required' => 'Wajib diisi',
            'nama_bttd.required' => 'Wajib diisi',
        ]);

        if (!$validator->passes()) return redirect()->back()->withErrors($validator)
            ->withInput();

        $st_verifikasi_tuk = STVerifikasiTUK::create([
            'skema_sertifikasi_id' => $request->skema_sertifikasi,
            'no_surat' => $request->no_surat,
            'tempat_uji' => $request->tempat_uji,
            'tanggal_dilaksanakan' => $request->tanggal_dilaksanakan,
            'tempat_ditetapkan' => $request->tempat_ditetapkan,
            'tanggal_ditetapkan' => $request->tanggal_ditetapkan,
            'jabatan_bttd' => $request->jabatan_bttd,
            'nama_bttd' => $request->nama_bttd,
            'ttd' => $request->ttd
        ])->id;

        for ($i = 0; $i < count($request->nama); $i++) {
            NamaJabatan::create([
                'st_verifikasi_tuk_id' => $st_verifikasi_tuk,
                'nama' => $request->nama[$i],
                'jabatan' => $request->jabatan[$i],
            ]);
        }

        return redirect()->back();
    }
}
