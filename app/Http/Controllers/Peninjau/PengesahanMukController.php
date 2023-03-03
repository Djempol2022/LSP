<?php

namespace App\Http\Controllers\Peninjau;

use Illuminate\Http\Request;
use App\Models\UnitKompetensi;
use App\Models\SkemaSertifikasi;
use App\Http\Controllers\Controller;
use App\Models\PengesahanMuk_Mengidentifikasi;
use App\Models\PengesahanMuk_Mengidentifikasi_2;
use App\Models\PengesahanMuk_OrangRelevan;
use App\Models\PengesahanMuk_OrangRelevanTtd;
use App\Models\PengesahanMuk_PendekatanAsesmen;
use App\Models\PengesahanMuk_Penyusun;
use App\Models\PengesahanMuk_RencanaAsesmen;
use App\Models\PengesahanMuk_Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PDF;

class PengesahanMukController extends Controller
{
    public function pengesahan_muk(){
        $mengidentifikasi   = PengesahanMuk_Mengidentifikasi::get();
        $skema_sertifikasi  = SkemaSertifikasi::where('jurusan_id', Auth::user()->jurusan_id)->first();
        $unit_kompetensi    = UnitKompetensi::whereIn('skema_sertifikasi_id', $skema_sertifikasi)->get();
        $penekatan_asesmen  = PengesahanMuk_PendekatanAsesmen::whereIn('skema_sertifikasi_id', $skema_sertifikasi)->first() ?? new PengesahanMuk_PendekatanAsesmen();
        $orang_relevan      = PengesahanMuk_OrangRelevan::get();
        $asesor             = User::where('role_id', 3)->get();
        $peninjau           = User::where('role_id', 2)->get();
        $penyusun           = PengesahanMuk_Penyusun::whereIn('skema_sertifikasi_id', $skema_sertifikasi)->first() ?? new PengesahanMuk_Penyusun();
        $validator          = PengesahanMuk_Validator::whereIn('skema_sertifikasi_id', $skema_sertifikasi)->first() ?? new PengesahanMuk_Validator();

        return view('peninjau.pengesahan_muk.berkas_pengesahan_muk', [
            'penekatan_asesmen' => $penekatan_asesmen,
            'unit_kompetensi'   => $unit_kompetensi,
            'skema_sertifikasi' => $skema_sertifikasi,
            'mengidentifikasi'  => $mengidentifikasi,
            'orang_relevan'     => $orang_relevan,
            'asesor'            => $asesor,
            'peninjau'          => $peninjau,
            'penyusun'          => $penyusun,
            'validator'         => $validator
        ]);
    }

    public function cetak_pengesahan_muk_pdf(){
        $mengidentifikasi   = PengesahanMuk_Mengidentifikasi::get();
        $skema_sertifikasi  = SkemaSertifikasi::where('jurusan_id', Auth::user()->jurusan_id)->first();
        $unit_kompetensi    = UnitKompetensi::whereIn('skema_sertifikasi_id', $skema_sertifikasi)->get();
        $penekatan_asesmen  = PengesahanMuk_PendekatanAsesmen::whereIn('skema_sertifikasi_id', $skema_sertifikasi)->first() ?? new PengesahanMuk_PendekatanAsesmen();
        $orang_relevan      = PengesahanMuk_OrangRelevan::get();
        $asesor             = User::where('role_id', 3)->get();
        $peninjau           = User::where('role_id', 2)->get();
        $penyusun           = PengesahanMuk_Penyusun::whereIn('skema_sertifikasi_id', $skema_sertifikasi)->first() ?? new PengesahanMuk_Penyusun();
        $validator          = PengesahanMuk_Validator::whereIn('skema_sertifikasi_id', $skema_sertifikasi)->first() ?? new PengesahanMuk_Validator();

        PDF::setOptions(['dpi' => 196, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('peninjau.pengesahan_muk.pdf', compact('penekatan_asesmen', 'unit_kompetensi', 'skema_sertifikasi', 'mengidentifikasi', 'orang_relevan',
        'asesor', 'peninjau', 'penyusun', 'validator'))->setPaper("A4", "portrait");
        return $pdf->stream();
        
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

    public function muk_di_sahkan(Request $request){
        $data_pendekatan_asesmen = PengesahanMuk_PendekatanAsesmen::where('skema_sertifikasi_id')->first();
        if(!$data_pendekatan_asesmen){
            PengesahanMuk_PendekatanAsesmen::create([
                'skema_sertifikasi_id' => $request->skema_sertifikasi_id,
                'kandidat' => $request->kandidat,
                'tujuan' => $request->kandidat,
                'konteks_asesmen_lingkungan' => $request->konteks_asesmen_lingkungan, 
                'konteks_asesmen_peluang' => $request->konteks_asesmen_peluang, 
                'konteks_asesmen_hubungan' => $request->konteks_asesmen_hubungan,
                'konteks_asesmen_siapa' => $request->konteks_asesmen_hubungan,
                'konfirmasi' => $request->konfirmasi,
                'tolok' => $request->tolok
            ]);
        }else{
            $data_pendekatan_asesmen->update([
                'kandidat' => $request->kandidat,
                'tujuan' => $request->kandidat,
                'konteks_asesmen_lingkungan' => $request->konteks_asesmen_lingkungan, 
                'konteks_asesmen_peluang' => $request->konteks_asesmen_peluang, 
                'konteks_asesmen_hubungan' => $request->konteks_asesmen_hubungan,
                'konteks_asesmen_siapa' => $request->konteks_asesmen_hubungan,
                'konfirmasi' => $request->konfirmasi,
                'tolok' => $request->tolok
            ]);
        }

        $isi = $request->elemen_isi_2_id;
        foreach($isi as $key => $data_isi){
            $data_elemen = PengesahanMuk_RencanaAsesmen::where('elemen_isi_2_id', $data_isi)->first();
            if(!$data_elemen){
                PengesahanMuk_RencanaAsesmen::create([
                    'elemen_isi_2_id' => $isi[$key],
                    'jenis_bukti' => $request['jenis_bukti-' . $data_isi],
                    'metode' => $request['metode-' . $data_isi]
                ]);
            }else{
                PengesahanMuk_RencanaAsesmen::where('elemen_isi_2_id', $data_isi)->update([
                    'elemen_isi_2_id' => $isi[$key],
                    'jenis_bukti' => $request['jenis_bukti-' . $data_isi],
                    'metode' => $request['metode-' . $data_isi],
                ]);
            }
        }

        $identifikasi_id = $request->mengidentifikasi_id;   
        foreach($identifikasi_id as $key => $data_identifikasi_id){
            $data_elemen = PengesahanMuk_Mengidentifikasi_2::where('keterangan_id', $data_identifikasi_id)
                ->where('skema_sertifikasi_id', $request->skema_sertifikasi_id)->first();
            if(!$data_elemen){
                PengesahanMuk_Mengidentifikasi_2::create([
                    'skema_sertifikasi_id' => $request->skema_sertifikasi_id,
                    'keterangan_id' => $identifikasi_id[$key],
                    'status' => $request['status-' . $data_identifikasi_id],
                    'tuliskan_keterangan' => $request['tuliskan-' . $data_identifikasi_id]
                ]);
            }else{
                PengesahanMuk_Mengidentifikasi_2::where('keterangan_id', $data_identifikasi_id)
                    ->where('skema_sertifikasi_id', $request->skema_sertifikasi_id)->update([
                    'status' => $request['status-' . $data_identifikasi_id],
                    'tuliskan_keterangan' => $request['tuliskan-' . $data_identifikasi_id],
                ]);
            }
        }

        $orang_relevan_id = $request->orang_relevan;   
        foreach($orang_relevan_id as $key => $data_orang_relevan_id){
            $data_elemen = PengesahanMuk_OrangRelevanTtd::where('orang_relevan_id', $data_orang_relevan_id)
                ->where('skema_sertifikasi_id', $request->skema_sertifikasi_id)->first();
            if(!$data_elemen){
                PengesahanMuk_OrangRelevanTtd::create([
                    'skema_sertifikasi_id' => $request->skema_sertifikasi_id,
                    'orang_relevan_id' => $orang_relevan_id[$key],
                    'ttd' => $request['ttd-' . $data_orang_relevan_id],
                ]);
            }else{
                PengesahanMuk_OrangRelevanTtd::where('orang_relevan_id', $data_orang_relevan_id)
                    ->where('skema_sertifikasi_id', $request->skema_sertifikasi_id)->update([
                    'ttd' => $request['ttd-' . $data_orang_relevan_id],
                ]);
            }
        }

        $data_penyusun = PengesahanMuk_Penyusun::where('skema_sertifikasi_id', $request->skema_sertifikasi_id)->first();
        if(!$data_penyusun){
            PengesahanMuk_Penyusun::create([
                'skema_sertifikasi_id' => $request->skema_sertifikasi_id,
                'user_asesor_id'       => $request->asesor_id,
                'jabatan'              => "Penyusun",
                'ttd_asesor'           => $request->ttd_asesor
            ]);
        }else{
            PengesahanMuk_Penyusun::where('skema_sertifikasi_id', $request->skema_sertifikasi_id)->update([
                'user_asesor_id'       => $request->asesor_id,
                'ttd_asesor'           => $request->ttd_asesor
            ]);
        }

        $data_validator = PengesahanMuk_Validator::where('skema_sertifikasi_id', $request->skema_sertifikasi_id)->first();
        if(!$data_validator){
            PengesahanMuk_Validator::create([
                'skema_sertifikasi_id' => $request->skema_sertifikasi_id,
                'user_peninjau_id'       => $request->peninjau_id,
                'jabatan'              => "Validator",
                'ttd_peninjau'           => $request->ttd_peninjau
            ]);
        }else{
            PengesahanMuk_Validator::where('skema_sertifikasi_id', $request->skema_sertifikasi_id)->update([
                'user_peninjau_id'       => $request->peninjau_id,
                'ttd_peninjau'           => $request->ttd_peninjau
            ]);
        }
    }
}
