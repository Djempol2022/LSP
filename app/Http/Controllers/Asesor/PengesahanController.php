<?php

namespace App\Http\Controllers\Asesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Acc_sertifikasi;
use App\Models\Sertifikasi;

class PengesahanController extends Controller
{
    public function halamanpengesahan(Request $request){
        $user  = User::get();
        $sertifikasi = Sertifikasi::get();
        $asesmen_mandiri = Acc_Sertifikasi::get();
        return view('asesor.pengesahan.index', compact('user','sertifikasi', 'asesmen_mandiri'));
    }
    public function mengesahkan(Request $request, $id){
        $mengesahkan = Acc_sertifikasi::find($id);  
        $mengesahkan->users_id = $request->users_id;
        $mengesahkan->sertifikasi_id = $request->sertifikasi_id;
       
        $mengesahkan->ttd_asesi = $request->ttd_asesi;
        $mengesahkan->ttd_asesor = $request->ttd_asesor;
        $mengesahkan->status = $request->status;
        
        $mengesahkan->save();
        return redirect()->back()->with('success');
        
    }
}
 