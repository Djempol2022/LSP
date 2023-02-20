<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Institusi;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class Admin_PenggunaController extends Controller
{
    public function daftar_data_pengguna(){
        $jurusan = Jurusan::get()->toArray();
        $institusi = Institusi::get()->toArray();
        return view('admin.pengaturan.pengguna.data_pengguna', compact('jurusan', 'institusi'));
    }
    public function data_pengguna(Request $request){
        $data = User::select([
            'users.*'
        ]);

        if($request->input('length')!=-1) 
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $rekamTotal = $data->count();
            // $data = $data->with('relasi_muk')->where('jurusan_id', $id)->get();
            $data = $data->with('relasi_institusi')->with('relasi_jurusan')->with('relasi_role')->get();
            // return $data;
            return response()->json([
            'data'=>$data,
            'recordsTotal'=>$rekamTotal
        ]);
    }

    public function tambah_pengguna(Request $request){

        $validator = Validator::make($request->all(), [
            'nama_lengkap'=>'required',
            'email' => 'required|email',
            'institusi_id' => 'required',
            'jurusan_id' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ],[
            'nama_lengkap.required'=> 'Wajib diisi',
            'email.required'=> 'Wajib diisi',
            'email.email'=> 'Wajib diisi dengan type email @',
            'institusi_id.required'=> 'Wajib diisi',
            'jurusan_id.required'=> 'Wajib diisi',
            'password.required'=> 'Wajib diisi',
            'role_id.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $tambah_pengguna = User::create([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'institusi_id' => $request->institusi_id,
                'jurusan_id' => $request->jurusan_id,
                'password' => $request->password,
                'role_id' => $request->role_id,
            ]);
            
            if(!$tambah_pengguna){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menambah Pengguna'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menambahkan Pengguna'
                ]);
            }
        }
    }

    public function ubah_pengguna(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_lengkap'=>'required',
            'email' => 'required|email',
            'institusi_id' => 'required',
            'jurusan_id' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ],[
            'nama_lengkap.required'=> 'Wajib diisi',
            'email.required'=> 'Wajib diisi',
            'email.email'=> 'Wajib diisi dengan type email @',
            'institusi_id.required'=> 'Wajib diisi',
            'password.required'=> 'Wajib diisi',
            'jurusan_id.required'=> 'Wajib diisi',
            'role_id.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $ubah_pengguna = User::where('id', $request->id)->update([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'institusi_id' => $request->institusi_id,
                'jurusan_id' => $request->jurusan_id,
                'password' => $request->password,
                'role_id' => $request->role_id
            ]);
            
            if(!$ubah_pengguna){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Mengubah Data Pengguna'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menambahkan Data Pengguna'
                ]);
            }
        }
    }

    public function hapus_pengguna($id){
        $hapus_pengguna = User::find($id)->delete();
        if(!$hapus_pengguna){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal Menghapus Pengguna'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menghapus Pengguna'
            ]);
        }
    }
}
