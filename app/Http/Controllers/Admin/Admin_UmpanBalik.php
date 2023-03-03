<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AsesiUjiKompetensi;
use App\Models\UmpanBalikKomponen;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class Admin_UmpanBalik extends Controller
{
    public function umpan_balik(){
        return view('admin.assessment.umpan_balik.umpan_balik_pilihan');
    }

    public function halaman_buat_umpan_balik(){
        return view('admin.assessment.umpan_balik.buat_komponen_umpan_balik');
    }

    public function daftar_data_umpan_balik(Request $request){
        $data = UmpanBalikKomponen::select([
            'umpan_balik_komponen.*'
        ]);

        $rekamFilter = $data->get()->count();
        if($request->input('length')!=-1) 
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $rekamTotal = $data->count();
            $data = $data->get();
        return response()->json([
            'draw'=>$request->input('draw'),
            'data'=>$data,
            'recordsTotal'=>$rekamTotal,
            'recordsFiltered'=>$rekamFilter
        ]);
    }

    public function tambah_umpan_balik(Request $request){
        $validator = Validator::make($request->all(), [
                'komponen.*'=>'required'
            ],[
                'komponen.*.required'=> 'Wajib diisi'
            ]);
            
            if(!$validator->passes()){
                return response()->json([
                    'status'=>0,
                    'error'=>$validator->errors()->toArray()
                ]);
            }else{
                $komponen =  $request->input('komponen', []);
                $input_komponen = [];
                foreach ($komponen as $index => $komponens) {
                    $input_komponen[] = [
                        'komponen' => $komponen[$index],
                    ];
                }
                $tambah_umpan_balik_komponen = UmpanBalikKomponen::insert($input_komponen);

                if(!$tambah_umpan_balik_komponen){
                    return response()->json([
                        'status'=>0,
                        'msg'=>'Terjadi kesalahan, Gagal menambah Umpan Balik Komponen'
                    ]);
                }else{
                    return response()->json([
                        'status'=>1,
                        'msg'=>'Berhasil menambahkan Umpan Balik Komponen'
                    ]);
                }
            }
    }

    public function ubah_umpan_balik(Request $request){
        $validator = Validator::make($request->all(), [
            'komponen'=>'required',
        ],[
            'komponen.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $ubah_komponen = UmpanBalikKomponen::where('id', $request->id)->update([
                'komponen' => $request->komponen,
            ]);
            
            if(!$ubah_komponen){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Mengubah Umpan Balik Komponen'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Mengubah Umpan Balik Komponen'
                ]);
            }
        }
    }

    public function hapus_umpan_balik($id){
        $hapus_komponen = UmpanBalikKomponen::find($id)->delete();
        if(!$hapus_komponen){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal Menghapus Komponen Umpan Balik'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menghapus Komponen Umpan Balik'
            ]);
        }
    }

    public function daftar_data_umpan_balik_asesi(){
        return view('admin.assessment.umpan_balik.daftar_asesi_umpan_balik');
    }

    public function data_umpan_balik_asesi(Request $request){

        $data = User::select([
            'users.*'
        ]);

        if($request->input('length')!=-1) 
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $data = $data->with('relasi_user_asesi_ukom')->whereRelation('relasi_user_asesi_ukom', 'status_umpan_balik', 1)->get();
            $rekamTotal = $data->count();
            $rekamFilter = $data->count();
            
        return response()->json([
            'data'=>$data,
            'recordsTotal'=>$rekamTotal,
            'recordsFiltered'=>$rekamFilter,
        ]);

        // $data = AsesiUjiKompetensi::select([
        //     'asesi_uji_kompetensi.*'
        // ]);

        // if($request->input('length')!=-1) 
        //     $data = $data->skip($request->input('start'))->take($request->input('length'));
        //     $data = $data->where('status_umpan_balik', 1)->with('relasi_user_asesi', 'relasi_jadwal_uji_kompetensi')->get();
        //     $rekamTotal = $data->count();
        //     $rekamFilter = $data->count();
        // return response()->json([
        //     'data'=>$data,
        //     'recordsTotal'=>$rekamTotal,
        //     'recordsFiltered'=>$rekamFilter,
        // ]);
    }

}
