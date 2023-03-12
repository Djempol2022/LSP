<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Http\Controllers\Controller;
use App\Models\HasilVerifikasiTUK;
use App\Models\Jurusan;
use App\Models\PengujiHasilVerifikasiTUK;
use App\Models\SaranaPrasarana;
use App\Models\SaranaPrasaranaSub;
use App\Models\SaranaPrasaranaSub2;
use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;
use Str;
use Validator;

class Hasil_Verifikasi_TUK_Controller extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::with('relasi_skema_sertifikasi')->get();
        $skema_sertifikasi = SkemaSertifikasi::get();
        // dd($jurusan);
        return view('admin.berkas.hasil_verifikasi_tuk.index', [
            'jurusans' => $jurusan,
            'skema_sertifikasi' => $skema_sertifikasi
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jurusan' => 'required',
            'tempat_ditetapkan' => 'required',
            'tanggal_ditetapkan' => 'required',
            'sarana_prasarana.*' => 'required',
            'sarana_prasarana' => 'required',
            'standar.*' => 'required',
            'standar' => 'required',
            'nama_bttd' => 'required',
            'skema_sertifikasi' => 'required',
        ], [
            'jurusan.required' => 'Wajib diisi',
            'tempat_ditetapkan.required' => 'Wajib diisi',
            'tanggal_ditetapkan.required' => 'Wajib diisi',
            'sarana_prasarana.*.required' => 'Sarana dan Prasarana Wajib diisi',
            'sarana_prasarana.required' => 'Sarana dan Prasarana Wajib diisi',
            'standar.*.required' => 'Standar Penguji Wajib diisi',
            'standar.required' => 'Standar Penguji Wajib diisi',
            'nama_bttd.required' => 'Wajib diisi',
            'skema_sertifikasi.required' => 'Wajib diisi',
        ]);

        if (!$validator->passes()) return redirect()->back()->withErrors($validator)
            ->withInput();

        $hasil_verifikasi_tuk = HasilVerifikasiTUK::create([
            'skema_sertifikasi_id' => $request->skema_sertifikasi ?? null,
            'catatan' => $request->catatan ?? null,
            'tempat_ditetapkan' => $request->tempat_ditetapkan ?? null,
            'tanggal_ditetapkan' => $request->tanggal_ditetapkan ?? null,
            'nama_bttd' => $request->nama_bttd ?? null,
            'ttd' => $request->ttd ?? null
        ])->id;

        for ($i = 0; $i < 4; $i++) {
            PengujiHasilVerifikasiTUK::create([
                'hasil_verifikasi_tuk_id' => $hasil_verifikasi_tuk ?? null,
                'standar' => $request->standar[$i] ?? null,
                'kondisi' => $request->kondisi_penguji[$i] ?? null
            ]);
        }

        foreach ($request->sarana_prasarana as $key_s_p => $value_s_p) {
            $sarana_prasarana = SaranaPrasarana::create([
                'hasil_verifikasi_tuk_id' => $hasil_verifikasi_tuk ?? null,
                'sarana_prasarana' => $value_s_p ?? null,
                'status' => $request->status[$key_s_p] ?? null,
                'kondisi' => $request->kondisi[$key_s_p] ?? null
            ])->id;

            if (isset($request->sarana_prasarana_sub[$key_s_p])) {
                foreach ($request->sarana_prasarana_sub[$key_s_p] as $key_s_p_s => $value_s_p_s) {
                    $sarana_prasarana_sub = SaranaPrasaranaSub::create([
                        'sarana_prasarana_id' => $sarana_prasarana ?? null,
                        'sarana_prasarana_sub' => $value_s_p_s ?? null,
                        'status' => $request->status_sub[$key_s_p][$key_s_p_s] ?? null,
                        'kondisi' => $request->kondisi_sub[$key_s_p][$key_s_p_s] ?? null
                    ])->id;

                    if (isset($request->sarana_prasarana_sub2[$key_s_p][$key_s_p_s])) {
                        foreach ($request->sarana_prasarana_sub2[$key_s_p][$key_s_p_s] as $key_s_p_s_2 => $value_s_p_s_2) {
                            SaranaPrasaranaSub2::create([
                                'sarana_prasarana_sub_id' => $sarana_prasarana_sub ?? null,
                                'sarana_prasarana_sub_2' => $value_s_p_s_2 ?? null,
                            ]);
                        }
                    }
                }
            }
        }

        return redirect('/admin/berkas?berkas=' . $request->input('dropdown_value'))->with('success', 'Data berhasil ditambahkan!');
    }
}
