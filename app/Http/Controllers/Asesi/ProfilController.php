<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Models\Institusi;
use App\Models\Jurusan;
use App\Models\Pekerjaan;
use App\Models\Sertifikasi;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProfilController extends Controller
{
    private $path = 'asesi/dashboard/profile/';

    public function index()
    {
        $user = User::with('relasi_institusi', 'relasi_user_detail', 'relasi_jurusan', 'relasi_pekerjaan', 'relasi_sertifikasi')->find(auth()->user()->id);
        $institusi = Institusi::get(['id', 'nama_institusi']);
        $jurusan = Jurusan::get(['id', 'jurusan']);

        return view($this->path . 'index', [
            'where' => 'Profile',
            'data' => $user,
            'institusis' => $institusi,
            'jurusans' => $jurusan
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'institusi' => 'required',
            'jurusan' => 'required',
            'email' => 'required|email',
            'kualifikasi_pendidikan' => 'required',
        ], [
            'nama_lengkap.required' => 'Wajib diisi',
            'institusi.required' => 'Wajib diisi',
            'jurusan.required' => 'Wajib diisi',
            'email.required' => 'Wajib diisi',
            'kualifikasi_pendidikan.required' => 'Wajib diisi',
            'email.email' => 'Email tidak sesuai format',
        ]);

        if (!$validator->passes()) return response()->json([
            'status' => 0,
            'error' => $validator->errors()->toArray()
        ]);

        if ($request->foto_profil) {
            $image = $request->foto_profil->store('foto_profil');
            if ($request->foto_profil_old) {
                Storage::delete($request->foto_profil_old);
            }
        } else {
            $image = $request->foto_profil_old;
        }

        // tambah/edit user detail
        UserDetail::where('user_id', auth()->user()->id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'ktp_nik_paspor' => $request->ktp_nik_paspor,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kebangsaan' => $request->kebangsaan,
            'alamat_rumah' => $request->alamat_rumah,
            'nomor_hp' => $request->nomor_hp,
            'kualifikasi_pendidikan' => $request->kualifikasi_pendidikan,
            'foto' => $image
        ]);

        // tambah/edit user
        User::find(auth()->user()->id)->update([
            'institusi_id' => $request->institusi,
            'jurusan_id' => $request->jurusan
        ]);

        // tambah/edit pekerjaan
        if (is_null(Pekerjaan::where('user_id', auth()->user()->id)->first())) {
            // tambah pekerjaan
            Pekerjaan::create([
                'user_id' => auth()->user()->id,
                'nama_institusi' => $request->nama_institusi_pekerjaan,
                'jabatan' => $request->jabatan,
                'alamat_institusi' => $request->alamat_kantor_pekerjaan,
                'kode_pos' => $request->kode_pos_pekerjaan,
                'nomor_hp_institusi' => $request->nomor_hp_institusi_pekerjaan,
                'email_institusi' => $request->email_institusi_pekerjaan
            ]);
        } else {
            // edit pekerjaan
            Pekerjaan::where('user_id', auth()->user()->id)->update([
                'nama_institusi' => $request->nama_institusi_pekerjaan,
                'jabatan' => $request->jabatan,
                'alamat_institusi' => $request->alamat_kantor_pekerjaan,
                'kode_pos' => $request->kode_pos_pekerjaan,
                'nomor_hp_institusi' => $request->nomor_hp_institusi_pekerjaan,
                'email_institusi' => $request->email_institusi_pekerjaan
            ]);
        }

        // tambah/edit sertifikasi
        if (is_null(Sertifikasi::where('user_id', auth()->user()->id)->first())) {
            // tambah sertifikasi
            Sertifikasi::create([
                'user_id' => auth()->user()->id,
                'tujuan_asesmen' => $request->data_sertifikasi,
            ]);
        } else {
            // edit sertifikasi
            Sertifikasi::where('user_id', auth()->user()->id)->update([
                'tujuan_asesmen' => $request->data_sertifikasi,
            ]);
        }

        // return redirect()->route('asesi.Dashboard.Profile');
        return response()->json([
            'status' => 1,
            'msg' => 'Berhasil Menambahkan Data Profil'
        ]);
    }
}
