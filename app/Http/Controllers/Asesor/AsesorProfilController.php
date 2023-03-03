<?php

namespace App\Http\Controllers\Asesor;

use Validator;
use App\Models\User;
use App\Models\Jurusan;
use App\Models\Institusi;
use App\Models\Pekerjaan;
use App\Models\Kebangsaan;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\KualifikasiPendidikan;
use Illuminate\Support\Facades\Storage;


class AsesorProfilController extends Controller
{
    public function index()
    {
        $user = User::with(
            'relasi_pekerjaan',
            'relasi_user_detail.relasi_kebangsaan',
            'relasi_user_detail.relasi_kualifikasi_pendidikan',
            'relasi_jurusan',
        )
            ->find(Auth::user()->id);
        $institusi = Institusi::get(['id', 'nama_institusi']);
        $jurusan = Jurusan::get(['id', 'jurusan']);
        $kualifikasi_pendidikan = KualifikasiPendidikan::get(['id', 'pendidikan']);
        $kebangsaan = Kebangsaan::get(['id', 'kebangsaan']);
        // pas_foto
        if (!empty($user->relasi_user_detail->foto)) {
            $pas_foto = explode('-', $user->relasi_user_detail->foto, 2);
            $pas_foto = $pas_foto[1];
        } else {
            $pas_foto = null;
        }
        return view('asesor.profil.detail_profil', [
            'data' => $user, 'institusis' => $institusi,
            'jurusans' => $jurusan,
            'kualifikasi_pendidikan' => $kualifikasi_pendidikan,
            'kebangsaan' => $kebangsaan,
            'pas_foto' => $pas_foto,
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'jurusan' => 'required',
            'email' => 'required|email',
            'jenis_kelamin' => 'required',
            'pas_foto' => 'file|image|mimes:png,jpg,jpeg|max:2048',
        ], [
            'nama_lengkap.required' => 'Wajib diisi',
            'tanggal_lahir.required' => 'Wajib diisi',
            'tempat_lahir.required' => 'Wajib diisi',
            'jurusan.required' => 'Wajib diisi',
            'jenis_kelamin.required' => 'Wajib diisi',
            'email.required' => 'Wajib diisi',
            'email.email' => 'Email tidak sesuai format',
            'pas_foto.file' => 'Wajib file',
            'pas_foto.image' => 'Wajib gambar',
            'pas_foto.mimes' => 'Foto wajib menggunakan format png, jpg, atau jpeg',
            'pas_foto.max' => 'Ukuran foto maksimal 2mb',
        ]);
        if (!$validator->passes()) return response()->json([
            'status' => 0,
            'error' => $validator->errors()->toArray()
        ]);

        // file_foto
        if ($request->pas_foto) {
            $custom_file_name = auth()->user()->id . '-' . $request->file('pas_foto')->getClientOriginalName();
            $image = $request->file('pas_foto')->storeAs('pas_foto', $custom_file_name);
            if ($request->pas_foto_old) {
                Storage::delete($request->pas_foto_old);
            }
        } else {
            $image = $request->pas_foto_old;
        }

        // tambah/edit user detail
        UserDetail::where('user_id', auth()->user()->id)->update([
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat_rumah' => $request->alamat_rumah,
            'foto' => $image
        ]);

        // tambah/edit user
        User::find(auth()->user()->id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'jurusan_id' => $request->jurusan
        ]);

        // tambah/edit pekerjaan
        if (is_null(Pekerjaan::where('user_id', auth()->user()->id)->first())) {
            // tambah pekerjaan
            Pekerjaan::create([
                'user_id' => auth()->user()->id,
                'jabatan' => $request->jabatan,
            ]);
        } else {
            // edit pekerjaan
            Pekerjaan::where('user_id', auth()->user()->id)->update([
                'jabatan' => $request->jabatan,
            ]);
        }
        return response()->json([
            'status' => 1,
            'msg' => 'Berhasil Menambahkan Data Profil'
        ]);
    }
}