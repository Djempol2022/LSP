<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Http\Controllers\Controller;
use App\Models\DFHadirAsesorPleno;
use App\Models\NamaJabatan;
use Illuminate\Http\Request;
use Validator;

class DF_Hadir_Asesor_Pleno_Controller extends Controller
{
    public function index()
    {
        return view('admin.berkas.df_hadir_asesor_pleno.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_bttd' => 'required',
            'jabatan_bttd' => 'required',
            'no_met_bttd' => 'required',
            'tgl' => 'required',
            'wkt' => 'required',
            'tempat' => 'required',
            'nama' => 'required',
            'nama.*' => 'required',
            'jabatan' => 'required',
            'jabatan.*' => 'required',
            'no_reg_met' => 'required',
            'no_reg_met.*' => 'required',
        ], [
            'nama_bttd.required' => 'Wajib diisi',
            'jabatan_bttd.required' => 'Wajib diisi',
            'no_met_bttd.required' => 'Wajib diisi',
            'tgl.required' => 'Wajib diisi',
            'wkt.required' => 'Wajib diisi',
            'tempat.required' => 'Wajib diisi',
            'nama.required' => 'Wajib diisi',
            'nama.*.required' => 'Wajib diisi',
            'jabatan.required' => 'Wajib diisi',
            'jabatan.*.required' => 'Wajib diisi',
            'no_reg_met.required' => 'Wajib diisi',
            'no_reg_met.*.required' => 'Wajib diisi',
        ]);

        if (!$validator->passes()) return redirect()->back()->withErrors($validator)
            ->withInput();

        $df_hadir_asesor_pleno = DFHadirAsesorPleno::create([
            'nama_bttd' => $request->nama_bttd,
            'jabatan_bttd' => $request->jabatan_bttd,
            'no_met_bttd' => $request->no_met_bttd,
            'tgl' => $request->tgl,
            'wkt_mulai' => $request->wkt,
            'tempat' => $request->tempat,
            'ttd' => $request->ttd,
            'is_pleno' => 1
        ])->id;

        foreach ($request->nama as $key => $nama) {
            NamaJabatan::create([
                'df_hadir_asesor_pleno_id' => $df_hadir_asesor_pleno,
                'nama' => $nama,
                'jabatan' => $request->jabatan[$key],
                'no_reg_met' => $request->no_reg_met[$key],
            ]);
        }

        return redirect()->back();
    }
}
