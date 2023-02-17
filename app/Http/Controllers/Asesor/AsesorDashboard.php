<?php

namespace App\Http\Controllers\Asesor;

use Illuminate\Http\Request;
use App\Models\UnitKompetensi;
use App\Models\SkemaSertifikasi;
use App\Http\Controllers\Controller;
use App\Models\AsesiUjiKompetensi;
use App\Models\MateriUjiKompetensi;
use App\Models\UnitKompetensiIsi;
use App\Models\UnitKompetensiIsi2;
use App\Models\UnitKompetensiSub;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\PelaksanaanUjian;

class AsesorDashboard extends Controller
{
    public function dashboard(){
        $muk = MateriUjiKompetensi::with('relasi_jurusan')->where('jurusan_id', Auth::user()->jurusan_id)->first();
        return view('asesor.dashboard.dashboard', ['muk' => $muk]);
    }

    // UNIT KOMPETENSI BERDASARKAN JURUSAN ASESOR
    public function data_unit_kompetensi_perjurusan_asesor(Request $request){
        
        $data = UnitKompetensi::select([
            'unit_kompetensi.*'
        ]);

        
        if($request->input('length')!=-1) 
        $data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->with('relasi_skema_sertifikasi')
        ->whereRelation('relasi_skema_sertifikasi', 'jurusan_id', Auth::user()->jurusan_id)
        ->get();
        
        $rekamFilter = $data->count();
        $rekamTotal = $data->count();     
        return response()->json([
            'draw'=>$request->input('draw'),
            'data'=>$data,
            'recordsTotal'=>$rekamTotal,
            'recordsFiltered'=>$rekamFilter,
        ]);
    }

    public function halaman_tambah_elemen_unit_kompetensi($id){
        $unit_kompetensi = UnitKompetensi::where('id', $id)->first();
        $data_unit_kompetensi_sub = UnitKompetensiSub::with('relasi_unit_kompetensi')
                ->whereRelation('relasi_unit_kompetensi', 'unit_kompetensi_id', $id)
                ->get();
        $data_unit_kompetensi_isi = UnitKompetensiIsi::with('relasi_unit_kompetensi_sub')->get();
        return view('asesor.dashboard.tambah_elemen', compact('unit_kompetensi', 'data_unit_kompetensi_sub', 'data_unit_kompetensi_isi'));
    }


    // DATA PESERTA PELAKSANAAN UJIAN
    public function data_peserta_pelaksanaan_uji_kompetensi(Request $request){
        $data = PelaksanaanUjian::select([
            'pelaksanaan_ujian.*'
        ]);

        $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->with('relasi_jadwal_uji_kompetensi.relasi_muk', 
                        'relasi_jadwal_uji_kompetensi.relasi_user_asesi.relasi_user_asesi', 
                        'relasi_jadwal_uji_kompetensi.relasi_user_asesor', 'relasi_tuk')
                        ->whereRelation('relasi_jadwal_uji_kompetensi.relasi_user_asesor', 'user_asesor_id', Auth::user()->id)
                        ->get();
        $rekamFilter = $data->count();
        $rekamTotal = $data->count();  
        return response()->json([
            'draw'=>$request->input('draw'),
            'data'=>$data,
            'recordsTotal'=>$rekamTotal,
            'recordsFiltered'=>$rekamFilter,
        ]);
    }

    public function data_list_asesi_peserta_uji_kompetensi(Request $request, $jadwal_uji_kompetensi_id){
        $data = AsesiUjiKompetensi::select([
            'asesi_uji_kompetensi.*'
        ]);

        $data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->with('relasi_user_asesi')->where('jadwal_uji_kompetensi_id', $jadwal_uji_kompetensi_id)->get();
        $rekamFilter = $data->count();
        $rekamTotal = $data->count();
        return response()->json([
            'draw'=>$request->input('draw'),
            'data'=>$data,
            'recordsTotal'=>$rekamTotal,
            'recordsFiltered'=>$rekamFilter,
        ]);
    }

    // public function data_elemen_unit_kompetensi($id){
    //     $data = UnitKompetensiSub::with('relasi_unit_kompetensi')
    //             ->whereRelation('relasi_unit_kompetensi', 'unit_kompetensi_id', $id)->get();
    //     return response()->json([
    //         'data'=>$data,
    //     ]);
    // }

    // FUNGSI TAMBAH ELEMEN UNTI KOMPETENSI
    public function tambah_elemen_unit_kompetensi(Request $request){
        $validator = Validator::make($request->all(), [
                'judul_unit_kompetensi_sub.*'=>'required',
                // 'judul_unit_kompetensi_isi.*'=>'required'
            ],[
                'judul_unit_kompetensi_sub.*.required'=> 'Wajib diisi',
                // 'judul_unit_kompetensi_isi.*.required'=> 'Wajib diisi'
            ]);

            if(!$validator->passes()){
                return response()->json([
                    'status'=>0,
                    'error'=>$validator->errors()->toArray()
                ]);
            }else{
                
                // $tambah_elemen_unit_kompetensi = UnitKompetensiSub::create([
                //     'unit_kompetensi_id' => $request->unit_kompetensi_id,
                //     'judul_unit_kompetensi_sub' => $request->judul_unit_kompetensi_sub,
                // ]);
                
                // $elemen =  $request->input('judul_unit_kompetensi_sub', []);
                // $konten = [];

                $elemen =  $request->input('judul_unit_kompetensi_sub', []);
                $konten_elemen = [];
                foreach ($elemen as $index => $elemens) {
                    $konten_elemen[] = [
                        'unit_kompetensi_id' => $request->unit_kompetensi_id,
                        'judul_unit_kompetensi_sub' => $elemen[$index],
                    ];
                }
                $tambah_elemen_unit_kompetensi = UnitKompetensiSub::insert($konten_elemen);

                if(!$tambah_elemen_unit_kompetensi){
                    return response()->json([
                        'status'=>0,
                        'msg'=>'Terjadi kesalahan, Gagal menambah Elemen Unit Kompetensi'
                    ]);
                }else{
                    return response()->json([
                        'status'=>1,
                        'msg'=>'Berhasil menambahkan Elemen Unit Kompetensi'
                    ]);
                }
        }
    }

    // FUNGSI UBAH ELEMEN UNTI KOMPETENSI    
    public function ubah_elemen_unit_kompetensi(Request $request){
        if ($request->ajax()) {
            UnitKompetensiSub::find($request->pk)
                 ->update([
                     'judul_unit_kompetensi_sub'=> $request->value
                 ]);
   
             return response()->json(['success' => true]);
         }

        // $validator = Validator::make($request->all(), [
        //         'judul_unit_kompetensi_sub'=>'required',
        //     ],[
        //         'judul_unit_kompetensi_sub.required'=> 'Wajib diisi', // custom message
        //     ]);

        //     if(!$validator->passes()){
        //         return response()->json([
        //             'status'=>0,
        //             'error'=>$validator->errors()->toArray()
        //         ]);
        //     }else{
        //         $ubah_elemen_unit_kompetensi = UnitKompetensiSub::where('id', $request->elemen_unit_kompetensi_id)->update([
        //         'judul_unit_kompetensi_sub' => $request->judul_unit_kompetensi_sub,
        //         ]);
                                
        //         if(!$ubah_elemen_unit_kompetensi){
        //             return response()->json([
        //                 'status'=>0,
        //                 'msg'=>'Terjadi kesalahan, Gagal menambah Elemen Unit Kompetensi'
        //             ]);
        //         }else{
        //             return response()->json([
        //                 'status'=>1,
        //                 'msg'=>'Berhasil menambahkan Elemen Unit Kompetensi'
        //             ]);
        //     }
        // }
    }

    // FUNGSI HAPUS ELEMEN UNIT KOMPETENSI
    public function hapus_elemen_unit_kompetensi($id){
        $hapus_elemen_unit_kompetensi = UnitKompetensiSub::find($id)->delete();
        if(!$hapus_elemen_unit_kompetensi){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal menghapus Elemen Unit Kompetensi'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil menghapus Elemen Unit Kompetensi'
            ]);
        }
    }

        // TAMBAH ELEMEN KONTEN
    public function tambah_isi_elemen_unit_kompetensi(Request $request){
            $validator = Validator::make($request->all(), [
                'judul_unit_kompetensi_isi'=>'required',
                // 'judul_unit_kompetensi_isi.*'=>'required'
            ],[
                'judul_unit_kompetensi_isi.required'=> 'Wajib diisi',
                // 'judul_unit_kompetensi_isi.*.required'=> 'Wajib diisi'
            ]);
    
            if(!$validator->passes()){
                return response()->json([
                    'status'=>0,
                    'error'=>$validator->errors()->toArray()
                ]);
            }else{
    
                $isi_elemen =  $request->input('judul_unit_kompetensi_isi', []);
                $isi = [];
                foreach ($isi_elemen as $index => $isi_elemens) {
                    $isi[] = [
                        'unit_kompetensi_sub_id' => $request->unit_kompetensi_sub_id,
                        'judul_unit_kompetensi_isi' => $isi_elemen[$index],
                    ];
                }
                $tambah_isi_elemen_unit_kompetensi = UnitKompetensiIsi::insert($isi);
    
                if(!$tambah_isi_elemen_unit_kompetensi){
                    return response()->json([
                        'status'=>0,
                        'msg'=>'Terjadi kesalahan, Gagal menambah Elemen Unit Kompetensi'
                    ]);
                }else{
                    return response()->json([
                        'status'=>1,
                        'msg'=>'Berhasil menambahkan Elemen Unit Kompetensi'
                    ]);
                }
            }
    }

    // ISI SUB ELEMEN
    public function isi_sub_elemen_unit_kompetensi(Request $request, $id){
        $isi_sub_elemen = UnitKompetensiIsi2::where('unit_kompetensi_isi_id', $id)->get();
        return view('asesor.dashboard.tambah_isi_sub_elemen', compact('isi_sub_elemen', 'id'));
    }

    // TAMBAH ISI SUB ELEMEN
    public function tambah_isi_sub_elemen_unit_kompetensi(Request $request){
        $validator = Validator::make($request->all(), [
            'judul_unit_kompetensi_isi_2'=>'required',
            // 'judul_unit_kompetensi_isi.*'=>'required'
        ],[
            'judul_unit_kompetensi_isi_2.required'=> 'Wajib diisi',
            // 'judul_unit_kompetensi_isi.*.required'=> 'Wajib diisi'
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{

            $tambah_isi_sub_elemen_unit_kompetensi = UnitKompetensiIsi2::create([
                'unit_kompetensi_isi_id' => $request->unit_kompetensi_isi_id,
                'judul_unit_kompetensi_isi_2' => $request->judul_unit_kompetensi_isi_2
            ]);

            if(!$tambah_isi_sub_elemen_unit_kompetensi){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal menambah Isi Sub Elemen Unit Kompetensi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil menambahkan Isi Sub Elemen Unit Kompetensi'
                ]);
            }
        }
    }

    // UBAH ISI 2 ELEMEN
    public function ubah_isi_2_elemen(Request $request){
        if ($request->ajax()) {
            UnitKompetensiIsi2::find($request->pk)
                 ->update([
                     'judul_unit_kompetensi_isi_2'=> $request->value
                 ]);
   
             return response()->json(['success' => true]);
         }
    }

    // UBAH KONTEN ELEMEN
    public function ubah_konten_elemen(Request $request){
        if ($request->ajax()) {
           UnitKompetensiIsi::find($request->pk)
                ->update([
                    'judul_unit_kompetensi_isi'=> $request->value
                ]);
  
            return response()->json(['success' => true]);
        }
    }
    
    // HAPUS KONTEN ELEMEN
    public function hapus_isi_elemen_unit_kompetensi($id){
        $hapus_isi_elemen_unit_kompetensi = UnitKompetensiIsi::find($id)->delete();
        if(!$hapus_isi_elemen_unit_kompetensi){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal menghapus Elemen Unit Kompetensi'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil menghapus Elemen Unit Kompetensi'
            ]);
        }
    }

    // HAPUS ISI 2 ELEMEN
    public function hapus_isi_2_elemen_unit_kompetensi($id){
        $hapus_isi_2_elemen_unit_kompetensi = UnitKompetensiIsi2::find($id)->delete();
        if(!$hapus_isi_2_elemen_unit_kompetensi){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal menghapus Elemen Unit Kompetensi'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil menghapus Elemen Unit Kompetensi'
            ]);
        }
    }
}
