<?php

namespace App\Http\Controllers\Asesor;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AsesmenMandiri;
use App\Models\UnitKompetensi;
use App\Models\SkemaSertifikasi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AsesorPengesahan extends Controller
{
    public function halaman_pengesahan_asesmen_mandiri(){
        return view('asesor.asesmen_mandiri.daftar_asesmen_mandiri');
    }

    // UBAH STATUS REKOMENDASI ASESMEN
    public function batalkan_asesmen($id){
        AsesmenMandiri::where('id', $id)->update([
            'rekomendasi' => 0
        ]);
        return redirect()->back();
    }

    public function setujui_asesmen($id){
        AsesmenMandiri::where('id', $id)->update([
            'rekomendasi' => 1
        ]);
        return redirect()->back();
    }

    // DATA DAFTAR ASESMEN MANDIRI
    public function data_asesmen_mandiri(){
        
        $data = AsesmenMandiri::with('relasi_user_asesi', 'relasi_user_asesor')
            ->whereRelation('relasi_user_asesi', 'jurusan_id', Auth::user()->jurusan_id)
            ->get();
        
            return response()->json([
            'data' => $data
        ]);
    }

    // DETAIL PENGESAHAN ASESMEN MANDIRI
    public function detail_pengesahan_asesmen_mandiri($user_asesi_id){
        $sertifikasi = SkemaSertifikasi::with( 
            'relasi_jurusan',
            'relasi_unit_kompetensi', 'relasi_unit_kompetensi.relasi_unit_kompetensi_sub')
            ->where('jurusan_id', Auth::user()->jurusan_id)->first();

        $unit_kompetensi = UnitKompetensi::where('skema_sertifikasi_id', $sertifikasi->id)->get();
        $data_asesmen_mandiri = AsesmenMandiri::with('relasi_user_asesi', 'relasi_user_asesor')
            ->whereRelation('relasi_user_asesi', 'user_asesi_id', $user_asesi_id)
            ->first();
            
        return view('asesor.asesmen_mandiri.detail_asesmen_mandiri', [
            'unit_kompetensi' => $unit_kompetensi,
            'sertifikasi'     => $sertifikasi,
            'data_asesmen_mandiri'   => $data_asesmen_mandiri,
            'user_asesi_id'   => $user_asesi_id
        ]);
    }

    // ACC ASESOR ASESMEN MANDIRI
    public function asesor_acc_asesmen_mandiri(Request $request, $id){
        AsesmenMandiri::where('id', $id)->update([
            'user_asesor_id' => Auth::user()->id,
            'tanggal_asesor' => Carbon::now(),
            'ttd_asesor'     => $request->ttd_asesor
        ]);
    return redirect()->back();
    }
}
