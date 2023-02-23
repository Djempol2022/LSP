<?php

namespace App\Http\Controllers\Peninjau;

use Illuminate\Http\Request;
use App\Models\UnitKompetensi;
use App\Models\SkemaSertifikasi;
use App\Http\Controllers\Controller;
use App\Models\PendekatanAsesmen;
use App\Models\PendekatanAsesmen1;
use App\Models\PendekatanAsesmen2;
use App\Models\PengesahanMuk_RencanaAsesmen;
use Illuminate\Support\Facades\Auth;

class PengesahanMukController extends Controller
{
    public function pengesahan_muk(){
        $skema_sertifikasi = SkemaSertifikasi::where('jurusan_id', Auth::user()->jurusan_id)->first();
        $unit_kompetensi = UnitKompetensi::whereIn('skema_sertifikasi_id', $skema_sertifikasi)->get();
        $penekatan_asesmen = PendekatanAsesmen::whereIn('skema_sertifikasi_id', $skema_sertifikasi)->first() ?? new PendekatanAsesmen();

        return view('peninjau.pengesahan_muk.berkas_pengesahan_muk', [
            'penekatan_asesmen' => $penekatan_asesmen,
            'unit_kompetensi'   => $unit_kompetensi,
            'skema_sertifikasi' => $skema_sertifikasi
        ]);
    }

    public function muk_di_sahkan(Request $request){
        $data_pendekatan_asesmen = PendekatanAsesmen::where('skema_sertifikasi_id')->first();

        if(!$data_pendekatan_asesmen){
            PendekatanAsesmen::create([
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

        // $isi = $request->elemen_isi_2_id;
        // foreach($isi as $key => $data_isi){
        //     $data_elemen = PengesahanMuk_RencanaAsesmen::where('elemen_isi_2_id', $data_isi)->first();
        //     if(!$data_elemen){
        //         PengesahanMuk_RencanaAsesmen::create([
        //             'elemen_isi_2_id' => $isi[$key],
        //             'jenis_bukti' => $request['jenis_bukti-' . $data_isi],
        //             'metode' => $request['metode-' . $data_isi]
        //         ]);
        //     }else{
        //         PengesahanMuk_RencanaAsesmen::where('elemen_isi_2_id', $data_isi)->update([
        //             'elemen_isi_2_id' => $isi[$key],
        //             'jenis_bukti' => $request['jenis_bukti-' . $data_isi],
        //             'metode' => $request['metode-' . $data_isi],
        //         ]);
        //     }
        // }
    }
}
