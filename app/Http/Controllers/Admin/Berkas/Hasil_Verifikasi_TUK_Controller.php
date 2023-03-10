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
        // dd(gettype($request->jurusan));
        // $b = [];
        // $c = [];
        // $d = [];
        // $e = false;
        // $key_sub2 = collect($request->sarana_prasarana_sub2)->keys();
        // foreach ($request->sarana_prasarana as $key => $value) {
        //     // dd($value[$key]);
        //     $g = false;
        //     foreach ($request->sarana_prasarana_sub as $key_sub => $value_sub) {
        //         // dd($value_sub);
        //         $c[] = $value_sub[$key] ?? null;
        //         $f[] = $key_sub2[$key_sub] ?? null;

        //         foreach ($request->sarana_prasarana_sub2 as $value_sub2) {
        //             dd($value_sub2);
        //         }
        //     }
        //     $e = true;
        //     // dd($f);
        //     $b[] = $value ?? null;
        // }
        // dd([$b, $c, $d]);
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

        // for ($i = 0; $i < 4; $i++) {
        //     PengujiHasilVerifikasiTUK::create([
        //         'hasil_verifikasi_tuk_id' => $hasil_verifikasi_tuk ?? null,
        //         'standar' => $request->standar[$i] ?? null,
        //         'kondisi' => $request->kondisi_penguji[$i] ?? null
        //     ]);
        // }

        dd($request->all());
        if ($request->sarana_prasarana) {
            $sarana_prasarana_id = [];
            foreach ($request->sarana_prasarana as $key_sarana_prasarana => $value_sarana_prasarana) {
                // insert sarana prasarana
                $sarana_prasarana = SaranaPrasarana::create([
                    'hasil_verifikasi_tuk_id' => $hasil_verifikasi_tuk ?? null,
                    'sarana_prasarana' => $value_sarana_prasarana ?? null,
                    'status' => $request->status[$key_sarana_prasarana] ?? null,
                    'kondisi' => $request->kondisi[$key_sarana_prasarana] ?? null
                ])->id;
                $sarana_prasarana_id[] = $sarana_prasarana;
            }

            $sarana_prasarana_sub_id = [];
            for ($i = 0; $i <= count($request->sarana_prasarana_sub); $i++) {
                $check_sarana_rasarana_sub = $request->sarana_prasarana_sub[$i] ?? null;
                if ($check_sarana_rasarana_sub != null) {
                    for ($j = 0; $j < count($request->sarana_prasarana_sub[$i]); $j++) {
                        $sarana_prasarana_sub = SaranaPrasaranaSub::create([
                            'sarana_prasarana_id' => $sarana_prasarana_id[$i] ?? null,
                            'sarana_prasarana_sub' => $request->sarana_prasarana_sub[$i][$j] ?? null,
                            'status' => $request->status_sub[$i][$j] ?? null,
                            'kondisi' => $request->kondisi_sub[$i][$j] ?? null
                        ])->id;
                        $sarana_prasarana_sub_id[] = $sarana_prasarana_sub;
                    }
                }
            }
            // dd($sarana_prasarana_sub_id);
            for ($i = 0; $i <= count($request->sarana_prasarana_sub2); $i++) {
                $check_sarana_prasarana_sub2 = $request->sarana_prasarana_sub2[$i] ?? null;

                if ($check_sarana_prasarana_sub2 != null) {
                    for ($j = 0; $j <= count($request->sarana_prasarana_sub2[$i]); $j++) {
                        $check_sarana_prasarana_sub2_bagian2 = $request->sarana_prasarana_sub2[$i][$j] ?? null;
                        if ($check_sarana_prasarana_sub2_bagian2 != null) {

                            for ($z = 0; $z < count($request->sarana_prasarana_sub2[$i][$j]); $z++) {
                                SaranaPrasaranaSub2::create([
                                    'sarana_prasarana_sub_id' => $sarana_prasarana_sub_id[$j] ?? null,
                                    'sarana_prasarana_sub_2' => $request->sarana_prasarana_sub2[$i][$j][$z] ?? null,
                                ]);
                            }
                        }
                    }
                }
            }

            dd($request->all());
        }

        // if ($request->sarana_prasarana) {
        //     foreach ($request->sarana_prasarana as $key_sarana_prasarana => $value_sarana_prasarana) {

        //         // insert sarana prasarana
        //         $sarana_prasarana = SaranaPrasarana::create([
        //             'hasil_verifikasi_tuk_id' => $hasil_verifikasi_tuk ?? null,
        //             'sarana_prasarana' => $value_sarana_prasarana ?? null,
        //             'status' => $request->status[$key_sarana_prasarana] ?? null,
        //             'kondisi' => $request->kondisi[$key_sarana_prasarana] ?? null
        //         ])->id;

        //         if ($request->sarana_prasarana_sub) {
        //             // insert sarana prasarana sub
        //             foreach ($request->sarana_prasarana_sub as $key_sarana_prasarana_sub => $value_sarana_prasarana_sub) {
        //                 $sarana_prasarana_sub = SaranaPrasaranaSub::create([
        //                     'sarana_prasarana_id' => $sarana_prasarana,
        //                     'sarana_prasarana_sub' => $value_sarana_prasarana_sub[$key_sarana_prasarana] ?? null,
        //                     'status' => $request->status_sub[$key_sarana_prasarana_sub] ?? null,
        //                     'kondisi' => $request->kondisi_sub[$key_sarana_prasarana_sub] ?? null,
        //                 ])->id;

        //                 if ($request->sarana_prasarana_sub2) {
        //                     foreach ($request->sarana_prasarana_sub2 as $value_sarana_prasarana_sub2) {
        //                         SaranaPrasaranaSub2::create([
        //                             'sarana_prasarana_sub_id' => $sarana_prasarana_sub ?? null,
        //                             'sarana_prasarana_sub_2' => $value_sarana_prasarana_sub2[$key_sarana_prasarana][$key_sarana_prasarana_sub] ?? null,
        //                         ]);
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }

        return redirect()->back();
    }
}
