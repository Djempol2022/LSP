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
        dd($request->all());
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

        for ($i = 0; $i < count($request->sarana_prasarana); $i++) {

            $sarana_prasarana = SaranaPrasarana::create([
                'hasil_verifikasi_tuk_id' => $hasil_verifikasi_tuk ?? null,
                'sarana_prasarana' => $request->sarana_prasarana[$i] ?? null,
                'status' => $request->status[$i] ?? null,
                'kondisi' => $request->kondisi[$i] ?? null
            ])->id;

            // for ($j = 0; $j < count($request->sarana_prasarana_sub); $j++) {
            $sarana_prasarana_sub = SaranaPrasaranaSub::create([
                'sarana_prasarana_id' => $sarana_prasarana,
                'sarana_prasarana_sub' => $request->sarana_prasarana_sub[$i] ?? null,
                'status' => $request->status_sub[$i] ?? null,
                'kondisi' => $request->kondisi_sub[$i] ?? null,
            ])->id;
            // }

            SaranaPrasaranaSub2::create([
                'sarana_prasarana_sub_id' => $sarana_prasarana_sub ?? null,
                'sarana_prasarana_sub_2' => $request->sarana_prasarana_sub2[$i] ?? null,
            ]);
        }
        // $b = $request->all();
        // $contains = Str::contains($b, 'status');
        // dd($contains);
        // for($i = 2; $i < )
        return redirect()->back();
    }
}
