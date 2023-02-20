<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Models\AsesiUjiKompetensi;
use App\Models\HasilUmpanBalik;
use Auth;
use Illuminate\Http\Request;

class UmpanBalikController extends Controller
{
    public function simpan_umpan_balik_asesi(Request $request){
        $jadwal_id = $request->jadwal_uji_kompetensi_id;
        $umpan_balik_komponen_id = $request->umpan_balik_komponen_id;
        $catatan = $request->catatan;
        
        foreach($umpan_balik_komponen_id as $key => $data_umpan_balik_komponen_id)
        {
            HasilUmpanBalik::create([
                'jadwal_uji_kompetensi_id' => $jadwal_id,
                'user_asesi_id' => Auth::user()->id,
                'umpan_balik_komponen_id' => $umpan_balik_komponen_id[$key],
                'hasil' => $request['hasil-' . $data_umpan_balik_komponen_id],
                'catatan' => $catatan[$key] 
            ]);
        }
        AsesiUjiKompetensi::where('jadwal_uji_kompetensi_id',$jadwal_id)->where('user_asesi_id', Auth::user()->id)->update([
            'status_umpan_balik' => 1,
        ]);
    }
}
