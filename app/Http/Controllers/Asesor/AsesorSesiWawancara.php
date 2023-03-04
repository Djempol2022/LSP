<?php

namespace App\Http\Controllers\Asesor;

use App\Models\Soal;
use App\Models\User;
use App\Models\JawabanAsesi;
use Illuminate\Http\Request;
use App\Models\KoreksiJawaban;
use App\Models\PelaksanaanUjian;
use App\Models\AsesiUjiKompetensi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AsesorSesiWawancara extends Controller
{
    public function data_asesi_ujian_wawancara(Request $request){
        $data = AsesiUjiKompetensi::select([
            'asesi_uji_kompetensi.*'
        ]);

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->with('relasi_jadwal_uji_kompetensi.relasi_user_login_asesor',
        'relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail',
        'relasi_user_asesi',
        'relasi_jadwal_uji_kompetensi.relasi_muk',
        'relasi_jadwal_uji_kompetensi.relasi_soal',
        'relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian',
        'relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.relasi_tuk')
        ->where('status_ujian_berlangsung', 3)
        ->whereRelation('relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian', 'jenis_tes', 3)
        ->whereRelation('relasi_jadwal_uji_kompetensi.relasi_user_login_asesor', 'user_asesor_id', Auth::user()->id)
        ->get();

        $rekamFilter = $data->count();
        return response()->json([
            'draw'=>$request->input('draw'),
            'data' => $data,
            'recordsTotal' => $rekamFilter,
            'recordsFiltered'=>$rekamFilter
        ]);
    }

    // PROSES WAWANCARA ASESI OLEH ASESOR
    public function proses_wawancara_asesi($id_jadwal, $soal_id, $asesi_id)
    {
        AsesiUjiKompetensi::where('jadwal_uji_kompetensi_id', $id_jadwal)->where('user_asesi_id', $asesi_id)->update([
            'status_ujian_berlangsung' => 1
        ]);
        $pelaksanaan_ujian = PelaksanaanUjian::with('relasi_jadwal_uji_kompetensi.relasi_muk')->where('jadwal_uji_kompetensi_id', $id_jadwal)->first();
        $soal = Soal::where('jadwal_uji_kompetensi_id', $id_jadwal)->where('id', $soal_id)->first();
        $sebelumnya = Soal::where('jadwal_uji_kompetensi_id', $id_jadwal)->where('id', '<', $soal->id)->orderBy('id','desc')->first();
        $selanjutnya = Soal::where('jadwal_uji_kompetensi_id', $id_jadwal)->where('id', '>', $soal->id)->orderBy('id','asc')->first();
        $jawaban_asesi = JawabanAsesi::where('user_asesi_id', $asesi_id)->get();
        $semua_soal = Soal::with('relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian')
                            ->whereRelation('relasi_jadwal_uji_kompetensi', 'jadwal_uji_kompetensi_id', $id_jadwal)
                            ->get();
        // $status_asesi_ujian = AsesiUjiKompetensi::where('user_asesi_id', Auth::user()->id)->where('status_ujian_berlangsung', 2)->first();
        // if(!$status_asesi_ujian){
        return view('asesor.daftar_data_ujian.soal_wawancara', compact(
            'soal', 
            'pelaksanaan_ujian', 
            'selanjutnya',
            'sebelumnya', 
            'soal_id',
            'asesi_id',
            'jawaban_asesi',
            'semua_soal'));
    }

    // SIMPAN JAWABAN WAWANCARA ASESI
    public function simpan_jawaban_asesi_wawancara(Request $request){
        $user_asesi_id  = $request->asesi_id;
        $jawaban_asesi  = $request->jawaban;
        $soal_id        = $request->soal_id;
        $jadwal_id      = $request->jadwal_id;

        $data_jawaban_asesi = JawabanAsesi::where('user_asesi_id', $user_asesi_id)->where('soal_id', $soal_id)->first();
        if($data_jawaban_asesi == null){
            JawabanAsesi::create([
                'user_asesi_id'     => $user_asesi_id,
                'soal_id'           => $soal_id,
                'jawaban'           => $jawaban_asesi,
                'koreksi_jawaban'   => 0
            ]);
        }else{
            JawabanAsesi::where('user_asesi_id', $user_asesi_id)->where('soal_id', $soal_id)->update([
                'jawaban'       => $jawaban_asesi,
                'koreksi_jawaban'   => 0
            ]);
        }
        $selanjutnya = Soal::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('id', '>', $soal_id)->orderBy('id','asc')->first();
        return \Redirect::route('asesor.DaftarDataUjian.ProsesWawancaraAsesi', ['jadwal_id'=>$jadwal_id, 'soal_id'=>$selanjutnya ?? $soal_id, 'asesi_id'=>$user_asesi_id] )->with('message', 'State saved correctly!!!');
    }

    public function selesai_wawancara_ujian($jadwal_id, $asesi_id){
        User::where('id',$asesi_id)->update([
            'status_terlibat_uji_kompetensi' => 0
        ]);

        AsesiUjiKompetensi::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('user_asesi_id', $asesi_id)->update([
            'status_ujian_berlangsung' => 2
        ]);

        KoreksiJawaban::create([
            'jadwal_uji_kompetensi_id' => $jadwal_id,
            'user_asesi_id'            => $asesi_id,
            'status_koreksi'           => 0
        ]);
    
        return response()->json([
            'status'=>1,
            'msg'=>"Terima Kasih Telah Menyelesaikan Tes Kompetensi"
        ]);
    }

    public function waktu_wawancara_habis($jadwal_id, $asesi_id){
        User::where('id',$asesi_id)->update([
            'status_terlibat_uji_kompetensi' => 0
        ]);

        AsesiUjiKompetensi::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('user_asesi_id', $asesi_id)->update([
            'status_ujian_berlangsung' => 2
        ]);

        KoreksiJawaban::create([
            'jadwal_uji_kompetensi_id' => $jadwal_id,
            'user_asesi_id'            => $asesi_id,
            'status_koreksi'           => 0
        ]);
    
        return \Redirect::route('asesor.DaftarDataUjian');
    }

}
