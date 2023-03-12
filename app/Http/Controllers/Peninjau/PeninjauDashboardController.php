<?php

namespace App\Http\Controllers\Peninjau;

use Auth;
use App\Models\Soal;
use Illuminate\Http\Request;
use App\Models\UnitKompetensi;
use App\Models\PelaksanaanUjian;
use App\Models\SkemaSertifikasi;
use App\Models\UnitKompetensiIsi;
use App\Models\UnitKompetensiSub;
use App\Models\AsesiUjiKompetensi;
use App\Models\UnitKompetensiIsi2;
use App\Models\AsesorUjiKompetensi;
use App\Models\JadwalUjiKompetensi;
use App\Http\Controllers\Controller;
use App\Models\PeninjauUjiKompetensi;

class PeninjauDashboardController extends Controller
{
    public function dashboard(){
        return view('peninjau.dashboard.dashboard');
    }

     // TABLE JADWAL UJI KOMPETENSI ASESI UNTUK ASESOR/PENINJAU
   public function data_peserta_pelaksanaan_uji_kompetensi(Request $request)
   {
        $data = PelaksanaanUjian::select([
            'pelaksanaan_ujian.*'
        ]);

        $data = $data->skip($request->input('start'))->take($request->input('length'));

        $asesor = AsesorUjiKompetensi::where('user_asesor_id', Auth::user()->id)->first() ?? new AsesorUjiKompetensi();
        $peninjau = PeninjauUjiKompetensi::where('user_peninjau_id', Auth::user()->id)->first() ?? new PeninjauUjiKompetensi();
        
        if(Auth::user()->id === $asesor->user_asesor_id){
        $data = $data->with(
            'relasi_jadwal_uji_kompetensi.relasi_muk',
            'relasi_jadwal_uji_kompetensi.relasi_user_asesi.relasi_user_asesi',
            'relasi_jadwal_uji_kompetensi.relasi_user_peninjau.relasi_user_peninjau_detail',
            'relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail',
            'relasi_tuk'
            )
            ->whereRelation('relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail', 'id', Auth::user()->id)
            ->get();
        }

        elseif(Auth::user()->id === $peninjau->user_peninjau_id){
        $data = $data->with(
            'relasi_jadwal_uji_kompetensi.relasi_muk',
            'relasi_jadwal_uji_kompetensi.relasi_user_asesi.relasi_user_asesi',
            'relasi_jadwal_uji_kompetensi.relasi_user_peninjau.relasi_user_peninjau_detail',
            'relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail',
            'relasi_tuk'
            )
            ->whereRelation('relasi_jadwal_uji_kompetensi.relasi_user_peninjau', 'user_peninjau_id', Auth::user()->id)
            ->get();
        }
        

        $rekamFilter = $data->count();
        $rekamTotal = $data->count();
        return response()->json([
            'draw' => $request->input('draw'),
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter,
        ]);
   }


   // PESERTA ASESI MENGIKUTI UJI KOMPETENSI
   public function data_list_asesi_peserta_uji_kompetensi(Request $request, $jadwal_uji_kompetensi_id)
   {
       $data = AsesiUjiKompetensi::select([
           'asesi_uji_kompetensi.*'
       ]);

       $data = $data->skip($request->input('start'))->take($request->input('length'));
       $data = $data->with('relasi_user_asesi')->where('jadwal_uji_kompetensi_id', $jadwal_uji_kompetensi_id)->get();
       $rekamFilter = $data->count();
       $rekamTotal = $data->count();
       return response()->json([
           'draw' => $request->input('draw'),
           'data' => $data,
           'recordsTotal' => $rekamTotal,
           'recordsFiltered' => $rekamFilter,
       ]);
   }

    
    public function tampil_data_muk_asesor_peninjau(Request $request, $id){
        $data = JadwalUjiKompetensi::select([
            'jadwal_uji_kompetensi.*'
        ]);

        if($request->input('length')!=-1) 
        // $data = $data->skip($request->input('start'))->take($request->input('length'));
        // $data = $data->with('relasi_pelaksanaan_ujian','relasi_muk', 'relasi_user_asesor.relasi_user_asesor_detail', 
        // 'relasi_user_peninjau.relasi_user_peninjau_detail')
        // ->whereRelation('relasi_muk', 'jurusan_id', $id)
        // ->whereRelation('relasi_pelaksanaan_ujian', 'jenis_tes', '>', 0)->get();
        
        $asesor = AsesorUjiKompetensi::where('user_asesor_id', Auth::user()->id)->first() ?? new AsesorUjiKompetensi();
        $peninjau = PeninjauUjiKompetensi::where('user_peninjau_id', Auth::user()->id)->first() ?? new PeninjauUjiKompetensi();
        
        if(Auth::user()->id === $asesor->user_asesor_id){
            $data = $data->with('relasi_muk', 'relasi_pelaksanaan_ujian', 
            'relasi_user_asesor.relasi_user_asesor_detail', 
            'relasi_user_peninjau.relasi_user_peninjau_detail')

            ->whereRelation('relasi_user_asesor.relasi_user_asesor_detail', 'user_asesor_id', '!=', null)
            // ->whereRelation('relasi_user_peninjau.relasi_user_peninjau_detail', 'user_peninjau_id', '!=', null)
            ->whereRelation('relasi_pelaksanaan_ujian', 'jenis_tes', '!=', null)

            // ->whereRelation('relasi_user_peninjau', 'user_peninjau_id', Auth::user()->id)
            ->whereRelation('relasi_user_asesor', 'user_asesor_id', Auth::user()->id)

            
            ->whereRelation('relasi_muk', 'jurusan_id', Auth::user()->jurusan_id)
            ->get();
        }
        elseif(Auth::user()->id === $peninjau->user_peninjau_id){
            $data = $data->with('relasi_muk', 'relasi_pelaksanaan_ujian', 
            'relasi_user_asesor.relasi_user_asesor_detail', 
            'relasi_user_peninjau.relasi_user_peninjau_detail')

            // ->whereRelation('relasi_user_asesor.relasi_user_asesor_detail', 'user_asesor_id', '!=', null)
            ->whereRelation('relasi_user_peninjau.relasi_user_peninjau_detail', 'user_peninjau_id', '!=', null)
            ->whereRelation('relasi_pelaksanaan_ujian', 'jenis_tes', '!=', null)

            ->whereRelation('relasi_user_peninjau', 'user_peninjau_id', Auth::user()->id)
            // ->whereRelation('relasi_user_asesor', 'user_asesor_id', Auth::user()->id)

            
            ->whereRelation('relasi_muk', 'jurusan_id', Auth::user()->jurusan_id)
            ->get();
        }


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
        $pelaksanaan_ujian = PelaksanaanUjian::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('jenis_tes', $jenis_tes)->first() ?? new PelaksanaanUjian();
        $asesor     = AsesorUjiKompetensi::with('relasi_user_asesor_detail')->where('jadwal_uji_kompetensi_id', $jadwal_id)->first() ?? new AsesorUjiKompetensi();
        $peninjau   = PeninjauUjiKompetensi::with('relasi_user_peninjau_detail')->where('jadwal_uji_kompetensi_id', $jadwal_id)->first() ?? new PeninjauUjiKompetensi();
        $muk        = JadwalUjiKompetensi::with('relasi_muk')->where('id', $jadwal_id)->first() ?? new JadwalUjiKompetensi();
        $soal = Soal::where('jadwal_uji_kompetensi_id', $jadwal_id)->paginate(10);
        return view('peninjau.dashboard.review_soal', compact('soal', 'pelaksanaan_ujian', 'asesor', 'peninjau', 'muk'));
    }
}
