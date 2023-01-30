<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Institusi;
use Illuminate\Http\Request;
use App\Models\MateriUjiKompetensi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\KualifikasiPendidikan;
use App\Models\SkemaSertifikasi;
use Illuminate\Support\Facades\Validator;
use Str;

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

    // JURUSAN
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
                    'jurusan' => $request->jurusan,
                    'slug' => Str::slug($request->jurusan)
                ]);
                // $id_jurusan = $tambah_jurusan->id()

                SkemaSertifikasi::create([
                    'jurusan_id' => $tambah_jurusan->id
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
                'jurusan' => $request->jurusan,
                'slug' => Str::slug($request->jurusan)
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
    
    // INSTANSI
    public function daftar_data_institusi(){
        return view('admin.pengaturan.institusi.data_institusi');
    }

    public function data_institusi(Request $request){
        $data = Institusi::select([
            'institusi.*'
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

    public function tambah_institusi(Request $request){
        $validator = Validator::make($request->all(), [
                'nama_institusi'=>'required',
                'alamat_institusi'=>'required',
                'nomor_hp_institusi'=>'required',
                'email_institusi'=>'required|email',
                'kode_pos'=>'required'
            ],[
                'nama_institusi.required'=> 'Wajib diisi',
                'alamat_institusi.required'=> 'Wajib diisi',
                'nomor_hp_institusi.required'=> 'Wajib diisi',
                'email_institusi.required'=> 'Wajib diisi',
                'email_institusi.email'=> 'Wajib mengisi dengan type email @',
                'kode_pos.required'=> 'Wajib diisi',
            ]);

            if(!$validator->passes()){
                return response()->json([
                    'status'=>0,
                    'error'=>$validator->errors()->toArray()
                ]);
            }else{
                $tambah_institusi = Institusi::create([
                    'nama_institusi' => $request->nama_institusi,
                    'alamat_institusi' => $request->alamat_institusi,
                    'nomor_hp_institusi' => $request->nomor_hp_institusi,
                    'email_institusi' => $request->email_institusi,
                    'kode_pos' => $request->kode_pos
                ]);
                
                if(!$tambah_institusi){
                    return response()->json([
                        'status'=>0,
                        'msg'=>'Terjadi kesalahan, Gagal menambah Institusi'
                    ]);
                }else{
                    return response()->json([
                        'status'=>1,
                        'msg'=>'Berhasil menambahkan Institusi'
                    ]);
                }
            }
    }

    public function ubah_institusi(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_institusi'=>'required',
            'alamat_institusi'=>'required',
            'nomor_hp_institusi'=>'required',
            'email_institusi'=>'required|email',
            'kode_pos'=>'required'
        ],[
            'nama_institusi.required'=> 'Wajib diisi',
            'alamat_institusi.required'=> 'Wajib diisi',
            'nomor_hp_institusi.required'=> 'Wajib diisi',
            'email_institusi.required'=> 'Wajib diisi',
            'email_institusi.email'=> 'Wajib mengisi dengan type email @',
            'kode_pos.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $tambah_institusi = Institusi::where('id', $request->id)->update([
                'nama_institusi' => $request->nama_institusi,
                'alamat_institusi' => $request->alamat_institusi,
                'nomor_hp_institusi' => $request->nomor_hp_institusi,
                'email_institusi' => $request->email_institusi,
                'kode_pos' => $request->kode_pos
            ]);
            
            if(!$tambah_institusi){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Mengubah Institusi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Mengubah Institusi'
                ]);
            }
        }
    }

    public function hapus_institusi($id){
        $hapus_institusi = Institusi::find($id)->delete();
        if(!$hapus_institusi){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal Menghapus Instansi'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menghapus Instansi'
            ]);
        }
    }

    // KUALIFIKASI PENDIDIKAN
    public function daftar_data_kualifikasi_pendidikan(){
        return view('admin.pengaturan.kualifikasi_pendidikan.data_kualifikasi_pendidikan');
    }

    public function data_kualifikasi_pendidikan(Request $request){
        $data = KualifikasiPendidikan::select([
            'kualifikasi_pendidikan.*'
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

    public function tambah_kualifikasi_pendidikan(Request $request){
        $validator = Validator::make($request->all(), [
                'pendidikan'=>'required',
            ],[
                'pendidikan.required'=> 'Wajib diisi',
            ]);

            if(!$validator->passes()){
                return response()->json([
                    'status'=>0,
                    'error'=>$validator->errors()->toArray()
                ]);
            }else{
                $tambah_kualifikasi_pendidikan = KualifikasiPendidikan::create([
                    'pendidikan' => $request->pendidikan,
                ]);
                
                if(!$tambah_kualifikasi_pendidikan){
                    return response()->json([
                        'status'=>0,
                        'msg'=>'Terjadi kesalahan, Gagal menambah Kualifikasi Pendidikan'
                    ]);
                }else{
                    return response()->json([
                        'status'=>1,
                        'msg'=>'Berhasil menambahkan Kualifikasi Pendidikan'
                    ]);
                }
            }
    }

    public function ubah_kualifikasi_pendidikan(Request $request){
        $validator = Validator::make($request->all(), [
            'pendidikan'=>'required',
        ],[
            'pendidikan.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $tambah_kualifikasi_pendidikan = KualifikasiPendidikan::where('id', $request->id)->update([
                'pendidikan' => $request->pendidikan,
            ]);
            
            if(!$tambah_kualifikasi_pendidikan){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Mengubah Kualifikasi Pendidikan'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Mengubah Kualifikasi Pendidikan'
                ]);
            }
        }
    }
    
    public function hapus_kualifikasi_pendidikan($id){
        $hapus_kualifikasi_pendidikan = KualifikasiPendidikan::find($id)->delete();
        if(!$hapus_kualifikasi_pendidikan){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal Menghapus Kualifikasi Pendidikan'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menghapus Kualifikasi Pendidikan'
            ]);
        }
    }
}
