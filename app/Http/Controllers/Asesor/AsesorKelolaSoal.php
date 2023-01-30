<?php

namespace App\Http\Controllers\Asesor;

use Illuminate\Http\Request;
use App\Models\JadwalUjiKompetensi;
use App\Http\Controllers\Controller;
use App\Models\JenisSoal;
use App\Models\Jurusan;
use App\Models\MateriUjiKompetensi;
use App\Models\PelaksanaanUjian;
use App\Models\Soal;
use Illuminate\Support\Facades\Auth;

class AsesorKelolaSoal extends Controller
{
    public function kelola_soal(){
        return view('asesor.kelola_soal.kelola_soal');
    }
    
    public function pilih_jenis_soal($id){
        $jenis_soal = JenisSoal::get();
        return view('asesor.kelola_soal.jenis_soal', compact('jenis_soal', 'id'));
    }

    public function data_kelola_soal(){
        $data = JadwalUjiKompetensi::with('relasi_muk', 'relasi_user_asesor.relasi_user_asesor_detail', 
            'relasi_user_peninjau.relasi_user_peninjau_detail')
            ->whereRelation('relasi_muk', 'jurusan_id', Auth::user()->jurusan_id)->get();
            
            return response()->json([
            'data'=>$data,
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
        $jenis_tes = $request->input('jenis_tes');

        $pertanyaans = $request->input('pertanyaan');
        
        $pilihan = $request->input('pilihan');
        $jawaban = $request->input('jawaban');

        PelaksanaanUjian::create([
            'jadwal_uji_kompetensi_id' => $jadwal_uji_kompetensi_id,
            'jenis_tes' => $jenis_tes,
            'acc' => 0
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
        return redirect()->back();
    }

    public function tambah_soal_essay(Request $request){
        $jadwal_uji_kompetensi_id = $request->input('jadwal_uji_kompetensi_id');
        $jenis_tes = $request->input('jenis_tes');

        $pertanyaans = $request->input('essay_pertanyaan');
        $jawaban = $request->input('essay_jawaban');

        PelaksanaanUjian::create([
            'jadwal_uji_kompetensi_id' => $jadwal_uji_kompetensi_id,
            'jenis_tes' => $jenis_tes,
            'acc' => 0
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
        return redirect()->back();
    }

    public function tambah_soal_wawancara(Request $request){
        $jadwal_uji_kompetensi_id = $request->input('jadwal_uji_kompetensi_id');
        $jenis_tes = $request->input('jenis_tes');

        $pertanyaans = $request->input('wawancara_pertanyaan');
        $jawaban = $request->input('wawancara_jawaban');

        PelaksanaanUjian::create([
            'jadwal_uji_kompetensi_id' => $jadwal_uji_kompetensi_id,
            'jenis_tes' => $jenis_tes,
            'acc' => 0
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
        return redirect()->back();
    }
}
