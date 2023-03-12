<?php

namespace App\Http\Controllers\Peninjau;

use PDF;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UnitKompetensi;
use App\Models\PelaksanaanUjian;
use App\Models\SkemaSertifikasi;
use App\Models\AsesiUjiKompetensi;
use App\Models\AsesorUjiKompetensi;
use App\Models\JadwalUjiKompetensi;
use App\Models\MateriUjiKompetensi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PeninjauUjiKompetensi;
use App\Models\PengesahanMuk_Penyusun;
use App\Models\PengesahanMuk_Validator;
use App\Models\PengesahanMuk_OrangRelevan;
use App\Models\PengesahanMuk_RencanaAsesmen;
use App\Models\PengesahanMuk_OrangRelevanTtd;
use App\Models\PengesahanMuk_Mengidentifikasi;
use App\Models\PengesahanMuk_PendekatanAsesmen;
use App\Models\PengesahanMuk_Mengidentifikasi_2;
use App\Models\PengesahanMuk_OrangRelevanLainnyaTtd;

class PengesahanMukController extends Controller
{
    public function daftar_pengesahan_muk(){
        return view('peninjau.pengesahan_muk.daftar_pengesahan_muk');
    }


    // TABLE REVIEW SOAL UNTUK PENINJAU/ASESOR
    public function data_daftar_pengesahan_muk(Request $request){
        $data = JadwalUjiKompetensi::select([
            'jadwal_uji_kompetensi.*'
        ]);

        if($request->input('length')!=-1) 
        $data = $data->skip($request->input('start'))->take($request->input('length'));

        $asesor = AsesorUjiKompetensi::where('user_asesor_id', Auth::user()->id)->first() ?? new AsesorUjiKompetensi();
        $peninjau = PeninjauUjiKompetensi::where('user_peninjau_id', Auth::user()->id)->first() ?? new PeninjauUjiKompetensi();
        
        if(Auth::user()->id === $asesor->user_asesor_id){
        $data = $data->with('relasi_muk', 'relasi_pelaksanaan_ujian', 'relasi_user_asesor.relasi_user_asesor_detail')
                // ->whereRelation('relasi_user_asesor.relasi_user_asesor_detail', 'user_asesor_id', '!=', null)
                // ->whereRelation('relasi_pelaksanaan_ujian', 'jenis_tes', '!=', null)
                ->whereRelation('relasi_user_asesor.relasi_user_asesor_detail', 'user_asesor_id', Auth::user()->id)
                ->whereRelation('relasi_muk', 'jurusan_id', Auth::user()->jurusan_id)->get();
        }
        elseif(Auth::user()->id === $peninjau->user_peninjau_id){
            $data = $data->with('relasi_muk', 'relasi_pelaksanaan_ujian', 'relasi_user_peninjau.relasi_user_peninjau_detail')
            // ->whereRelation('relasi_user_asesor.relasi_user_asesor_detail', 'user_asesor_id', '!=', null)
            // ->whereRelation('relasi_pelaksanaan_ujian', 'jenis_tes', '!=', null)
            ->whereRelation('relasi_user_peninjau.relasi_user_peninjau_detail', 'user_peninjau_id', Auth::user()->id)
            ->whereRelation('relasi_muk', 'jurusan_id', Auth::user()->jurusan_id)->get();
        }

        $rekamTotal = $data->count();
        $rekamFilter = $data->count();
            
        return response()->json([
            'draw'=>$request->input('draw'),
            'data'=>$data,
            'recordsTotal'=>$rekamTotal,
            'recordsFiltered'=>$rekamFilter,
        ]);

        // $data = MateriUjiKompetensi::select([
        //     'muk.*'
        // ]);

        // if($request->input('length')!=-1) 
        // $data = $data->skip($request->input('start'))->take($request->input('length'));
        // $data = $data->where('jurusan_id', Auth::user()->jurusan_id)->get();
        // $rekamTotal = $data->count();
        // $rekamFilter = $data->count();
            
        //     return response()->json([
        //         'draw'=>$request->input('draw'),
        //         'data'=>$data,
        //         'recordsTotal'=>$rekamTotal,
        //         'recordsFiltered'=>$rekamFilter,
        // ]);
    }

    // DETAIL PENGESAHAN MUK
    public function pengesahan_muk($jadwal_id){
        $data_jadwal_id = JadwalUjiKompetensi::with('relasi_user_asesor.relasi_user_asesor_detail', 'relasi_user_peninjau.relasi_user_peninjau_detail')
            ->where('id', $jadwal_id)->first() ?? new MateriUjiKompetensi();

        $ttd1 = PengesahanMuk_OrangRelevanTtd::where('jadwal_uji_kompetensi_id', $data_jadwal_id->id)->where('orang_relevan_id', 1)->first() ?? new PengesahanMuk_OrangRelevanTtd();
        $ttd2 = PengesahanMuk_OrangRelevanTtd::where('jadwal_uji_kompetensi_id', $data_jadwal_id->id)->where('orang_relevan_id', 2)->first() ?? new PengesahanMuk_OrangRelevanTtd();
        $ttd3 = PengesahanMuk_OrangRelevanTtd::where('jadwal_uji_kompetensi_id', $data_jadwal_id->id)->where('orang_relevan_id', 3)->first() ?? new PengesahanMuk_OrangRelevanTtd();
        $ttd4 = PengesahanMuk_OrangRelevanTtd::where('jadwal_uji_kompetensi_id', $data_jadwal_id->id)->where('orang_relevan_id', 4)->first() ?? new PengesahanMuk_OrangRelevanTtd();
    
        $mengidentifikasi   = PengesahanMuk_Mengidentifikasi::get();
        $skema_sertifikasi  = SkemaSertifikasi::where('jurusan_id', Auth::user()->jurusan_id)->first() ?? new SkemaSertifikasi();
        $unit_kompetensi    = UnitKompetensi::whereIn('skema_sertifikasi_id', $skema_sertifikasi)->get();
        
        $penekatan_asesmen  = PengesahanMuk_PendekatanAsesmen::where('jadwal_uji_kompetensi_id', $data_jadwal_id->id)->first() ?? new PengesahanMuk_PendekatanAsesmen();

        $orang_relevan      = PengesahanMuk_OrangRelevan::get();
        $asesor             = User::where('role_id', 3)->get();
        $peninjau           = User::where('role_id', 2)->get();
        $penyusun           = PengesahanMuk_Penyusun::where('jadwal_uji_kompetensi_id', $data_jadwal_id->id)->first() ?? new PengesahanMuk_Penyusun();
        $validator          = PengesahanMuk_Validator::where('jadwal_uji_kompetensi_id', $data_jadwal_id->id)->first() ?? new PengesahanMuk_Validator();

        return view('peninjau.pengesahan_muk.berkas_pengesahan_muk', [
            'penekatan_asesmen' => $penekatan_asesmen,
            'unit_kompetensi'   => $unit_kompetensi,
            'skema_sertifikasi' => $skema_sertifikasi,
            'mengidentifikasi'  => $mengidentifikasi,
            'orang_relevan'     => $orang_relevan,
            'asesor'            => $asesor,
            'peninjau'          => $peninjau,
            'penyusun'          => $penyusun,
            'validator'         => $validator,
            'jadwal_id'         => $data_jadwal_id,
            'ttd1'              => $ttd1,
            'ttd2'              => $ttd2,
            'ttd3'              => $ttd3,
            'ttd4'              => $ttd4,
        ]);
    }

    // CETAK PENGESAHAN MUK
    public function cetak_pengesahan_muk_pdf($jadwal_id){
        $data_jadwal_id = JadwalUjiKompetensi::with('relasi_user_asesor.relasi_user_asesor_detail', 'relasi_user_peninjau.relasi_user_peninjau_detail')
            ->where('id', $jadwal_id)->first() ?? new MateriUjiKompetensi();

        $ttd1 = PengesahanMuk_OrangRelevanTtd::where('jadwal_uji_kompetensi_id', $data_jadwal_id->id)->where('orang_relevan_id', 1)->first() ?? new PengesahanMuk_OrangRelevanTtd();
        $ttd2 = PengesahanMuk_OrangRelevanTtd::where('jadwal_uji_kompetensi_id', $data_jadwal_id->id)->where('orang_relevan_id', 2)->first() ?? new PengesahanMuk_OrangRelevanTtd();
        $ttd3 = PengesahanMuk_OrangRelevanTtd::where('jadwal_uji_kompetensi_id', $data_jadwal_id->id)->where('orang_relevan_id', 3)->first() ?? new PengesahanMuk_OrangRelevanTtd();
        $ttd4 = PengesahanMuk_OrangRelevanTtd::where('jadwal_uji_kompetensi_id', $data_jadwal_id->id)->where('orang_relevan_id', 4)->first() ?? new PengesahanMuk_OrangRelevanTtd();
    
        $mengidentifikasi   = PengesahanMuk_Mengidentifikasi::get();
        $skema_sertifikasi  = SkemaSertifikasi::where('jurusan_id', Auth::user()->jurusan_id)->first() ?? new SkemaSertifikasi();
        $unit_kompetensi    = UnitKompetensi::whereIn('skema_sertifikasi_id', $skema_sertifikasi)->get();
        
        $penekatan_asesmen  = PengesahanMuk_PendekatanAsesmen::where('jadwal_uji_kompetensi_id', $data_jadwal_id->id)->first() ?? new PengesahanMuk_PendekatanAsesmen();

        $orang_relevan      = PengesahanMuk_OrangRelevan::get();
        $penyusun           = PengesahanMuk_Penyusun::where('jadwal_uji_kompetensi_id', $data_jadwal_id->id)->first() ?? new PengesahanMuk_Penyusun();
        $validator          = PengesahanMuk_Validator::where('jadwal_uji_kompetensi_id', $data_jadwal_id->id)->first() ?? new PengesahanMuk_Validator();

        return view('peninjau.pengesahan_muk.pdf2_berkas_pengesahan_muk',[
            'penekatan_asesmen' => $penekatan_asesmen,
                'unit_kompetensi'   => $unit_kompetensi,
                'skema_sertifikasi' => $skema_sertifikasi,
                'mengidentifikasi'  => $mengidentifikasi,
                'orang_relevan'     => $orang_relevan,
                'penyusun'          => $penyusun,
                'validator'         => $validator, 
                'jadwal_id'         => $data_jadwal_id
        ]);
        // PDF::setOptions(['dpi' => 196, 'defaultFont' => 'sans-serif']);
        // $pdf = PDF::loadView('peninjau.pengesahan_muk.pdf', [ 
        //     'penekatan_asesmen' => $penekatan_asesmen,
        //     'unit_kompetensi'   => $unit_kompetensi,
        //     'skema_sertifikasi' => $skema_sertifikasi,
        //     'mengidentifikasi'  => $mengidentifikasi,
        //     'orang_relevan'     => $orang_relevan,
        //     'penyusun'          => $penyusun,
        //     'validator'         => $validator, 
        //     'jadwal_id'         => $data_jadwal_id
        //     ])
        // ->setPaper("A4", "portrait");
        // return $pdf->stream();
        
    }


    // public function cetak_daftar_tuk_terverifikasi_pdf($id)
    // {
    //     $daftar_tuk = DaftarTUKTerverifikasi::with(['relasi_daftar_tuk_terverifikasi_child.relasi_nama_tuk', 'relasi_daftar_tuk_terverifikasi_child.relasi_skema_sertifikasi'])->find($id);
    //     // dd($daftar_tuk);
    //     // return view('admin.berkas.daftar_tuk_terverifikasi.pdf', [
    //     //     'daftar_tuk_terverifikasi' => $daftar_tuk,
    //     // ]);
    //     $pdf = PDF::loadview('admin.berkas.daftar_tuk_terverifikasi.pdf', compact('daftar_tuk'));
    //     return $pdf->download('Daftar TUK Terverifikasi.pdf');
    // }

    // PROSES PENGESAHAN MUK
    public function muk_di_sahkan(Request $request){
        // PENDEKATAN ASESMEN
        $data_pendekatan_asesmen = PengesahanMuk_PendekatanAsesmen::where('jadwal_uji_kompetensi_id', $request->jadwal_uji_kompetensi_id)->first();
        if(!$data_pendekatan_asesmen){
            PengesahanMuk_PendekatanAsesmen::create([
                'muk_id'                    => $request->muk_id,
                'jadwal_uji_kompetensi_id'  => $request->jadwal_uji_kompetensi_id,
                'kandidat'                  => $request->kandidat,
                'tujuan'                    => $request->kandidat,
                'konteks_asesmen_lingkungan'=> $request->konteks_asesmen_lingkungan, 
                'konteks_asesmen_peluang'   => $request->konteks_asesmen_peluang, 
                'konteks_asesmen_hubungan'  => $request->konteks_asesmen_hubungan,
                'konteks_asesmen_siapa'     => $request->konteks_asesmen_hubungan,
                'konfirmasi'                => $request->konfirmasi,
                'tolok'                     => $request->tolok
            ]);
        }else{
            $data_pendekatan_asesmen->update([
                'kandidat'                  => $request->kandidat,
                'tujuan'                    => $request->tujuan,
                'konteks_asesmen_lingkungan'=> $request->konteks_asesmen_lingkungan, 
                'konteks_asesmen_peluang'   => $request->konteks_asesmen_peluang, 
                'konteks_asesmen_hubungan'  => $request->konteks_asesmen_hubungan,
                'konteks_asesmen_siapa'     => $request->konteks_asesmen_siapa,
                'konfirmasi'                => $request->konfirmasi,
                'tolok'                     => $request->tolok
            ]);
        }

        // RENCANA ASESMEN
        $isi        = $request->elemen_isi_2_id;
        $muk_id     = $request->muk_id;
        $jadwal_id  = $request->jadwal_uji_kompetensi_id;
        foreach($isi as $key => $data_isi){
            $data_elemen = PengesahanMuk_RencanaAsesmen::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('elemen_isi_2_id', $data_isi)->first();
            if(!$data_elemen){
                PengesahanMuk_RencanaAsesmen::create([
                    'jadwal_uji_kompetensi_id'  => $jadwal_id,
                    'muk_id'                    => $muk_id,
                    'elemen_isi_2_id'           => $isi[$key],
                    'jenis_bukti'               => $request['jenis_bukti-' . $data_isi],
                    'metode'                    => $request['metode-' . $data_isi]
                ]);
            }else{
                PengesahanMuk_RencanaAsesmen::where('muk_id', $muk_id)->where('elemen_isi_2_id', $data_isi)->update([
                    'elemen_isi_2_id' => $isi[$key],
                    'jenis_bukti'     => $request['jenis_bukti-' . $data_isi],
                    'metode'          => $request['metode-' . $data_isi],
                ]);
            }
        }

        $identifikasi_id = $request->mengidentifikasi_id;   
        foreach($identifikasi_id as $key => $data_identifikasi_id){
            $data_elemen = PengesahanMuk_Mengidentifikasi_2::where('keterangan_id', $data_identifikasi_id)
                ->where('jadwal_uji_kompetensi_id', $jadwal_id)->first();
            if(!$data_elemen){
                PengesahanMuk_Mengidentifikasi_2::create([
                    'jadwal_uji_kompetensi_id' => $jadwal_id,
                    'muk_id'                   => $muk_id,
                    'keterangan_id'            => $identifikasi_id[$key],
                    'status'                   => $request['status-' . $data_identifikasi_id],
                    'tuliskan_keterangan'      => $request['tuliskan-' . $data_identifikasi_id]
                ]);
            }else{
                PengesahanMuk_Mengidentifikasi_2::where('keterangan_id', $data_identifikasi_id)
                    ->where('jadwal_uji_kompetensi_id', $jadwal_id)->update([
                    'status' => $request['status-' . $data_identifikasi_id],
                    'tuliskan_keterangan' => $request['tuliskan-' . $data_identifikasi_id],
                ]);
            }
        }

        $orang_relevan_id = $request->orang_relevan;   
        foreach($orang_relevan_id as $key => $data_orang_relevan_id){
            
            $data_elemen = PengesahanMuk_OrangRelevanTtd::where('orang_relevan_id', $data_orang_relevan_id)
                ->where('jadwal_uji_kompetensi_id', $jadwal_id)
                ->first();
            if(!$data_elemen){
                PengesahanMuk_OrangRelevanTtd::create([
                    'jadwal_uji_kompetensi_id' => $jadwal_id,
                    'muk_id'                   => $muk_id,
                    'orang_relevan_id'         => $orang_relevan_id[$key],
                    'ttd'                      => $request['ttd-' . $data_orang_relevan_id],
                ]);
            }else{
                PengesahanMuk_OrangRelevanTtd::where('orang_relevan_id', $data_orang_relevan_id)
                    ->where('jadwal_uji_kompetensi_id', $jadwal_id)->update([
                    'ttd' => $request['ttd-' . $data_orang_relevan_id],
                ]);
            }
        }
        
        $orang_relevan_lainnya = PengesahanMuk_OrangRelevanLainnyaTtd::where('orang_relevan_id', 4)
            ->where('jadwal_uji_kompetensi_id', $jadwal_id)
            ->first();
        if(!$orang_relevan_lainnya){
            PengesahanMuk_OrangRelevanLainnyaTtd::create([
                'jadwal_uji_kompetensi_id'  => $jadwal_id,
                'muk_id'                    => $muk_id,
                'orang_relevan_id'          => 4,
                'orang_relevan_lainnya'     => $request->orang_relevan_lainnya
            ]);
        }else{
            PengesahanMuk_OrangRelevanLainnyaTtd::where('orang_relevan_id', 4)
            ->where('jadwal_uji_kompetensi_id', $jadwal_id)->update([
                'orang_relevan_lainnya' => $request->orang_relevan_lainnya
            ]);

        }
        

        $data_penyusun = PengesahanMuk_Penyusun::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('muk_id', $muk_id)->first();
        if(!$data_penyusun){
            PengesahanMuk_Penyusun::create([
                'jadwal_uji_kompetensi_id' => $jadwal_id,
                'muk_id'                   => $muk_id,
                'user_asesor_id'           => $request->asesor_id,
                'jabatan'                  => "Penyusun",
                'ttd_asesor'               => $request->ttd_asesor
            ]);
        }else{
            PengesahanMuk_Penyusun::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('muk_id', $muk_id)->update([
                'user_asesor_id'       => $request->asesor_id,
                'ttd_asesor'           => $request->ttd_asesor
            ]);
        }

        $data_validator = PengesahanMuk_Validator::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('muk_id', $muk_id)->first();
        if(!$data_validator){
            PengesahanMuk_Validator::create([
                'jadwal_uji_kompetensi_id' => $jadwal_id,
                'muk_id'                   => $muk_id,
                'user_peninjau_id'         => $request->peninjau_id,
                'jabatan'                  => "Validator",
                'ttd_peninjau'             => $request->ttd_peninjau
            ]);
        }else{
            PengesahanMuk_Validator::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('muk_id', $muk_id)->update([
                'user_peninjau_id'       => $request->peninjau_id,
                'ttd_peninjau'           => $request->ttd_peninjau
            ]);
        }

        PelaksanaanUjian::where('jadwal_uji_kompetensi_id', $jadwal_id)->update([
            'acc' => 1
        ]);

        return response()->json([
            'status'=>1,
            'msg'   =>'Pengesahan Materi Uji Kompetensi Berhasil',
            // 'route' => route('asesor.KelolaSoal.ReviewSoal', ['jadwal_id'=>$jadwal_uji_kompetensi_id, 'jenis_tes'=>$jenis_tes])
        ]);
    }
}
