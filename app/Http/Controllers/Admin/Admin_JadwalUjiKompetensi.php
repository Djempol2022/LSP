<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Models\PelaksanaanUjian;
use App\Models\AsesiUjiKompetensi;
use App\Models\AsesorUjiKompetensi;
use App\Models\JadwalUjiKompetensi;
use App\Models\MateriUjiKompetensi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PeninjauUjiKompetensi;
use App\Models\NamaTempatUjiKompetensi;
use Illuminate\Support\Facades\Validator;

class Admin_JadwalUjiKompetensi extends Controller
{
    // VIEW JADWAL UJI KOMPETENSI
    public function tampilan_jadwal_uji_kompetensi(){
        $jurusan = Jurusan::get();
        $data_pelaksanaan_ujian = PelaksanaanUjian::with('relasi_jadwal_uji_kompetensi.relasi_muk');
        
        // dd($data_pelaksanaan_ujian->relasi_jadwal_uji_kompetensi->relasi_muk->jurusan_id);
        return view('admin.jadwal_uji_kompetensi.jadwal_uji_kompetensi', [
            'data_pelaksanaan_ujian'=>$data_pelaksanaan_ujian,
            'jurusan'=>$jurusan
        ]);
    }

    public function halaman_tambah_data_asesor_peninjau($id){
        // $jadwal_uji_kompetensi = JadwalUjiKompetensi::where('id', $id)->with('relasi_muk.relasi_jurusan')->first()->toArray();
        $data_jurusan = Jurusan::where('id', $id)->first();
        $muk = MateriUjiKompetensi::where('jurusan_id', $id)->get()->toArray();
        $user_asesi = User::where('jurusan_id', $id)->with('relasi_role')->whereRelation('relasi_role', 'role', '=', 'asesi')->get()->toArray();
        $user_asesor = User::where('jurusan_id', $id)->with('relasi_role')->whereRelation('relasi_role', 'role', '=', 'asesor')->get()->toArray();
        $user_peninjau = User::where('jurusan_id', $id)->with('relasi_role')->whereRelation('relasi_role', 'role', '=', 'peninjau')->get()->toArray();
        $data_jadwal_uji_kompetensi = JadwalUjiKompetensi::with('relasi_muk', 'relasi_user_asesor.relasi_user_asesor_detail', 
                'relasi_user_peninjau.relasi_user_peninjau_detail')->get();

        return view('admin.jadwal_uji_kompetensi.tambah_asesor_peninjau', 
            compact('muk','data_jurusan','user_asesi', 'user_asesor', 'user_peninjau', 'data_jadwal_uji_kompetensi'));
    }

        // DETAIL JADWAL UJI KOMPETENSI ACC
        public function halaman_detail_jadwal_uji_kompetensi_acc($jadwal_id, $jurusan_id){
            $data_pelaksanaan_ujian = PelaksanaanUjian::where('jadwal_uji_kompetensi_id',$jadwal_id)
                    ->with('relasi_jadwal_uji_kompetensi.relasi_muk', 
                        'relasi_jadwal_uji_kompetensi.relasi_user_asesor',
                        'relasi_jadwal_uji_kompetensi.relasi_user_peninjau', 
                        'relasi_jadwal_uji_kompetensi.relasi_user_asesi')
                    ->first();
            
            $user_asesi = User::where('jurusan_id', $jurusan_id)
                    ->with('relasi_role', 'relasi_user_asesi_ukom')
                    ->whereRelation('relasi_role', 'role', '=', 'asesi')
                    ->where('status_terlibat_uji_kompetensi', 0)
                    ->get();
            
            $user_asesi_kompetensi = AsesiUjiKompetensi::where('jadwal_uji_kompetensi_id', $jadwal_id)
                    ->with('relasi_user_asesi.relasi_role', 'relasi_jadwal_uji_kompetensi')
                    ->where('status_ujian_berlangsung', 0)
                    ->whereRelation('relasi_user_asesi.relasi_role', 'role', '=', 'asesi')
                    ->get();

            $tuk = NamaTempatUjiKompetensi::get(['id', 'nama_tuk']);
            return view('admin.jadwal_uji_kompetensi.detail_jadwal_uji_kompetensi_acc',[ 
                    'data_pelaksanaan_ujian' => $data_pelaksanaan_ujian, 
                    'user_asesi' => $user_asesi, 
                    'user_asesi_kompetensi' => $user_asesi_kompetensi,
                    'tuk' => $tuk]);
        }

        // DAFTAR ASESI MENGIKUTI UJI KOMPETENSI
        public function data_asesi_uji_kompetensi(Request $request, $id){
            $user_asesi_kompetensi = AsesiUjiKompetensi::where('jadwal_uji_kompetensi_id', $id)
                ->with('relasi_user_asesi.relasi_role', 'relasi_jadwal_uji_kompetensi')
                ->whereRelation('relasi_user_asesi.relasi_role', 'role', '=', 'asesi')->get();
                
                return response()->json([
                'data'=>$user_asesi_kompetensi
            ]);
        }

        // HAPUS ASESI MENGIKUTI UJI KOMPETENSI
        public function hapus_asesi_uji_kompetensi($asesi_id, $jadwal_id){
            $data_asesi_ukom = AsesiUjiKompetensi::where('user_asesi_id', $asesi_id)->first();
            User::where('id', $data_asesi_ukom->user_asesi_id)->update([
                'status_terlibat_uji_kompetensi' => 0
            ]);

            $hapus_asesi_uji_kompetensi = AsesiUjiKompetensi::where('jadwal_uji_kompetensi_id', $jadwal_id)
                ->where('user_asesi_id', $asesi_id)
                ->where('status_ujian_berlangsung', 0)->delete();
            
            if(!$hapus_asesi_uji_kompetensi){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menghapus Asesi Jadwal Uji Kompetensi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menghapus Asesi Jadwal Uji Kompetensi'
                ]);
            }
        }

        // TAMBAH ASESI KE JADWAL UJI KOMPETENSI ACC
        public function tambah_asesi_ke_ukom(Request $request){
            $id_jadwal_ukom = $request->jadwal_uji_kompetensi_id;
            $id_asesi = $request->user_asesi_id;
            $jenis_tes = $request->jenis_tes;

            foreach($id_asesi as $key => $no)
            {
                $input['jadwal_uji_kompetensi_id'] = $id_jadwal_ukom;
                $input['user_asesi_id'] = $id_asesi[$key];
                if($jenis_tes == 3){
                    $input['status_ujian_berlangsung'] = 3;
                }else{
                    $input['status_ujian_berlangsung'] = 0;
                }
                AsesiUjiKompetensi::create($input);

                User::where('id', $input['user_asesi_id'])->update([
                    'status_terlibat_uji_kompetensi' => 1
                ]);
            }
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menambahkan Asesi ke Jadwal Uji Kompetensi'
            ]);
            
        }

        // UBAH/PERBARUI JADWAL UJI KOMPETENSI
        public function ubah_jadwal_pelaksanaan_ujian(Request $request, $id){
        $waktu_mulai = Carbon::parse($request->waktu_mulai);
        $waktu_selesai = Carbon::parse($request->waktu_selesai);

        $validator = Validator::make($request->all(), [
            'sesi' => 'required',
            'tanggal' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'kelas' => 'required',
            'tuk_id' => 'required',
        ],[
            'sesi.required'=> 'Wajib diisi',
            'tanggal.required'=> 'Wajib diisi',
            'waktu_mulai.required'=> 'Wajib diisi',
            'waktu_selesai.required'=> 'Wajib diisi',
            'kelas.required'=> 'Wajib diisi',
            'tuk_id.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $ubah_jadwal_uji_kompetensi = PelaksanaanUjian::where('id', $id)->update([
                'sesi' => $request->sesi,
                'tanggal' => $request->tanggal,
                'waktu_mulai' => $request->tanggal.' '.$request->waktu_mulai,
                'waktu_selesai' => $request->tanggal.' '.$request->waktu_selesai,
                'kelas' => $request->kelas,
                'tuk_id' => $request->tuk_id,
                'total_waktu' => $waktu_mulai->diffInMinutes($waktu_selesai)
            ]);
            
            if(!$ubah_jadwal_uji_kompetensi){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menambah Jadwal Uji Kompetensi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menambahkan Jadwal Uji Kompetensi'
                ]);
            }
        }
        }

    // DATA MUK ASESOR PENINJAU
    public function data_muk_asesor_peninjau(Request $request, $id){
        // $data = PelaksanaanUjian::select([
        //     'pelaksanaan_ujian.*'
        // ]);

        // if($request->input('length')!=-1) 
        //     $data = $data->skip($request->input('start'))->take($request->input('length'));
            
        //     $rekamTotal = $data->count();
        //     $data = $data->with('relasi_jadwal_uji_kompetensi.relasi_muk', 'relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail', 
        //                 'relasi_jadwal_uji_kompetensi.relasi_user_peninjau.relasi_user_peninjau_detail')
        //                 ->whereRelation('relasi_jadwal_uji_kompetensi.relasi_muk', 'jurusan_id', $id)->get();
            
        //     return response()->json([
        //     'data'=>$data,
        //     'recordsTotal'=>$rekamTotal
        // ]);
        $data = JadwalUjiKompetensi::select([
            'jadwal_uji_kompetensi.*'
        ]);

        if($request->input('length')!=-1) 
        $data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->with('relasi_pelaksanaan_ujian','relasi_muk', 'relasi_user_asesor.relasi_user_asesor_detail', 
        'relasi_user_peninjau.relasi_user_peninjau_detail')
        ->whereRelation('relasi_muk', 'jurusan_id', $id)->get();
        $rekamTotal = $data->count();
        $rekamFilter = $data->count();
            
            return response()->json([
                'draw'=>$request->input('draw'),
                'data'=>$data,
                'recordsTotal'=>$rekamTotal,
                'recordsFiltered'=>$rekamFilter,
            ]);
    }
    // TAMBAH MUK ASESOR PENINJAU TERKAIT UJI KOMPETENSI
    public function tambah_muk_asesor_peninjau(Request $request){
        $validator = Validator::make($request->all(), [
            'muk_id'=>'required',
            'user_asesor_id' => 'required',
            'user_peninjau_id' => 'required',
        ],[
            'muk_id.required'=> 'Wajib diisi',
            'user_asesor_id.required'=> 'Wajib diisi',
            'user_peninjau_id.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $tambah_muk_asesor_peninjau = JadwalUjiKompetensi::create([
                'muk_id' => $request->muk_id,
            ]);

            AsesorUjiKompetensi::create([
                'jadwal_uji_kompetensi_id' => $tambah_muk_asesor_peninjau->id,
                'user_asesor_id' => $request->user_asesor_id
            ]);
            PeninjauUjiKompetensi::create([
                'jadwal_uji_kompetensi_id' => $tambah_muk_asesor_peninjau->id,
                'user_peninjau_id' => $request->user_peninjau_id
            ]);
            
            if(!$tambah_muk_asesor_peninjau){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menambah Jadwal Uji Kompetensi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menambahkan Jadwal Uji Kompetensi'
                ]);
            }
        }
    }

    // UBAH MUK ASESOR PENINJAU TERKAIT UJI KOMPETENSI
    public function ubah_muk_asesor_peninjau(Request $request){
        $validator = Validator::make($request->all(), [
            'muk_id'=>'required',
            'user_asesor_id' => 'required',
            'user_peninjau_id' => 'required',
        ],[
            'muk_id.required'=> 'Wajib diisi',
            'user_asesor_id.required'=> 'Wajib diisi',
            'user_peninjau_id.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $ubah_muk_asesor_peninjau = JadwalUjiKompetensi::where('id', $request->jadwal_uji_kompetensi_id)->update([
                'muk_id' => $request->muk_id,
            ]);

            AsesorUjiKompetensi::where('jadwal_uji_kompetensi_id', $request->jadwal_uji_kompetensi_id)
                ->where('user_asesor_id', $request->user_asesor_id)([
                'user_asesor_id' => $request->user_asesor_id
            ]);
            PeninjauUjiKompetensi::where('jadwal_uji_kompetensi_id', $request->jadwal_uji_kompetensi_id)
                ->where('user_peninjau_id', $request->user_peninjau_id)([
                'user_peninjau_id' => $request->user_peninjau_id
            ]);
            
            if(!$ubah_muk_asesor_peninjau){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menambah Jadwal Uji Kompetensi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menambahkan Jadwal Uji Kompetensi'
                ]);
            }
        }
    }

    public function hapus_muk_asesor_peninjau($id){
        $hapus_jadwal_uji_kompetensi = JadwalUjiKompetensi::find($id)->delete();
        if(!$hapus_jadwal_uji_kompetensi){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal Menghapus Jadwal Uji Kompetensi'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menghapus Jadwal Uji Kompetensi'
            ]);
        }
    }

    // BELUM DIGUNAKAN----------------------------
    // DATA JADWAL UJI KOMPETENSI 
    public function data_jadwal_uji_kompetensi(Request $request){
        // $data = JadwalUjiKompetensi::select('jadwal_uji_kompetensi.*')
        //         ->join('pelaksanaan_ujian', 'pelaksanaan_ujian.jadwal_uji_kompetensi_id', '=', 'jadwal_uji_kompetensi.id')
        //         ->with('relasi_muk.relasi_jurusan')
        //         ->get();
        $data = Jurusan::select([
            'jurusan.*'
        ]);
        // $data_jurusan = Jurusan::get();
        $data_pelaksanaan_ujian = PelaksanaanUjian::with('relasi_jadwal_uji_kompetensi.relasi_muk')->get();
        
    
        // $data = JadwalUjiKompetensi::with('relasi_muk.relasi_jurusan', 'relasi_pelaksanaan_ujian')->get();
        // if($request->input('length')!=-1) 
        //     $data = $data->skip($request->input('start'))->take($request->input('length'));
        //     $rekamTotal = $data->count();
        //    $data = $data->with('relasi_muk')->where('jurusan_id', $id)->get();
        //     $data = $data->with('relasi_muk')->whereRelation('relasi_muk', 'jurusan_id', $id)->get();
            // return $data;
            $data = $data->get()->toArray();
        return response()->json([
        // 'data_jurusan'=>$data_jurusan,
        'data'=>$data,
        'data2'=>$data_pelaksanaan_ujian
        ]);
    }

    // TAMBAH JADWAL UJI KOMPETENSI
    public function tambah_jadwal_uji_kompetensi(Request $request){
        $waktu_mulai = Carbon::parse($request->waktu_mulai);
        $waktu_selesai = Carbon::parse($request->waktu_selesai);
        
        $validator = Validator::make($request->all(), [
            'muk_id'=>'required',
            'sesi' => 'required',
            'tanggal' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'kelas' => 'required',
            'tempat' => 'required',
            'jenis_tes' => 'required'
        ],[
            'muk_id.required'=> 'Wajib diisi',
            'sesi.required'=> 'Wajib diisi',
            'tanggal.required'=> 'Wajib diisi',
            'waktu_mulai.required'=> 'Wajib diisi',
            'waktu_selesai.required'=> 'Wajib diisi',
            'kelas.required'=> 'Wajib diisi',
            'tempat.required'=> 'Wajib diisi',
            'jenis_tes.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $tambah_jadwal_uji_kompetensi = JadwalUjiKompetensi::create([
                'muk_id' => $request->muk_id,
                'sesi' => $request->sesi,
                'tanggal' => $request->tanggal,
                'waktu_mulai' => $request->waktu_mulai,
                'waktu_selesai' => $request->waktu_selesai,
                'kelas' => $request->kelas,
                'tempat' => $request->tempat,
                'jenis_tes' => $request->jenis_tes,
                'total_waktu' => $waktu_mulai->diffInMinutes($waktu_selesai)
            ]);
            
            if(!$tambah_jadwal_uji_kompetensi){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menambah Jadwal Uji Kompetensi'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menambahkan Jadwal Uji Kompetensi'
                ]);
            }
        }
    }

    // HAPUS DATA JADWAL UJI KOMPETENSI
    public function hapus_jadwal_uji_kompetensi($id){
        $hapus_jadwal_uji_kompetensi = JadwalUjiKompetensi::find($id)->delete();
        if(!$hapus_jadwal_uji_kompetensi){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal Menghapus Jadwal Uji Kompetensi'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menghapus Jadwal Uji Kompetensi'
            ]);
        }
    }
    // END BELUM DIGUNAKAN----------------------------
}
