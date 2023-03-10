<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Jurusan;
use PDF;
use App\Models\Sertifikasi;
use App\Models\TandaTangan;
use Illuminate\Http\Request;
use App\Models\AsesmenMandiri;
use App\Models\UnitKompetensi;
use App\Models\SkemaSertifikasi;
use App\Http\Controllers\Controller;
use App\Models\AsesiUjiKompetensi;
use App\Models\HasilUmpanBalik;
use Illuminate\Support\Facades\Auth;
use App\Models\StatusUnitKompetensiAsesi;
use App\Models\UmpanBalikKomponen;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Validator;

class Admin_AssessmentController extends Controller
{
    public function assessment()
    {
        $jurusan = Jurusan::get(['id', 'jurusan']);
        return view('admin.assessment.assessment', ['jurusan' => $jurusan]);
    }

    public function data_rekap_berkas(Request $request){
        $data = User::select([
            'id', 'nama_lengkap', 'jurusan_id'
        ])->where('role_id','=','4');

        if($request->input('jurusan_pengguna')!=null){
            $data = $data->where('jurusan_id', $request->jurusan_pengguna);
        }
        
        // if($request->input('search.value')!=null){
        //     $data = $data->with('relasi_user', 'relasi_tanda_tangan_admin','relasi_user.relasi_jurusan', 'relasi_user.relasi_institusi')
        //         ->where(function($q)use($request){
        //             $q->whereRaw('LOWER(relasi_user.nama_lengkap) like ?',['%'.strtolower($request->input('search.value')).'%'])
        //             ->orWhereRaw('LOWER(relasi_user.relasi_jurusan.jurusan) like ?',['%'.strtolower($request->input('search.value')).'%']);
        //     });
        // }

        // if($request->input('data_jurusan')!=null){
        //     $data = $data->with('relasi_user')->whereRelation('relasi_user', 'jurusan_id', $request->data_jurusan);
        // }

        $rekamFilter = $data->get()->count();
        if ($request->input('length') != -1)
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $data = $data->where('role_id', 4)->with(
                'relasi_sertifikasi.relasi_tanda_tangan_admin','relasi_asesmen_mandiri',
                'relasi_user_asesi_ukom')->get();
            $rekamTotal = $data->count();

        return response()->json([
            'draw'=>$request->input('draw'),
            'data'=>$data,
            'recordsTotal'=>$rekamTotal,
            'recordsFiltered'=>$rekamFilter,
        ]);
    }

    public function detail_rekapan_permohonan_sertifikasi($id){
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
        return view('admin.assessment.permohonan_sertifikasi.detail_berkas_permohonan_sertifikasi',
                    ['data_permohonan_user_sertifikasi' => $permohonan_user_sertifikasi,
                    'pas_foto' => $pas_foto,
                    'kartu_keluarga' => $kartu_keluarga,
                    'kartu_pelajar' => $kartu_pelajar,
                    'sertifikat_prakerin' => $sertifikat_prakerin,
                    'nilai_raport' => $nilai_raport,
                    'tanggal' => $date->format('d F Y')]);
    }

    public function cetak_permohonan_sertifikasi($id){
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
       
        PDF::setOptions(['dpi' => 96, 'defaultFont' => 'times-roman']);
        $pdf = PDF::loadView('admin.assessment.permohonan_sertifikasi.pdf_berkas_permohonan_sertifikasi', [
                'data_permohonan_user_sertifikasi' => $permohonan_user_sertifikasi,
                'tanggal' => $date->format('d F Y')])
                ->setPaper("A4", "portrait");
        return $pdf->stream();
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
        
        // if($request->input('search.value')!=null){
        //     $data = $data->with('relasi_user', 'relasi_tanda_tangan_admin','relasi_user.relasi_jurusan', 'relasi_user.relasi_institusi')
        //         ->where(function($q)use($request){
        //             $q->whereRaw('LOWER(relasi_user.nama_lengkap) like ?',['%'.strtolower($request->input('search.value')).'%'])
        //             ->orWhereRaw('LOWER(relasi_user.relasi_jurusan.jurusan) like ?',['%'.strtolower($request->input('search.value')).'%']);
        //     });
        // }

        if($request->input('data_jurusan')!=null){
            $data = $data->with('relasi_user')->whereRelation('relasi_user', 'jurusan_id', $request->data_jurusan);
        }

        $rekamFilter = $data->get()->count();
        if ($request->input('length') != -1)
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $data = $data->with('relasi_tanda_tangan_admin','relasi_user.relasi_jurusan', 'relasi_user.relasi_institusi')->get();
            $rekamTotal = $data->count();

        return response()->json([
            'draw'=>$request->input('draw'),
            'data'=>$data,
            'recordsTotal'=>$rekamTotal,
            'recordsFiltered'=>$rekamFilter,
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
        $data = UnitKompetensi::with('relasi_skema_sertifikasi')->whereRelation('relasi_skema_sertifikasi','skema_sertifikasi_id', $id)->get();
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
            'no_reg' => 'required',
            'ttd_admin' => 'required',
            'status' => 'required',
        ],[
            'no_reg.required'=> 'Wajib diisi', // custom message
            'status.required'=> 'Wajib diisi', // custom message
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
                'nama_admin' => Auth::user()->nama_lengkap,
                'no_reg' => $request->no_reg,
                'ttd_admin' => $request->ttd_admin,
                'catatan' => $request->catatan,
                'status' => $request->status,
                'tanggal' => Carbon::now()
            ]);
        } else {
            // edit kelengkapan pemohon
            $tanda_tangan_admin = TandaTangan::where('sertifikasi_id', $request->sertifikasi_id)->update([
                'nama_admin' => Auth::user()->nama_lengkap,
                'no_reg' => $request->no_reg,
                'ttd_admin' => $request->ttd_admin,
                'catatan' => $request->catatan,
                'status' => $request->status,
                'tanggal' => Carbon::now()
            ]);
            if(!$tanda_tangan_admin){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Verifikasi Peserta Sertifikasi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Memverifikasi Peserta Sertifikasi'
                ]);
            }
        }
        }
    }
    // END TANDA TANGAN ADMIN

    // TAMBAH ATAU UBAH NOMOR URUT ASESI
    public function tambah_ubah_nomor_urut(Request $request){
        $validator = Validator::make($request->all(), [
            'no_reg'=>'required',
        ],[
            'no_reg.required'=> 'Wajib diisi'
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $no_reg_asesi = UserDetail::where('user_id', $request->user_asesi_id)->update([
                'no_reg' => $request->no_reg,
            ]);
            if(!$no_reg_asesi){
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
    public function data_asesi_asessment_mandiri(Request $request){
        $status_kompeten_asesi = StatusUnitKompetensiAsesi::select('user_asesi_id')->get();
        foreach($status_kompeten_asesi as $cek_user_asesi){
            $data_user_asesi = User::where('id', $cek_user_asesi->user_asesi_id)
                    ->with('relasi_role')
                    ->whereRelation('relasi_role', 'role', '=', 'asesi')
                    ->get();
        }
        return view('admin.assessment.asessment_mandiri.data_asessment_mandiri', [
            'status_kompeten_asesi'=>$status_kompeten_asesi]);
    }









    // ASESMEN MANDIRI
    public function data_pengajuan_asesmen_mandiri_acc(Request $request){
        // $data = Sertifikasi::select([
        //     'sertifikasi.*'
        // ]);


        // if ($request->input('length') != -1)
        //     $data = $data->skip($request->input('start'))->take($request->input('length'));
        //     $rekamTotal = $data->count();
        //     $data = $data->with('relasi_user_asesmen_mandiri.relasi_user_asesi.relasi_jurusan', 
        //                     'relasi_user_asesmen_mandiri.relasi_user_asesi.relasi_institusi')->get();
        // return response()->json([
        //     'data'=>$data,
        //     'recordsTotal'=>$rekamTotal,
        // ]);

        $data = AsesmenMandiri::select([
            'asesmen_mandiri.*'
        ]);
    
        $rekamFilter = $data->get()->count();
        if ($request->input('length') != -1)
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $rekamTotal = $data->count();
            $data = $data->with('relasi_user_asesi.relasi_jurusan', 
                                'relasi_user_asesi.relasi_institusi')->get();
        return response()->json([
            'draw'=>$request->input('draw'),
            'data'=>$data,
            'recordsTotal'=>$rekamTotal,
            'recordsFiltered'=>$rekamFilter,
        ]);
    }

    // DETAIL PENGESAHAN ASESMEN MANDIRI
    public function detail_pengesahan_asesmen_mandiri_acc($user_asesi_id, $jurusan_id){
        $sertifikasi = SkemaSertifikasi::with( 
            'relasi_jurusan',
            'relasi_unit_kompetensi', 'relasi_unit_kompetensi.relasi_unit_kompetensi_sub')
            ->where('jurusan_id', $jurusan_id)->first();

        $unit_kompetensi = UnitKompetensi::where('skema_sertifikasi_id', $sertifikasi->id)->get();
        $data_asesmen_mandiri = AsesmenMandiri::with('relasi_user_asesi', 'relasi_user_asesor')
            ->whereRelation('relasi_user_asesi', 'user_asesi_id', $user_asesi_id)
            ->first();
            
        return view('admin.assessment.asessment_mandiri.detail_asesmen_mandiri_acc', [
            'unit_kompetensi' => $unit_kompetensi,
            'sertifikasi'     => $sertifikasi,
            'data_asesmen_mandiri'   => $data_asesmen_mandiri,
            'user_asesi_id'   => $user_asesi_id
        ]);
    }

    public function detail_rekapan_asesmen_mandiri($user_asesi_id, $jurusan_id){
        $sertifikasi = SkemaSertifikasi::with( 
            'relasi_jurusan',
            'relasi_unit_kompetensi', 'relasi_unit_kompetensi.relasi_unit_kompetensi_sub')
            ->where('jurusan_id', $jurusan_id)->first();

        // $unit_kompetensi = UnitKompetensi::where('skema_sertifikasi_id', $sertifikasi->id)->get();

        $unit_kompetensi = UnitKompetensi::get(['id', 'skema_sertifikasi_id', 'kode_unit', 'judul_unit', 'jenis_standar'])->where('skema_sertifikasi_id', $sertifikasi->id);

        $data_asesmen_mandiri = AsesmenMandiri::with('relasi_user_asesi', 'relasi_user_asesor')
            ->whereRelation('relasi_user_asesi', 'user_asesi_id', $user_asesi_id)
            ->first();
            
        return view('admin.assessment.asessment_mandiri.detail_berkas_asesmen_mandiri', [
            'unit_kompetensi'       => $unit_kompetensi,
            'sertifikasi'           => $sertifikasi,
            'data_asesmen_mandiri'  => $data_asesmen_mandiri,
            'user_asesi_id'         => $user_asesi_id,
            'jurusan_id'            => $jurusan_id
        ]);
    }

    public function cetak_asesmen_mandiri($jurusan_id, $user_asesi_id){
        $sertifikasi = SkemaSertifikasi::with( 
            'relasi_jurusan',
            'relasi_unit_kompetensi', 'relasi_unit_kompetensi.relasi_unit_kompetensi_sub')
            ->where('jurusan_id', $jurusan_id)->first();

        $unit_kompetensi = UnitKompetensi::where('skema_sertifikasi_id', $sertifikasi->id)->get();
        $data_asesmen_mandiri = AsesmenMandiri::with('relasi_user_asesi', 'relasi_user_asesor')
            ->whereRelation('relasi_user_asesi', 'user_asesi_id', $user_asesi_id)
            ->first();
       
        // return view('admin.assessment.asessment_mandiri.pdf2_berkas_asesmen_mandiri', [
        //     'unit_kompetensi'       => $unit_kompetensi,
        //     'sertifikasi'           => $sertifikasi,
        //     'data_asesmen_mandiri'  => $data_asesmen_mandiri,
        //     'user_asesi_id'         => $user_asesi_id,
        //     'jurusan_id'            => $jurusan_id
        // ]);
        PDF::setOptions(['dpi' => 96, 'defaultFont' => 'times-roman']);
        $pdf = PDF::loadView('admin.assessment.asessment_mandiri.pdf_berkas_asesmen_mandiri', [
                    'unit_kompetensi'       => $unit_kompetensi,
                    'sertifikasi'           => $sertifikasi,
                    'data_asesmen_mandiri'  => $data_asesmen_mandiri,
                    'user_asesi_id'         => $user_asesi_id,
                    'jurusan_id'            => $jurusan_id
                ])
                ->setPaper("A4", "portrait");
        return $pdf->download('02 FR.APL.02.pdf');
    }

    // DETAIL REKAPAN UMPAN BALIK
    public function detail_rekapan_umpan_balik($id){
        $umpan_balik_asesi = AsesiUjiKompetensi::with(
            'relasi_user_asesi',
            'relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian', 
            'relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail')
            ->where('user_asesi_id', $id)->get();
        $umpan_balik_komponen = UmpanBalikKomponen::get();

        return view('admin.assessment.umpan_balik.detail_berkas_umpan_balik', [
            'umpan_balik_asesi'     => $umpan_balik_asesi,
            'umpan_balik_komponen'  => $umpan_balik_komponen,
            'user_asesi_id'         => $id
        ]);
    }

    public function cetak_rekapan_umpan_balik($id){
        $umpan_balik_asesi = AsesiUjiKompetensi::with(
            'relasi_user_asesi',
            'relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian', 
            'relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail')
            ->where('user_asesi_id', $id)->get();
        $umpan_balik_komponen = UmpanBalikKomponen::get();
       
        PDF::setOptions(['dpi' => 96, 'defaultFont' => 'times-roman']);
        $pdf = PDF::loadView('admin.assessment.umpan_balik.pdf_berkas_umpan_balik', [
                    'umpan_balik_asesi'     => $umpan_balik_asesi,
                    'umpan_balik_komponen'  => $umpan_balik_komponen,
                    'user_asesi_id'         => $id
                ])
                ->setPaper("A4", "portrait");
        return $pdf->download('18 FR.AK.03.UMPAN BALIK.pdf');
    }

}
