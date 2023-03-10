<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Http\Controllers\Controller;
use App\Models\NamaTempatUjiKompetensi;
use App\Models\SkemaSertifikasi;
use App\Models\SKPenetapanTUK;
use App\Models\SKPenetapanTUKChild;
use Illuminate\Http\Request;
use Validator;

class SK_Penetapan_TUK_Terverifikasi_Controller extends Controller
{
    public function index()
    {
        return view('admin.berkas.sk_penetapan_tuk_terverifikasi.index', [
            'nama_tuk' => NamaTempatUjiKompetensi::get(),
            'skema_sertifikasi' => SkemaSertifikasi::get()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_sk' => 'required',
            'tempat_ditetapkan' => 'required',
            'tanggal_ditetapkan' => 'required',
            'jabatan_bttd' => 'required',
            'nama_bttd' => 'required',
            'nama_tuk.*' => 'required',
            'nama_skema_sertifikasi.*' => 'required',
            'tempat.*' => 'required',
            'nama_tuk' => 'required',
            'nama_skema_sertifikasi' => 'required',
            'tempat' => 'required',
        ], [
            'no_sk.required' => 'Wajib diisi',
            'tempat_ditetapkan.required' => 'Wajib diisi',
            'tanggal_ditetapkan.required' => 'Wajib diisi',
            'jabatan_bttd.required' => 'Wajib diisi',
            'nama_bttd.required' => 'Wajib diisi',
            'nama_tuk.required' => 'Wajib diisi',
            'nama_skema_sertifikasi.required' => 'Wajib diisi',
            'tempat.required' => 'Wajib diisi',
            'nama_tuk.*.required' => 'Wajib diisi',
            'nama_skema_sertifikasi.*.required' => 'Wajib diisi',
            'tempat.*.required' => 'Wajib diisi',
        ]);

        // dd($validator->errors());
        if (!$validator->passes()) return redirect()->back()->withErrors($validator)
            ->withInput();


        $sk_penetapan_tuk = SKPenetapanTUK::create([
            'no_sk' => $request->no_sk,
            'tempat_ditetapkan' => $request->tempat_ditetapkan,
            'tanggal_ditetapkan' => $request->tanggal_ditetapkan,
            'nama_bttd' => $request->nama_bttd,
            'jabatan_bttd' => $request->jabatan_bttd,
            'ttd' => $request->ttd,
        ])->id;

        for ($i = 0; $i < count($request->nama_tuk); $i++) {
            SKPenetapanTUKChild::create([
                'sk_penetapan_tuk_id' => $sk_penetapan_tuk,
                'nama_tuk_id' => $request->nama_tuk[$i],
                'skema_sertifikasi_id' => $request->nama_skema_sertifikasi[$i],
                'tempat' => $request->tempat[$i]
            ]);
        }

        return redirect('/admin/berkas?berkas=' . $request->input('dropdown_value'))->with('success', 'Data berhasil ditambahkan!');
    }
}
