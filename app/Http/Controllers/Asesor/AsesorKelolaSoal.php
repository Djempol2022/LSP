<?php

namespace App\Http\Controllers\Asesor;

use Route;
use App\Models\Soal;
use App\Models\Jurusan;
use App\Models\JenisSoal;
use App\Models\JawabanAsesi;
use Illuminate\Http\Request;
use App\Models\PelaksanaanUjian;
use App\Models\AsesiUjiKompetensi;
use App\Models\AsesorUjiKompetensi;
use App\Models\JadwalUjiKompetensi;
use App\Models\MateriUjiKompetensi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AsesorKelolaSoal extends Controller
{
    public function kelola_soal(){
        return view('asesor.kelola_soal.kelola_soal');
    }
    
    public function pilih_jenis_soal($id){
        $jenis_soal = JenisSoal::get();
        return view('asesor.kelola_soal.jenis_soal', compact('jenis_soal', 'id'));
    }

    public function data_kelola_soal(Request $request){
        $data = JadwalUjiKompetensi::with('relasi_muk', 'relasi_user_asesor.relasi_user_asesor_detail', 
            'relasi_user_peninjau.relasi_user_peninjau_detail', 'relasi_pelaksanaan_ujian')
            ->whereRelation('relasi_muk', 'jurusan_id', Auth::user()->jurusan_id)
            ->whereRelation('relasi_user_asesor.relasi_user_asesor_detail', 'id', Auth::user()->id)->get();
            $rekamTotal = $data->count();
            $rekamFilter = $data->count();
            return response()->json([
                'draw'=>$request->input('draw'),
                'data'=>$data,
                'recordsTotal'=>$rekamTotal,
                'recordsFiltered'=>$rekamFilter,
        ]);
    }

    public function buat_soal($id, $jenis_soal_id){
        $jadwal_id = JadwalUjiKompetensi::where('id', $id)->first();
        $data_muk = MateriUjiKompetensi::with('relasi_jurusan')->where('id', $jadwal_id->muk_id)->first();
        $data_jenis_soal = JenisSoal::where('id', $jenis_soal_id)->first();
        $data_jurusan = Jurusan::where('id', $data_muk->relasi_jurusan->id)->first();
        return view('asesor.kelola_soal._buat_soal', compact('jadwal_id', 'data_muk', 'data_jenis_soal', 'data_jurusan'));
    }

    public function tambah_soal_pilihan_ganda(Request $request){
        $jadwal_uji_kompetensi_id = $request->input('jadwal_uji_kompetensi_id');
        $jenis_tes = 1;

        $pertanyaans = $request->input('pertanyaan');
        
        $pilihan = $request->input('pilihan');
        $jawaban = $request->input('jawaban');
        
        $cek_jadwal = PelaksanaanUjian::where('jadwal_uji_kompetensi_id', $jadwal_uji_kompetensi_id)->count();
        $cek_jenis_tes_ada = PelaksanaanUjian::where('jadwal_uji_kompetensi_id', $jadwal_uji_kompetensi_id)
                    ->where('jenis_tes', 1)->orWhere('jenis_tes', 0)->first();
        
        if($cek_jadwal <=0 ){
            PelaksanaanUjian::create([
                'jadwal_uji_kompetensi_id' => $jadwal_uji_kompetensi_id,
                'jenis_tes' => $jenis_tes,
                'acc' => 1
            ]);
            for($x = 0; $x < count($pertanyaans); $x++){
                $pertanyaan = $pertanyaans[$x];
                $ambil_pilihan = "";
                $ambil_jawaban = null;
    
                $ambil_pilihan = 
                    $pilihan[$x][0] . ";" . 
                    $pilihan[$x][1] . ";" . 
                    $pilihan[$x][2] . ";" . 
                    $pilihan[$x][3];
                $ambil_jawaban = $jawaban[$x];
            
                if(trim($pertanyaan) == "" || is_null($pertanyaan))
                    continue;
                    Soal::create([
                    'jadwal_uji_kompetensi_id' => $jadwal_uji_kompetensi_id,
                    'pertanyaan' => $pertanyaan,
                    'pilihan' => $ambil_pilihan,
                    'jawaban' => $ambil_jawaban
                ]);
            }
            AsesorUjiKompetensi::where('jadwal_uji_kompetensi_id', $jadwal_uji_kompetensi_id)->update([
                'ttd_asesor' => $request->ttd_asesor
            ]);
            return redirect()->route('asesor.KelolaSoal.ReviewSoal', 
                ['jadwal_id'=>$jadwal_uji_kompetensi_id, 
                'jenis_tes'=>$jenis_tes]);
        }
        elseif($cek_jadwal >0){
            for($x = 0; $x < count($pertanyaans); $x++){
                $pertanyaan = $pertanyaans[$x];
                $ambil_pilihan = "";
                $ambil_jawaban = null;
    
                $ambil_pilihan = 
                    $pilihan[$x][0] . ";" . 
                    $pilihan[$x][1] . ";" . 
                    $pilihan[$x][2] . ";" . 
                    $pilihan[$x][3];
                $ambil_jawaban = $jawaban[$x];
            
                if(trim($pertanyaan) == "" || is_null($pertanyaan))
                    continue;
                    Soal::create([
                    'jadwal_uji_kompetensi_id' => $jadwal_uji_kompetensi_id,
                    'pertanyaan' => $pertanyaan,
                    'pilihan' => $ambil_pilihan,
                    'jawaban' => $ambil_jawaban
                ]);
            }
            AsesorUjiKompetensi::where('jadwal_uji_kompetensi_id', $jadwal_uji_kompetensi_id)->update([
                'ttd_asesor' => $request->ttd_asesor
            ]);
            return redirect()->route('asesor.KelolaSoal.ReviewSoal', 
            ['jadwal_id'=>$jadwal_uji_kompetensi_id, 
            'jenis_tes'=>$jenis_tes]);
        }
    }

    public function tambah_soal_essay(Request $request){
        $validator = Validator::make($request->all(), [
            'ttd_asesor' => 'required',
        ],[
            'ttd_asesor.required'=> 'Wajib diisi',
        ]);
        $jadwal_uji_kompetensi_id = $request->input('jadwal_uji_kompetensi_id');
        $jenis_tes = 2;

        $pertanyaans = $request->input('essay_pertanyaan');
        $jawaban = $request->input('essay_jawaban');
        
         
        $cek_jadwal = PelaksanaanUjian::where('jadwal_uji_kompetensi_id', $jadwal_uji_kompetensi_id)->count();
        $cek_jenis_tes_ada = PelaksanaanUjian::where('jadwal_uji_kompetensi_id', $jadwal_uji_kompetensi_id)
                    ->where('jenis_tes', 2)->orWhere('jenis_tes', 0)->first();
        
        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            if($cek_jadwal <=0 ){
                    PelaksanaanUjian::create([
                        'jadwal_uji_kompetensi_id' => $jadwal_uji_kompetensi_id,
                        'jenis_tes' => $jenis_tes,
                        'acc' => 1
                    ]);
                    for($x = 0; $x < count($pertanyaans); $x++){
                        $pertanyaan = $pertanyaans[$x];
                        $ambil_jawaban = null;
                        $ambil_jawaban = $jawaban[$x];
                
                    if(trim($pertanyaan) == "" || is_null($pertanyaan))
                        continue;
        
                        Soal::create([
                        'jadwal_uji_kompetensi_id' => $jadwal_uji_kompetensi_id,
                        'pertanyaan' => $pertanyaan,
                        'jawaban' => $ambil_jawaban
                    ]);
                    }
                    AsesorUjiKompetensi::where('jadwal_uji_kompetensi_id', $jadwal_uji_kompetensi_id)->update([
                        'ttd_asesor' => $request->ttd_asesor
                    ]);
                    return redirect()->route('asesor.KelolaSoal.ReviewSoal', 
                    ['jadwal_id'=>$jadwal_uji_kompetensi_id, 
                    'jenis_tes'=>$jenis_tes]);
                }
                elseif($cek_jadwal >0){
                    for($x = 0; $x < count($pertanyaans); $x++){
                        $pertanyaan = $pertanyaans[$x];
                        $ambil_jawaban = null;
                        $ambil_jawaban = $jawaban[$x];
                    
                    if(trim($pertanyaan) == "" || is_null($pertanyaan))
                        continue;
    
                        Soal::create([
                        'jadwal_uji_kompetensi_id' => $jadwal_uji_kompetensi_id,
                        'pertanyaan' => $pertanyaan,
                        'jawaban' => $ambil_jawaban
                    ]);
                }
                AsesorUjiKompetensi::where('jadwal_uji_kompetensi_id', $jadwal_uji_kompetensi_id)->update([
                    'ttd_asesor' => $request->ttd_asesor
                ]);
                return response()->json([
                    'status'=>1,
                    'msg'   =>'Berhasil Membuat Soal Essay',
                    'jenis_tes' => $jenis_tes,
                    'jadwal_id' => $jadwal_uji_kompetensi_id
                    // 'route' => route('asesor.KelolaSoal.ReviewSoal', ['jadwal_id'=>$jadwal_uji_kompetensi_id, 'jenis_tes'=>$jenis_tes])
                ]);
            }
        }
    }

    public function tambah_soal_wawancara(Request $request){
        $validator = Validator::make($request->all(), [
            'ttd_asesor' => 'required',
        ],[
            'ttd_asesor.required'=> 'Wajib diisi',
        ]);

        $jadwal_uji_kompetensi_id = $request->input('jadwal_uji_kompetensi_id');
        $jenis_tes = 3;

        $pertanyaans = $request->input('wawancara_pertanyaan');
        // $jawaban = $request->input('wawancara_jawaban');
   
        $cek_jadwal = PelaksanaanUjian::where('jadwal_uji_kompetensi_id', $jadwal_uji_kompetensi_id)->where('jenis_tes', $jenis_tes)->count();
        // $cek_jenis_tes_ada = PelaksanaanUjian::where('jadwal_uji_kompetensi_id', $jadwal_uji_kompetensi_id)
        //             ->where('jenis_tes', 2)->orWhere('jenis_tes', 0)->first();
        
        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            if($cek_jadwal <=0 ){
                PelaksanaanUjian::create([
                    'jadwal_uji_kompetensi_id' => $jadwal_uji_kompetensi_id,
                    'jenis_tes' => $jenis_tes,
                    'acc' => 1
                ]);
                for($x = 0; $x < count($pertanyaans); $x++){
                    $pertanyaan = $pertanyaans[$x];
                    $ambil_jawaban = null;
                    // $ambil_jawaban = $jawaban[$x];
                
                    if(trim($pertanyaan) == "" || is_null($pertanyaan))
                        continue;
                        Soal::create([
                            'jadwal_uji_kompetensi_id' => $jadwal_uji_kompetensi_id,
                            'pertanyaan' => $pertanyaan,
                            'jawaban' => $ambil_jawaban
                        ]);
                }
                AsesorUjiKompetensi::where('jadwal_uji_kompetensi_id', $jadwal_uji_kompetensi_id)->update([
                    'ttd_asesor' => $request->ttd_asesor
                ]);
                return response()->json([
                    'status'=>1,
                    'msg'   =>'Berhasil Membuat Soal Wawancara',
                    'jenis_tes' => $jenis_tes,
                    'jadwal_id' => $jadwal_uji_kompetensi_id
                    // 'route' => route('asesor.KelolaSoal.ReviewSoal', ['jadwal_id'=>$jadwal_uji_kompetensi_id, 'jenis_tes'=>$jenis_tes])
                ]);
            }
    
            elseif($cek_jadwal >0){
                    for($x = 0; $x < count($pertanyaans); $x++){
                        $pertanyaan = $pertanyaans[$x];
                        $ambil_jawaban = null;
                        // $ambil_jawaban = $jawaban[$x];
                    
                    if(trim($pertanyaan) == "" || is_null($pertanyaan))
                        continue;
    
                        Soal::create([
                        'jadwal_uji_kompetensi_id' => $jadwal_uji_kompetensi_id,
                        'pertanyaan' => $pertanyaan,
                        'jawaban' => $ambil_jawaban
                    ]);
                }
                AsesorUjiKompetensi::where('jadwal_uji_kompetensi_id', $jadwal_uji_kompetensi_id)->update([
                    'ttd_asesor' => $request->ttd_asesor
                ]);
                return response()->json([
                    'status'=>1,
                    'msg'   =>'Berhasil Membuat Soal Wawancara',
                    'jenis_tes' => $jenis_tes,
                    'jadwal_id' => $jadwal_uji_kompetensi_id
                    // 'route' => route('asesor.KelolaSoal.ReviewSoal', ['jadwal_id'=>$jadwal_uji_kompetensi_id, 'jenis_tes'=>$jenis_tes])
                ]);
            }
        }
      
    }

    public function review_soal($jadwal_id, $jenis_tes){
        $pelaksanaan_ujian = PelaksanaanUjian::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('jenis_tes', $jenis_tes)->first();
        $soal = Soal::where('jadwal_uji_kompetensi_id', $jadwal_id)->paginate(10);
        return view('asesor.kelola_soal.review_soal', compact('soal', 'pelaksanaan_ujian'));
    }

    public function ubah_soal(Request $request, $soal_id){
        $soal_id = $request->input('soal_id');
        $pertanyaans = $request->input('pertanyaan');
        $pilihan = $request->input('pilihan');
        $jawaban = $request->input('jawaban');

        $ambil_pilihan = 
            $pilihan[0] . ";" . 
            $pilihan[1] . ";" . 
            $pilihan[2] . ";" . 
            $pilihan[3];

        Soal::where('id', $soal_id)->update([
            'pertanyaan' => $pertanyaans,
            'pilihan' => $ambil_pilihan,
            'jawaban' => $jawaban
        ]);
        return redirect()->back();
    }

    public function ubah_soal_essay(Request $request, $soal_id){
        $soal_id = $request->input('soal_id');
        $pertanyaans = $request->input('pertanyaan');
        $jawaban = $request->input('jawaban');

        Soal::where('id', $soal_id)->update([
            'pertanyaan' => $pertanyaans,
            'jawaban' => $jawaban
        ]);
        return redirect()->back();
    }

    public function hapus_soal($soal_id){
        Soal::where('id', $soal_id)->delete();
        return response()->json([
            'status' => 1,
            'msg' => 'success'
        ]);
    }

    public function pilih_soal_salah($id){
        JawabanAsesi::where('id', $id)->update([
            'koreksi_jawaban' => 1
        ]);
        return response()->json([
            'status' => 1,
        ]);
    }
    
     public function pilih_soal_benar($id){
        JawabanAsesi::where('id', $id)->update([
            'koreksi_jawaban' => 2
        ]);
        return response()->json([
            'status' => 1,
        ]);
    }
}
