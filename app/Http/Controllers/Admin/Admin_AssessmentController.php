<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sertifikasi;
use Illuminate\Http\Request;

class Admin_AssessmentController extends Controller
{
    public function assessment(){
        return view('admin.assessment.assessment');
    }

    public function permohonan_sertifikasi_kompetensi(){
        return view('admin.assessment.permohonan_sertifikasi.data_permohonan_sertifikasi');
    }

    public function data_permohonan_sertifikasi_kompetensi(Request $request){
        $data = Sertifikasi::select([
            'sertifikasi.*'
        ]);

        if($request->input('length')!=-1) 
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $rekamTotal = $data->count();
            $data = $data->with('relasi_user')->get()->toArray();
        return response()->json([
            'data'=>$data,
            'recordsTotal'=>$rekamTotal
        ]);
    }

    public function detail_data_permohonan_sertifikasi_kompetensi($id){
        
        $sertifikasi = Sertifikasi::where('id', $id)->with('relasi_user.relasi_user_detail')->first()->toArray();
        // ->with('relasi_unit_kompetensi.relasi_unit_kompetensi_sub.relasi_unit_kompetensi_isi')->get()->toArray();
        // foreach($sertifikasi as $sertifikasis)
        // {
        //     $sertifikasis;
        // }
        // dd($sertifikasi);
        return response()->json([
            'data'=>$sertifikasi,
        ]);

        return view('admin.assessment.permohonan_sertifikasi.detail_permohonan_sertifikasi', );
    }

    public function detail_permohonan_sertifikasi_kompetensi($id){
        $sertifikasi = Sertifikasi::where('id', $id)->with('relasi_user.relasi_user_detail')->first()->toArray();
        return view('admin.assessment.permohonan_sertifikasi.detail_permohonan_sertifikasi', compact('sertifikasi'));
    }
}
