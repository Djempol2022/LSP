<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\JadwalUjiKompetensi;
use App\Models\MateriUjiKompetensi;
use App\Http\Controllers\Controller;
use App\Models\AsesiUjiKompetensi;
use App\Models\AsesorUjiKompetensi;
use App\Models\DetailJadwalUjiKompetensi;
use App\Models\DetailUjiKompetensi;
use App\Models\PeninjauUjiKompetensi;
use Illuminate\Support\Facades\Validator;

class Admin_DetailJadwalUjiKompetensi extends Controller
{
    public function detail_jadwal_uji_kompetensi($id){
        $jadwal_uji_kompetensi = JadwalUjiKompetensi::where('id', $id)->with('relasi_muk.relasi_jurusan')->first()->toArray();
        // ->with([
        //     'relasi_muk' => function($query) {
        //         return $query->with('relasi_jurusan');
        //     }])->get()->toArray();
        // $asesi = DetailJadwalUjiKompetensi::with('relasi_user_asesi.relasi_role')->first();
        // dd($asesi);
        $muk = MateriUjiKompetensi::where('id', $jadwal_uji_kompetensi['muk_id'])
                ->with('relasi_jurusan')->first()->toArray();
        $user_asesi = User::with('relasi_role')->whereRelation('relasi_role', 'role', '=', 'asesi')->get()->toArray();
        $user_asesor = User::with('relasi_role')->whereRelation('relasi_role', 'role', '=', 'asesor')->get()->toArray();
        $user_peninjau = User::with('relasi_role')->whereRelation('relasi_role', 'role', '=', 'peninjau')->get()->toArray();
        // dd($user_asesi, $user_asesor, $user_peninjau);
        return view('admin.jadwal_uji_kompetensi.detail_jadwal_uji_kompetensi', 
                compact('jadwal_uji_kompetensi', 'user_asesi', 'user_asesor', 'user_peninjau'));
    }

    // ASESI
    public function data_asesi(Request $request, $id){
        $data = AsesiUjiKompetensi::select([
            'asesi_uji_kompetensi.*'
        ]);

        if($request->input('length')!=-1) 
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $rekamTotal = $data->count();
            $data = $data->where('jadwal_uji_kompetensi_id', $id)->with('relasi_user_asesi')->get()->toArray();
        return response()->json([
            'data'=>$data,
            'recordsTotal'=>$rekamTotal
        ]);
    }

    public function tambah_asesi(Request $request){
        $validator = Validator::make($request->all(), [
                'user_asesi_id'=>'required',
            ],[
                'user_asesi_id.required'=> 'Wajib diisi', // custom message
            ]);

            if(!$validator->passes()){
                return response()->json([
                    'status'=>0,
                    'error'=>$validator->errors()->toArray()
                ]);
            }else{
                $tambah_asesi = AsesiUjiKompetensi::create([
                    'jadwal_uji_kompetensi_id' => $request->id_jadwal,
                    'user_asesi_id' => $request->user_asesi_id,

                ]);
                
                if(!$tambah_asesi){
                    return response()->json([
                        'status'=>0,
                        'msg'=>'Terjadi kesalahan, Gagal Menambah Asesi'
                    ]);
                }else{
                    return response()->json([
                        'status'=>1,
                        'msg'=>'Berhasil menambahkan Asesi'
                    ]);
                }
            }
    }

    public function ubah_asesi(Request $request){
        $validator = Validator::make($request->all(), [
                'user_asesi_id'=>'required',
            ],[
                'user_asesi_id.required'=> 'Wajib diisi', // custom message
            ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $ubah_asesi = AsesiUjiKompetensi::where('id', $request->id)->update([
                'user_asesi_id' => $request->user_asesi_id,
            ]);
            
            if(!$ubah_asesi){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menambah Asesi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menambah Asesi'
                ]);
            }
        }
    }
    
    public function hapus_asesi($id){
        $hapus_asesi = AsesiUjiKompetensi::find($id)->delete();
        if(!$hapus_asesi){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal Menghapus Asesi'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menghapus Asesi'
            ]);
        }
    }
    
    // ASESOR
    public function data_asesor(Request $request, $id){
        $data = AsesorUjiKompetensi::select([
            'asesor_uji_kompetensi.*'
        ]);

        if($request->input('length')!=-1) 
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $rekamTotal = $data->count();
            $data = $data->where('jadwal_uji_kompetensi_id', $id)->with('relasi_user_asesor')->get()->toArray();
        return response()->json([
            'data'=>$data,
            'recordsTotal'=>$rekamTotal
        ]);
    }

    public function tambah_asesor(Request $request){
        $validator = Validator::make($request->all(), [
                'user_asesor_id'=>'required',
            ],[
                'user_asesor_id.required'=> 'Wajib diisi', // custom message
            ]);

            if(!$validator->passes()){
                return response()->json([
                    'status'=>0,
                    'error'=>$validator->errors()->toArray()
                ]);
            }else{
                $tambah_asesor = AsesorUjiKompetensi::create([
                    'jadwal_uji_kompetensi_id' => $request->id_jadwal,
                    'user_asesor_id' => $request->user_asesor_id,

                ]);
                
                if(!$tambah_asesor){
                    return response()->json([
                        'status'=>0,
                        'msg'=>'Terjadi kesalahan, Gagal Menambah Asesor'
                    ]);
                }else{
                    return response()->json([
                        'status'=>1,
                        'msg'=>'Berhasil menambahkan Asesor'
                    ]);
                }
            }
    }

    public function ubah_asesor(Request $request){
        
        $validator = Validator::make($request->all(), [
                'user_asesor_id'=>'required',
            ],[
                'user_asesor_id.required'=> 'Wajib diisi', // custom message
            ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $ubah_asesor = AsesorUjiKompetensi::where('id', $request->id)->update([
                'user_asesor_id' => $request->user_asesor_id,
            ]);
            
            if(!$ubah_asesor){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menambah Asesor'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menambah Asesor'
                ]);
            }
        }
    }
    
    public function hapus_asesor($id){
        $hapus_asesor = AsesorUjiKompetensi::find($id)->delete();
        if(!$hapus_asesor){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal Menghapus Asesor'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menghapus Asesor'
            ]);
        }
    }

    // PENINJAU
    public function data_peninjau(Request $request, $id){
        $data = PeninjauUjiKompetensi::select([
            'peninjau_uji_kompetensi.*'
        ]);

        if($request->input('length')!=-1) 
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $rekamTotal = $data->count();
            $data = $data->where('jadwal_uji_kompetensi_id', $id)->with('relasi_user_peninjau')->get()->toArray();
        return response()->json([
            'data'=>$data,
            'recordsTotal'=>$rekamTotal
        ]);
    }

    public function tambah_peninjau(Request $request){
        $validator = Validator::make($request->all(), [
                'user_peninjau_id'=>'required',
            ],[
                'user_peninjau_id.required'=> 'Wajib diisi', // custom message
            ]);

            if(!$validator->passes()){
                return response()->json([
                    'status'=>0,
                    'error'=>$validator->errors()->toArray()
                ]);
            }else{
                $tambah_peninjau = PeninjauUjiKompetensi::create([
                    'jadwal_uji_kompetensi_id' => $request->id_jadwal,
                    'user_peninjau_id' => $request->user_peninjau_id,

                ]);
                
                if(!$tambah_peninjau){
                    return response()->json([
                        'status'=>0,
                        'msg'=>'Terjadi kesalahan, Gagal Menambah Peninjau'
                    ]);
                }else{
                    return response()->json([
                        'status'=>1,
                        'msg'=>'Berhasil menambahkan Peninjau'
                    ]);
                }
            }
    }

    public function ubah_peninjau(Request $request){
        $validator = Validator::make($request->all(), [
                'user_peninjau_id'=>'required',
            ],[
                'user_peninjau_id.required'=> 'Wajib diisi', // custom message
            ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $ubah_peninjau = PeninjauUjiKompetensi::where('id', $request->id)->update([
                'user_peninjau_id' => $request->user_peninjau_id,
            ]);
            
            if(!$ubah_peninjau){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menambah Peninjau'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menambah Peninjau'
                ]);
            }
        }
    }
    
    public function hapus_peninjau($id){
        $hapus_peninjau = PeninjauUjiKompetensi::find($id)->delete();
        if(!$hapus_peninjau){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal Menghapus Peninjau'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menghapus Peninjau'
            ]);
        }
    }


}
