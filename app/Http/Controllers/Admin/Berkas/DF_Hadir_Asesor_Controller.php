<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Http\Controllers\Controller;
use App\Models\DFHadirAsesorPleno;
use App\Models\NamaJabatan;
use Illuminate\Http\Request;
use Validator;

class DF_Hadir_Asesor_Controller extends Controller
{
    public function index()
    {
        return view('admin.berkas.df_hadir_asesor.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'thn_ajaran' => 'required',
            'nama_bttd' => 'required',
            'jabatan_bttd' => 'required',
            'no_met_bttd' => 'required',
            'tgl' => 'required',
            'wkt_mulai' => 'required',
            'wkt_selesai' => 'required',
            'nip' => 'required',
            'nama_nip' => 'required',
            'nip.*' => 'required',
            'nama_nip.*' => 'required',
            'tempat' => 'required',
            'nama' => 'required',
            'nama.*' => 'required',
            'jabatan' => 'required',
            'jabatan_nip' => 'required',
            'jabatan_nip.*' => 'required',
            'jabatan.*' => 'required',
            'no_reg_met' => 'required',
            'no_reg_met.*' => 'required',
            'jml_row_df_hadir_asesi' => 'required',
        ], [
            'thn_ajaran.required' => 'Wajib diisi',
            'nama_bttd.required' => 'Wajib diisi',
            'jabatan_bttd.required' => 'Wajib diisi',
            'no_met_bttd.required' => 'Wajib diisi',
            'tgl.required' => 'Wajib diisi',
            'wkt_mulai.required' => 'Wajib diisi',
            'wkt_selesai.required' => 'Wajib diisi',
            'nip.required' => 'Wajib diisi',
            'nama_nip.required' => 'Wajib diisi',
            'nip.*.required' => 'Wajib diisi',
            'nama_nip.*.required' => 'Wajib diisi',
            'tempat.required' => 'Wajib diisi',
            'nama.required' => 'Wajib diisi',
            'nama.*.required' => 'Wajib diisi',
            'jabatan.required' => 'Wajib diisi',
            'jabatan_nip.required' => 'Wajib diisi',
            'jabatan.*.required' => 'Wajib diisi',
            'jabatan_nip.*.required' => 'Wajib diisi',
            'no_reg_met.required' => 'Wajib diisi',
            'no_reg_met.*.required' => 'Wajib diisi',
            'jml_row_df_hadir_asesi.required' => 'Wajib diisi',
        ]);

        // dd($request->all());

        if (!$validator->passes()) return redirect()->back()->withErrors($validator)
            ->withInput();

        $df_hadir_asesor = DFHadirAsesorPleno::create([
            'nama_bttd' => $request->nama_bttd,
            'jabatan_bttd' => $request->jabatan_bttd,
            'no_met_bttd' => $request->no_met_bttd,
            'tgl' => $request->tgl,
            'wkt_mulai' => $request->wkt_mulai,
            'wkt_selesai' => $request->wkt_selesai,
            'tempat' => $request->tempat,
            'thn_ajaran' => $request->thn_ajaran . '-01-01',
            'ttd' => $request->ttd,
            'is_pleno' => 0,
            'jml_row_df_hadir_asesi' => $request->jml_row_df_hadir_asesi,
        ])->id;

        foreach ($request->nama_nip as $key => $nama) {
            NamaJabatan::create([
                'df_hadir_asesor_pleno_id' => $df_hadir_asesor,
                'nama' => $nama,
                'jabatan' => $request->jabatan_nip[$key],
                'nip' => $request->nip[$key],
                'is_nip' => 1
            ]);
        }

        foreach ($request->nama as $key => $nama) {
            NamaJabatan::create([
                'df_hadir_asesor_pleno_id' => $df_hadir_asesor,
                'nama' => $nama,
                'jabatan' => $request->jabatan[$key],
                'no_reg_met' => $request->no_reg_met[$key],
                'is_nip' => 0
            ]);
        }

        return redirect('/admin/berkas?berkas=' . $request->input('dropdown_value'))->with('success', 'Data berhasil ditambahkan!');
    }
}
