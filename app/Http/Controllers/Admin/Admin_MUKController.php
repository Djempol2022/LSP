<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Models\MateriUjiKompetensi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Admin_MUKController extends Controller
{
    public function daftar_data_muk(){
        $jurusan = Jurusan::get();
        return view('admin.pengaturan.muk.data_muk', compact('jurusan'));
    }

    public function data_muk(Request $request){
        $data = MateriUjiKompetensi::select([
            'muk.*'
        ]);

        if($request->input('length')!=-1) 
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $rekamTotal = $data->count();
            $data = $data->with('relasiJurusan')->get();
        return response()->json([
            'data'=>$data,
            'recordsTotal'=>$rekamTotal
        ]);
    }

    public function tambah_muk(Request $request){
        $validator = Validator::make($request->all(), [
                'muk'=>'required',
                'jurusan_id' => 'required'
            ],[
                'muk.required'=> 'Wajib diisi', // custom message
                'jurusan_id.required'=> 'Wajib diisi' // custom message
            ]);

            if(!$validator->passes()){
                return response()->json([
                    'status'=>0,
                    'error'=>$validator->errors()->toArray()
                ]);
            }else{
                $tambah_muk = MateriUjiKompetensi::create([
                    'muk' => $request->muk,
                    'jurusan_id' => $request->jurusan_id
                ]);
                
                if(!$tambah_muk){
                    return response()->json([
                        'status'=>0,
                        'msg'=>'Terjadi kesalahan, Gagal menambah Materi uji Kompetensi'
                    ]);
                }else{
                    return response()->json([
                        'status'=>1,
                        'msg'=>'Berhasil menambahkan Materi uji Kompetensi'
                    ]);
                }
            }
    }

    public function ubah_muk(Request $request){
        $validator = Validator::make($request->all(), [
                'muk'=>'required',
            ],[
                'muk.required'=> 'Wajib diisi', // custom message
            ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $ubah_muk = MateriUjiKompetensi::where('id', $request->id)->update([
                'muk' => $request->muk,
                'jurusan_id' => $request->jurusan_id
            ]);
            
            if(!$ubah_muk){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal menambah Materi Uji Kompetensi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil menambahkan Materi Uji Kompetensi'
                ]);
            }
        }
    }
    
    public function hapus_muk($id){
        $hapus_muk = MateriUjiKompetensi::find($id)->delete();
        if(!$hapus_muk){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal menghapus Materi Uji Kompetensi'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil menghapus Materi Uji Kompetensi'
            ]);
        }
    }
}
