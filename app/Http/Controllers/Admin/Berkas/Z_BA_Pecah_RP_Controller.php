<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Http\Controllers\Controller;
use App\Models\BahasanDiskusi;
use App\Models\Institusi;
use App\Models\NamaJabatan;
use App\Models\NamaTempatUjiKompetensi;
use App\Models\SkemaSertifikasi;
use App\Models\ZBAPecahRP;
use Illuminate\Http\Request;
use Validator;

class Z_BA_Pecah_RP_Controller extends Controller
{
    public function index()
    {
        $institusi = Institusi::get();
        $nama_tuk = NamaTempatUjiKompetensi::get();
        $skema_sertifikasi = SkemaSertifikasi::get();
        return view('admin.berkas.z_ba_pecah_rp.index', [
            'institusis' => $institusi,
            'nama_tuk' => $nama_tuk,
            'skema_sertifikasi' => $skema_sertifikasi
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'institusi' => 'required',
            'skema_sertifikasi' => 'required',
            'tgl_tes_tertulis' => 'required',
            'tgl_tes_praktek' => 'required',
            'jml_asesi' => 'required',
            'wkt_mulai_uk' => 'required',
            'wkt_selesai_uk' => 'required',
            'nama_tuk' => 'required',
            'nama_bttd' => 'required',
            'jabatan_bttd' => 'required',
            'no_met_bttd' => 'required',
            'tempat_rapat' => 'required',
            'topik' => 'required',
            'ketua_rapat' => 'required',
            'notulis' => 'required',
            'no_met_notulis' => 'required',
            'nama' => 'required',
            'nama.*' => 'required',
            'jabatan' => 'required',
            'jabatan.*' => 'required',
            'bahasan_diskusi' => 'required',
            'bahasan_diskusi.*' => 'required',
        ], [
            'institusi.required' => 'Wajib diisi',
            'skema_sertifikasi.required' => 'Wajib diisi',
            'tgl_tes_tertulis.required' => 'Wajib diisi',
            'tgl_tes_praktek.required' => 'Wajib diisi',
            'jml_asesi.required' => 'Wajib diisi',
            'wkt_mulai_uk.required' => 'Wajib diisi',
            'wkt_selesai_uk.required' => 'Wajib diisi',
            'nama_tuk.required' => 'Wajib diisi',
            'nama_bttd.required' => 'Wajib diisi',
            'jabatan_bttd.required' => 'Wajib diisi',
            'no_met_bttd.required' => 'Wajib diisi',
            'tempat_rapat.required' => 'Wajib diisi',
            'topik.required' => 'Wajib diisi',
            'ketua_rapat.required' => 'Wajib diisi',
            'notulis.required' => 'Wajib diisi',
            'no_met_notulis.required' => 'Wajib diisi',
            'nama.required' => 'Wajib diisi',
            'nama.*.required' => 'Wajib diisi',
            'jabatan.required' => 'Wajib diisi',
            'jabatan.*.required' => 'Wajib diisi',
            'bahasan_diskusi.required' => 'Wajib diisi',
            'bahasan_diskusi.*.required' => 'Wajib diisi',
        ]);

        if (!$validator->passes()) return redirect()->back()->withErrors($validator)
            ->withInput();

        $z_ba_pecah_rp = ZBAPecahRP::create([
            'institusi_id' => $request->institusi,
            'skema_sertifikasi_id' => $request->skema_sertifikasi,
            'tgl_tes_tertulis' => $request->tgl_tes_tertulis,
            'tgl_tes_praktek' => $request->tgl_tes_praktek,
            'jml_asesi' => $request->jml_asesi,
            'wkt_mulai_uk' => $request->wkt_mulai_uk,
            'wkt_selesai_uk' => $request->wkt_selesai_uk,
            'nama_tuk_id' => $request->nama_tuk,
            'jabatan_bttd' => $request->jabatan_bttd,
            'nama_bttd' => $request->nama_bttd,
            'no_met_bttd' => $request->no_met_bttd,
            'tempat_rapat' => $request->tempat_rapat,
            'topik' => $request->topik,
            'ketua_rapat' => $request->ketua_rapat,
            'notulis' => $request->notulis,
            'no_met_notulis' => $request->no_met_notulis,
            'ttd' => $request->ttd,
            'status' => 0
        ])->id;

        for ($i = 0; $i < count($request->nama); $i++) {
            NamaJabatan::create([
                'z_ba_pecah_rp_id' => $z_ba_pecah_rp,
                'nama' => $request->nama[$i],
                'jabatan' => $request->jabatan[$i],
            ]);
        }

        for ($i = 0; $i < count($request->bahasan_diskusi); $i++) {
            BahasanDiskusi::create([
                'z_ba_pecah_rp_id' => $z_ba_pecah_rp,
                'bahasan_diskusi' => $request->bahasan_diskusi[$i],
            ]);
        }

        return redirect()->back();
    }
}
