<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\MateriUjiKompetensi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Admin_PengaturanController extends Controller
{
    public function pengaturan(){
        return view('admin.pengaturan.pengaturan');
    }

    public function jurusan_id($id){
        $jurusan = MateriUjiKompetensi::where('jurusan_id', $id)->pluck('muk', 'id');
        return response()->json($jurusan);
    }

    public function ubah_password(Request $request){
        $validator = Validator::make($request->all(), [
            'passwordlama' =>[
                'required', function($attribute, $value, $fail){
                    if(!Hash::check($value, Auth::user()->password)){
                        return $fail(__('Password anda tidak cocok'));
                    }
                },
                'min:3','max:30',
            ],
            'password'=>'required|min:8|max:30',
            'konfirmasipasswordbaru'=>'required|same:password'
            ],
            [
                'passwordlama.required'=> 'Wajib diisi', // custom message
                'passwordlama.min'=> 'Minimal 8 Karakter', // custom message
                'passwordlama.max'=> 'Maksimal 30 Karakter', // custom message
                
                'password.required'=> 'Wajib diisi', // custom message
                'password.min'=> 'Minimal 8 Karakter', // custom message
                'password.max'=> 'Maksimal 30 Karakter', // custom message

                'konfirmasipasswordbaru.required'=> 'Wajib diisi', // custom message
                'konfirmasipasswordbaru.same'=> 'Konfirmasi password tidak tepat' // custom message

            ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $updated = User::find(Auth::user()->id)
                ->update([
                    'password'=>Hash::make($request->password)
            ]);
            
            if(!$updated){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal mengupdate password'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil mengupdate password'
                ]);
            }
        }
    }

    public function daftar_data_jurusan(){
        $jurusan = Jurusan::get();
        return view('admin.pengaturan.jurusan.data_jurusan', compact('jurusan'));
    }

    public function data_jurusan(Request $request){
        $data = Jurusan::select([
            'jurusan.*'
        ]);

        if($request->input('length')!=-1) 
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $rekamTotal = $data->count();
            $data = $data->get();
        return response()->json([
            'data'=>$data,
            'recordsTotal'=>$rekamTotal
        ]);
    }

    public function tambah_jurusan(Request $request){
        $validator = Validator::make($request->all(), [
                'jurusan'=>'required'
            ],[
                'jurusan.required'=> 'Wajib diisi', // custom message
            ]);

            if(!$validator->passes()){
                return response()->json([
                    'status'=>0,
                    'error'=>$validator->errors()->toArray()
                ]);
            }else{
                $tambah_jurusan = Jurusan::create([
                    'jurusan' => $request->jurusan
                ]);
                
                if(!$tambah_jurusan){
                    return response()->json([
                        'status'=>0,
                        'msg'=>'Terjadi kesalahan, Gagal menambah jurusan'
                    ]);
                }else{
                    return response()->json([
                        'status'=>1,
                        'msg'=>'Berhasil menambahkan jurusan'
                    ]);
                }
            }
    }

    public function ubah_jurusan(Request $request){
        $validator = Validator::make($request->all(), [
            'jurusan'=>'required'
        ],[
            'jurusan.required'=> 'Wajib diisi', // custom message
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $ubah_jurusan = Jurusan::where('id', $request->id)->update([
                'jurusan' => $request->jurusan
            ]);
            
            if(!$ubah_jurusan){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal menambah jurusan'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil menambahkan jurusan'
                ]);
            }
        }
    }
    public function hapus_jurusan($id){
        $hapus_jurusan = Jurusan::find($id)->delete();
        if(!$hapus_jurusan){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal menghapus jurusan'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil menghapus jurusan'
            ]);
        }
    }
}
