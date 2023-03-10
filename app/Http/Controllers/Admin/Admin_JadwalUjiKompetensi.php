<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\JadwalUjiKompetensi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Admin_JadwalUjiKompetensi extends Controller
{
    public function tampilan_jadwal_uji_kompetensi(){
        return view('admin.jadwal_uji_kompetensi.jadwal_uji_kompetensi');
    }

    public function data_jadwal_uji_kompetensi(Request $request, $id){
        $data = JadwalUjiKompetensi::select([
            'jadwal_uji_kompetensi.*'
        ]);

        if($request->input('length')!=-1) 
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $rekamTotal = $data->count();
            // $data = $data->with('relasi_muk')->where('jurusan_id', $id)->get();
            $data = $data->with('relasi_muk')->whereRelation('relasi_muk', 'jurusan_id', $id)->get();
            // return $data;
            return response()->json([
            'data'=>$data,
            'recordsTotal'=>$rekamTotal
        ]);
    }

    public function tambah_jadwal_uji_kompetensi(Request $request){
        $waktu_mulai = Carbon::parse($request->waktu_mulai);
        $waktu_selesai = Carbon::parse($request->waktu_selesai);
        
        $validator = Validator::make($request->all(), [
            'muk_id'=>'required',
            'sesi' => 'required',
            'tanggal' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'kelas' => 'required',
            'tempat' => 'required',
            'jenis_tes' => 'required'
        ],[
            'muk_id.required'=> 'Wajib diisi',
            'sesi.required'=> 'Wajib diisi',
            'tanggal.required'=> 'Wajib diisi',
            'waktu_mulai.required'=> 'Wajib diisi',
            'waktu_selesai.required'=> 'Wajib diisi',
            'kelas.required'=> 'Wajib diisi',
            'tempat.required'=> 'Wajib diisi',
            'jenis_tes.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $tambah_jadwal_uji_kompetensi = JadwalUjiKompetensi::create([
                'muk_id' => $request->muk_id,
                'sesi' => $request->sesi,
                'tanggal' => $request->tanggal,
                'waktu_mulai' => $request->waktu_mulai,
                'waktu_selesai' => $request->waktu_selesai,
                'kelas' => $request->kelas,
                'tempat' => $request->tempat,
                'jenis_tes' => $request->jenis_tes,
                'total_waktu' => $waktu_mulai->diffInMinutes($waktu_selesai)
            ]);
            
            if(!$tambah_jadwal_uji_kompetensi){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menambah Jadwal Uji Kompetensi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menambahkan Jadwal Uji Kompetensi'
                ]);
            }
        }
    }

    public function hapus_jadwal_uji_kompetensi($id){
        $hapus_jadwal_uji_kompetensi = JadwalUjiKompetensi::find($id)->delete();
        if(!$hapus_jadwal_uji_kompetensi){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal Menghapus Jadwal Uji Kompetensi'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menghapus Jadwal Uji Kompetensi'
            ]);
        }
    }
}
