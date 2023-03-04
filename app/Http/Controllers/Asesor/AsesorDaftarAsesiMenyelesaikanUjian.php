<?php

namespace App\Http\Controllers\Asesor;

use App\Models\Soal;
use Illuminate\Http\Request;
use App\Models\KoreksiJawaban;
use App\Models\UnitKompetensi;
use App\Models\PelaksanaanUjian;
use App\Models\AsesiUjiKompetensi;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AsesorDaftarAsesiMenyelesaikanUjian extends Controller
{
    public function halaman_daftar_ujian_asesi(){
        return view('asesor.daftar_data_ujian.daftar_data_ujian');
    }

    public function data_asesi_telah_selesai_ujian(Request $request){
        // $data = AsesiUjiKompetensi::select([
        //     'asesi_uji_kompetensi.*'
        // ]);

        $data = KoreksiJawaban::select([
            'koreksi_jawaban.*'
        ]);

        // $data = $data->with('relasi_jadwal_uji_kompetensi.relasi_user_asesor', 'relasi_jadwal_uji_kompetensi.relasi_muk', 
        //         'relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian', 'relasi_jadwal_uji_kompetensi.relasi_user_asesi.relasi_user_asesi')
        //         ->whereRelation('relasi_jadwal_uji_kompetensi.relasi_user_asesor', 'user_asesor_id', Auth::user()->id)
        //         ->get();
        
        // $data = $data->with(
        //         'relasi_jadwal_uji_kompetensi.relasi_user_asesor', 
        //         'relasi_jadwal_uji_kompetensi.relasi_muk', 
        //         'relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian',
        //         'relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.relasi_tuk', 
        //         'relasi_user_asesi')
        //         ->where([['status_ujian_berlangsung', '=', 3, 'OR'],  ['status_ujian_berlangsung', '=', 2, 'OR']])
        //         ->whereRelation('relasi_jadwal_uji_kompetensi.relasi_user_asesor','user_asesor_id', Auth::user()->id)
        //         ->get();
        $data = $data->with(
            'relasi_jadwal_uji_kompetensi.relasi_user_asesor', 
            'relasi_jadwal_uji_kompetensi.relasi_muk', 
            'relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian',
            'relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.relasi_tuk',
            'relasi_user_asesi',
            // 'relasi_status_koreksi',
            // 'relasi_jadwal_uji_kompetensi.relasi_status_koreksi'
            )
            // ->where('status_ujian_berlangsung', 2)
            ->whereRelation('relasi_jadwal_uji_kompetensi.relasi_user_asesor','user_asesor_id', Auth::user()->id)
            ->get();

            $rekamTotal = $data->count();
            $rekamFilter = $data->count();
        return response()->json([
            'draw'=>$request->input('draw'),
            'data'=>$data,
            'recordsTotal'=>$rekamTotal,
            'recordsFiltered'=>$rekamFilter
        ]);
    }

    public function halaman_koreksi_jawaban($jadwal_id, $asesi_id){
        $soal = Soal::where('jadwal_uji_kompetensi_id', $jadwal_id)->with('relasi_jawaban_asesi')->get();
        $jenis_tes = PelaksanaanUjian::with('relasi_jadwal_uji_kompetensi.relasi_muk')->where('jadwal_uji_kompetensi_id', $jadwal_id)->first();
        $data_hasil_koreksi = KoreksiJawaban::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('user_asesi_id', $asesi_id)->first();
        $asesi = User::where('id', $asesi_id)->first();
        return view('asesor.daftar_data_ujian.koreksi_jawaban', compact(
            'soal', 'jadwal_id', 'jenis_tes', 
            'asesi_id', 'data_hasil_koreksi',
            'asesi'
        ));
    }

    public function hasil_koreksi_jawaban(Request $request, $jadwal_id, $asesi_id){
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'status_kompeten' => 'required',
            'ttd_asesor' => 'required',
        ],[
            'tanggal.required'=> 'Wajib diisi',
            'status_kompeten.required'=> 'Wajib diisi',
            'ttd_asesor.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $data_hasil_koreksi = KoreksiJawaban::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('user_asesi_id', $asesi_id)->first();
            if($data_hasil_koreksi == null){
                $hasil_koreksian = KoreksiJawaban::create([
                    'jadwal_uji_kompetensi_id' => $jadwal_id,
                    'user_asesi_id' => $asesi_id,
                    'tanggal' => $request->tanggal,
                    'status_kompeten' => $request->status_kompeten,
                    'ttd_asesor' => $request->ttd_asesor,
                ]);    
            }else{
                $hasil_koreksian = KoreksiJawaban::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('user_asesi_id', $asesi_id)->update([
                    'tanggal' => $request->tanggal,
                    'status_kompeten' => $request->status_kompeten,
                    'ttd_asesor' => $request->ttd_asesor,
                ]);    
            }
            
            if(!$hasil_koreksian){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menambah Jadwal Uji Kompetensi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Proses Koreksi Soal Berhasil'
                ]);
            }
        }
    }
}
