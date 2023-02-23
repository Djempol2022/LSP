<?php

namespace App\Http\Controllers\Peninjau;

use Auth;
use App\Models\Soal;
use Illuminate\Http\Request;
use App\Models\PelaksanaanUjian;
use App\Models\JadwalUjiKompetensi;
use App\Http\Controllers\Controller;
use App\Models\SkemaSertifikasi;
use App\Models\UnitKompetensi;
use App\Models\UnitKompetensiIsi;
use App\Models\UnitKompetensiIsi2;
use App\Models\UnitKompetensiSub;

class PeninjauDashboardController extends Controller
{
    public function dashboard(){
        return view('peninjau.dashboard.dashboard');
    }

    public function tampil_data_muk_asesor_peninjau(Request $request){
        $data = JadwalUjiKompetensi::select([
            'jadwal_uji_kompetensi.*'
        ]);

        if($request->input('length')!=-1) 
        $data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->with('relasi_pelaksanaan_ujian','relasi_muk', 'relasi_user_asesor.relasi_user_asesor_detail', 
        'relasi_user_peninjau.relasi_user_peninjau_detail')
        ->whereRelation('relasi_muk', 'jurusan_id', Auth::user()->jurusan_id)->get();
        $rekamTotal = $data->count();
        $rekamFilter = $data->count();
            
            return response()->json([
                'draw'=>$request->input('draw'),
                'data'=>$data,
                'recordsTotal'=>$rekamTotal,
                'recordsFiltered'=>$rekamFilter,
        ]);
    }

    public function peninjau_review_soal($jadwal_id, $jenis_tes){
        $pelaksanaan_ujian = PelaksanaanUjian::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('jenis_tes', $jenis_tes)->first();
        $soal = Soal::where('jadwal_uji_kompetensi_id', $jadwal_id)->paginate(10);
        return view('peninjau.dashboard.review_soal', compact('soal', 'pelaksanaan_ujian'));
    }
}
