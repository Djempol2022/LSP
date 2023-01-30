<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Sertifikasi;
use Illuminate\Http\Request;
use App\Models\UnitKompetensi;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\SkemaSertifikasi;
use App\Models\TandaTangan;
use Illuminate\Support\Facades\Validator;

class Admin_AssessmentController extends Controller
{
    public function assessment()
    {
        return view('admin.assessment.assessment');
    }

    // HALAMAN DAFTAQR PERMOHONAN ASESI UNTUK SERTIFIKASI
    public function permohonan_sertifikasi_kompetensi(){
        $jurusan = Jurusan::get();
        return view('admin.assessment.permohonan_sertifikasi.data_permohonan_sertifikasi', compact('jurusan'));
    }


    // DATA SKEMA SERTIFIKASI DAN UNIT KOMPETENSI BERDASARKAN FILTER JURUSAN
    public function data_sertifikasi_jurusan($id){
        $sertifikasi_jurusan = SkemaSertifikasi::with( 
            'relasi_jurusan',
            'relasi_unit_kompetensi')
            ->where('jurusan_id', $id)->first();
            
            return view('admin.assessment.permohonan_sertifikasi.data_sertifikasi_jurusan',
            ['sertifikasi_jurusan' => $sertifikasi_jurusan, 'jurusan_id' => $id]);
    }

    // DATA DAFTAR ASESI MENGAJUKAN SERTIFIKASI
    public function data_permohonan_sertifikasi_kompetensi(Request $request){
        $data = Sertifikasi::select([
            'sertifikasi.*'
        ]);
        
        if($request->input('data_jurusan')!=null){
            $data = $data->with('relasi_user')->whereRelation('relasi_user', 'jurusan_id', $request->data_jurusan);
        }

        if ($request->input('length') != -1)
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $rekamTotal = $data->count();
            $data = $data->with('relasi_user.relasi_jurusan')->with('relasi_user.relasi_institusi')->get()->toArray();
        return response()->json([
            'data'=>$data,
            'recordsTotal'=>$rekamTotal,
        ]);
    }

    // DATA DETAIL ASESI YANG MENGAJUKAN SERTIFIKASI
    public function detail_permohonan_sertifikasi_kompetensi($id){
        $permohonan_user_sertifikasi = User::with(
            'relasi_institusi', 
            'relasi_user_detail.relasi_kebangsaan', 
            'relasi_user_detail.relasi_kualifikasi_pendidikan',
            'relasi_jurusan.relasi_skema_sertifikasi', 
            'relasi_pekerjaan',
            'relasi_sertifikasi.relasi_tanda_tangan_admin',
            'relasi_kelengkapan_pemohon')
            ->where('id', $id)->first();
            $date = Carbon::now();
            $tanggal = $permohonan_user_sertifikasi->relasi_sertifikasi->tanggal;
        // pas_foto
        if (!empty($permohonan_user_sertifikasi->relasi_user_detail->foto)) {
            $pas_foto = explode('-', $permohonan_user_sertifikasi->relasi_user_detail->foto, 2);
            $pas_foto = $pas_foto[1];
        } else {
            $pas_foto = null;
        }

        // kartu_keluarga
        if (!empty($permohonan_user_sertifikasi->relasi_kelengkapan_pemohon->kartu_keluarga)) {
            $kartu_keluarga = explode('-', $permohonan_user_sertifikasi->relasi_kelengkapan_pemohon->kartu_keluarga, 2);
            $kartu_keluarga = $kartu_keluarga[1];
        } else {
            $kartu_keluarga = null;
        }

        // kartu_pelajar
        if (!empty($permohonan_user_sertifikasi->relasi_kelengkapan_pemohon->kartu_pelajar)) {
            $kartu_pelajar = explode('-', $permohonan_user_sertifikasi->relasi_kelengkapan_pemohon->kartu_pelajar, 2);
            $kartu_pelajar = $kartu_pelajar[1];
        } else {
            $kartu_pelajar = null;
        }

        // sertifikat_prakerin
        if (!empty($permohonan_user_sertifikasi->relasi_kelengkapan_pemohon->sertifikat_prakerin)) {
            $sertifikat_prakerin = explode('-', $permohonan_user_sertifikasi->relasi_kelengkapan_pemohon->sertifikat_prakerin, 2);
            $sertifikat_prakerin = $sertifikat_prakerin[1];
        } else {
            $sertifikat_prakerin = null;
        }

        // nilai_raport
        if (!empty($permohonan_user_sertifikasi->relasi_kelengkapan_pemohon->nilai_raport)) {
            $nilai_raport = explode('-', $permohonan_user_sertifikasi->relasi_kelengkapan_pemohon->nilai_raport, 2);
            $nilai_raport = $nilai_raport[1];
        } else {
            $nilai_raport = null;
        }
        return view('admin.assessment.permohonan_sertifikasi.detail_permohonan_sertifikasi',
                    ['data_permohonan_user_sertifikasi' => $permohonan_user_sertifikasi,
                    'pas_foto' => $pas_foto,
                    'kartu_keluarga' => $kartu_keluarga,
                    'kartu_pelajar' => $kartu_pelajar,
                    'sertifikat_prakerin' => $sertifikat_prakerin,
                    'nilai_raport' => $nilai_raport,
                    'tanggal' => $date->format('d F Y')]);
    }

    // UPDATE SKEMA JUDUL DAN NOMOR SERTIFIKASI
    public function update_judul_sertifikasi(Request $request){
        if ($request->ajax()) {
           SkemaSertifikasi::find($request->pk)
                ->update([
                    'judul_skema_sertifikasi'=> $request->value
                ]);
  
            return response()->json(['success' => true]);
        }
    }

    public function update_nomor_sertifikasi(Request $request){
        if ($request->ajax()) {
            SkemaSertifikasi::find($request->pk)
                ->update([
                    'nomor_skema_sertifikasi'=> $request->value
                ]);
  
            return response()->json(['success' => true]);
        }
    }
    // END UPDATE SKEMA JUDUL DAN NOMOR SERTIFIKASI

    // UNIT KOMPETENSI ---------------------------------
    public function data_unit_kompetensi($id){
        $data = UnitKompetensi::where('skema_sertifikasi_id', $id)->get();
        return response()->json([
            'data'=>$data,
        ]);
    }

    public function tambah_unit_kompetensi(Request $request){
        $validator = Validator::make($request->all(), [
            'kode_unit'=>'required',
            'judul_unit' => 'required',
            'jenis_standar' => 'required'
        ],[
            'kode_unit.required'=> 'Wajib diisi', // custom message
            'judul_unit.required'=> 'Wajib diisi', // custom message
            'jenis_standar.required'=> 'Wajib diisi' // custom message
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $tambah_unit_kompetensi = UnitKompetensi::create([
                'skema_sertifikasi_id' => $request->skema_sertifikasi_id,
                'kode_unit' => $request->kode_unit,
                'judul_unit' => $request->judul_unit,
                'jenis_standar' => $request->jenis_standar
            ]);
            
            if(!$tambah_unit_kompetensi){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal menambah Unit Kompetensi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil menambahkan Unit Kompetensi'
                ]);
            }
        }
    }

    public function ubah_unit_kompetensi(Request $request){
        $validator = Validator::make($request->all(), [
            'kode_unit'=>'required',
            'judul_unit' => 'required',
            'jenis_standar' => 'required'
        ],[
            'kode_unit.required'=> 'Wajib diisi', // custom message
            'judul_unit.required'=> 'Wajib diisi', // custom message
            'jenis_standar.required'=> 'Wajib diisi' // custom message
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{

            $ubah_uji_kompetensi = UnitKompetensi::where('id', $request->id)->update([
                'kode_unit' => $request->kode_unit,
                'judul_unit' => $request->judul_unit,
                'jenis_standar' => $request->jenis_standar
            ]);
            
            if(!$ubah_uji_kompetensi){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal mengubah Data Sertifikasi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil mengubah Data Sertifikasi'
                ]);
            }
        }
    }

    public function hapus_unit_kompetensi($id){
        $hapus_unit_kompetensi = UnitKompetensi::find($id)->delete();
        if(!$hapus_unit_kompetensi){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal menghapus Unit Kompetensi'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil menghapus Unit Kompetensi'
            ]);
        }
    }
    // END UNIT KOMPETENSI------------------------------------

    // TANDA TANGAN ADMIN
    public function tambah_ubah_persetujuan_admin(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_admin'=>'required',
            'no_reg' => 'required',
            'ttd_admin' => 'required',
        ],[
            'nama_admin.required'=> 'Wajib diisi', // custom message
            'no_reg.required'=> 'Wajib diisi', // custom message
            'ttd_admin.required'=> 'Wajib diisi', // custom message
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
        if (is_null(TandaTangan::where('sertifikasi_id', $request->sertifikasi_id)->first())) {
            // tambah kelengkapan pemohon
            $tanda_tangan_admin = TandaTangan::create([
                'sertifikasi_id' => $request->sertifikasi_id,
                'nama_admin' => $request->nama_admin,
                'no_reg' => $request->no_reg,
                'ttd_admin' => $request->ttd_admin,
                'catatan' => $request->catatan,
                'tanggal' => Carbon::now()
            ]);
        } else {
            // edit kelengkapan pemohon
            $tanda_tangan_admin = TandaTangan::where('sertifikasi_id', $request->sertifikasi_id)->update([
                'nama_admin' => $request->nama_admin,
                'no_reg' => $request->no_reg,
                'ttd_admin' => $request->ttd_admin,
                'catatan' => $request->catatan,
                'tanggal' => Carbon::now()
            ]);
            if(!$tanda_tangan_admin){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal menambah Materi Uji Kompetensi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Memverifikasi'
                ]);
            }
        }
        }
    }
    // END TANDA TANGAN ADMIN

    // TAMBAH ATAU UBAH NOMOR URUT ASESI
    public function tambah_ubah_nomor_urut(Request $request){
        $validator = Validator::make($request->all(), [
            'nomor_urut'=>'required',
        ],[
            'nomor_urut.required'=> 'Wajib diisi'
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $nomor_urut_asesi = Sertifikasi::where('id', $request->sertifikasi_id)->update([
                'nomor_urut' => $request->nomor_urut,
            ]);
            if(!$nomor_urut_asesi){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menambah Nomor Urut Asesi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menambah Nomor Urut Asesi'
                ]);
            }
        }
    }
}
