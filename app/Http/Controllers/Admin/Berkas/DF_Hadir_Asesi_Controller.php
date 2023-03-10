<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Http\Controllers\Controller;
use App\Models\DFHadirAsesi;
use App\Models\DFHadirAsesiChild;
use App\Models\Institusi;
use App\Models\SkemaSertifikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class DF_Hadir_Asesi_Controller extends Controller
{
    public function index()
    {
        $skema_sertifikasi = SkemaSertifikasi::get();
        $institusi = Institusi::get();
        $nama_asesi = User::where('role_id', 4)->get(['id', 'nama_lengkap', 'institusi_id']);
        $nama_asesor = User::where('role_id', 3)->get(['id', 'nama_lengkap']);
        // $b = User::with('relasi_asesor_uji_kompetensi.relasi_asesi_uji_kompetensi')->where('role_id', 3)->get();
        // dd($b);
        return view('admin.berkas.df_hadir_asesi.index', [
            'skema_sertifikasi' => $skema_sertifikasi,
            'institusi' => $institusi,
            'nama_asesi' => $nama_asesi,
            'nama_asesor' => $nama_asesor
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'no_peserta' => 'required',
                'no_peserta.*' => 'required',
                'nama_asesi' => 'required',
                'nama_asesi.*' => 'required',
                'asal_sekolah' => 'required',
                'asal_sekolah.*' => 'required',
                'jabatan_bttd' => 'required',
                'nama_bttd' => 'required',
                'no_met_bttd' => 'required',
                'nama_asesor' => 'required',
                'no_met_asesor' => 'required',
                'tgl' => 'required',
                'wkt_mulai' => 'required',
                'tempat' => 'required',
                'skema_sertifikasi' => 'required',
            ],
            [
                'no_peserta.required' => 'Wajib diisi',
                'no_peserta.*.required' => 'Wajib diisi',
                'nama_asesi.required' => 'Wajib diisi',
                'nama_asesi.*.required' => 'Wajib diisi',
                'asal_sekolah.required' => 'Wajib diisi',
                'asal_sekolah.*.required' => 'Wajib diisi',
                'jabatan_bttd.required' => 'Wajib diisi',
                'nama_bttd.required' => 'Wajib diisi',
                'no_met_bttd.required' => 'Wajib diisi',
                'nama_asesor.required' => 'Wajib diisi',
                'no_met_asesor.required' => 'Wajib diisi',
                'tgl.required' => 'Wajib diisi',
                'wkt_mulai.required' => 'Wajib diisi',
                'tempat.required' => 'Wajib diisi',
                'skema_sertifikasi.required' => 'Wajib diisi',
            ]
        );

        if (!$validator->passes()) return redirect()->back()->withErrors($validator)->withInput();

        $df_hadir_asesi = DFHadirAsesi::create([
            'tgl' => $request->tgl,
            'waktu' => $request->wkt_mulai,
            'tempat' => $request->tempat,
            'skema_sertifikasi_id' => $request->skema_sertifikasi,
            'jabatan_bttd' => $request->jabatan_bttd,
            'nama_bttd' => $request->nama_bttd,
            'no_met_bttd' => $request->no_met_bttd,
            'ttd_bttd' => $request->ttd,
            'nama_asesor' => $request->nama_asesor,
            'no_met_asesor' => $request->no_met_asesor,
            'ttd_asesor' => $request->ttd_asesor,
        ])->id;

        foreach ($request->no_peserta as $key => $value) {
            DFHadirAsesiChild::create([
                'df_hadir_asesi_id' => $df_hadir_asesi,
                'no_peserta' => $value,
                'nama_asesi' => $request->nama_asesi[$key],
                'institusi_id' => $request->asal_sekolah[$key],
            ]);
        }

        return redirect('/admin/berkas?berkas=' . $request->input('dropdown_value'))->with('success', 'Data berhasil ditambahkan!');
    }
}
