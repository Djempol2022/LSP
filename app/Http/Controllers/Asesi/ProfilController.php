<?php

namespace App\Http\Controllers\Asesi;

use Validator;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Jurusan;
use App\Models\Institusi;
use App\Models\Pekerjaan;
use App\Models\Kebangsaan;
use App\Models\UserDetail;
use App\Models\Sertifikasi;
use Illuminate\Http\Request;
use App\Models\KelengkapanPemohon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\KualifikasiPendidikan;
use App\Models\SkemaSertifikasi;
use App\Models\UnitKompetensi;

use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    private $path = 'asesi/dashboard/profile/';

    public function index()
    {
        $permohonan_user_sertifikasi = User::with(
            'relasi_institusi',
            'relasi_user_detail.relasi_kebangsaan',
            'relasi_user_detail.relasi_kualifikasi_pendidikan',
            'relasi_jurusan.relasi_skema_sertifikasi',
            'relasi_pekerjaan',
            'relasi_sertifikasi.relasi_tanda_tangan_admin',
            'relasi_kelengkapan_pemohon'
        )
            ->where('id', Auth::user()->id)->first();

        $user = User::with(
            'relasi_pekerjaan',
            'relasi_user_detail.relasi_kebangsaan',
            'relasi_user_detail.relasi_kualifikasi_pendidikan',
            'relasi_jurusan',
            'relasi_pekerjaan',
            'relasi_sertifikasi.relasi_tanda_tangan_admin',
            'relasi_kelengkapan_pemohon'
        )
            ->find(Auth::user()->id);

        $skema_sertifikasi = SkemaSertifikasi::where('jurusan_id', Auth::user()->jurusan_id)->first();
        $tujuan_sertifikasi = Sertifikasi::where('user_id', Auth::user()->id)->first();
        $unit_kompetensi = UnitKompetensi::where('skema_sertifikasi_id', $skema_sertifikasi->id)->get();
        $institusi = Institusi::get(['id', 'nama_institusi']);
        $jurusan = Jurusan::get(['id', 'jurusan']);
        $kualifikasi_pendidikan = KualifikasiPendidikan::get(['id', 'pendidikan']);
        $kebangsaan = Kebangsaan::get(['id', 'kebangsaan']);
        $date = Carbon::now();

        // pas_foto
        if (!empty($user->relasi_user_detail->foto)) {
            // $pas_foto = explode('-', $user->relasi_user_detail->foto, 2);
            // $pas_foto = $pas_foto[1];
            $pas_foto = $user->relasi_user_detail->foto;
        } else {
            $pas_foto = null;
        }

        // kartu_keluarga
        if (!empty($user->relasi_kelengkapan_pemohon->kartu_keluarga)) {
            $kartu_keluarga = explode('-', $user->relasi_kelengkapan_pemohon->kartu_keluarga, 2);
            $kartu_keluarga = $kartu_keluarga[1];
        } else {
            $kartu_keluarga = null;
        }

        // kartu_pelajar
        if (!empty($user->relasi_kelengkapan_pemohon->kartu_pelajar)) {
            $kartu_pelajar = explode('-', $user->relasi_kelengkapan_pemohon->kartu_pelajar, 2);
            $kartu_pelajar = $kartu_pelajar[1];
        } else {
            $kartu_pelajar = null;
        }

        // sertifikat_prakerin
        if (!empty($user->relasi_kelengkapan_pemohon->sertifikat_prakerin)) {
            $sertifikat_prakerin = explode('-', $user->relasi_kelengkapan_pemohon->sertifikat_prakerin, 2);
            $sertifikat_prakerin = $sertifikat_prakerin[1];
        } else {
            $sertifikat_prakerin = null;
        }

        // nilai_raport
        if (!empty($user->relasi_kelengkapan_pemohon->nilai_raport)) {
            $nilai_raport = explode('-', $user->relasi_kelengkapan_pemohon->nilai_raport, 2);
            $nilai_raport = $nilai_raport[1];
        } else {
            $nilai_raport = null;
        }

        return view($this->path . 'index', [
            'where' => 'Profile',
            'data' => $user,
            'institusis' => $institusi,
            'jurusans' => $jurusan,
            'kualifikasi_pendidikan' => $kualifikasi_pendidikan,
            'kebangsaan' => $kebangsaan,
            'pas_foto' => $pas_foto,
            'kartu_keluarga' => $kartu_keluarga,
            'kartu_pelajar' => $kartu_pelajar,
            'sertifikat_prakerin' => $sertifikat_prakerin,
            'nilai_raport' => $nilai_raport,
            'date' => $date,
            'tanggal' => $date->format('d F Y'),
            'data_permohonan_user_sertifikasi' => $permohonan_user_sertifikasi,
            'data_skema_sertifikasi' => $skema_sertifikasi,
            'tujuan_sertifikasi' => $tujuan_sertifikasi,
            'unit_kompetensi' => $unit_kompetensi
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'institusi' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' =>'required',
            'jurusan' => 'required',
            'email' => 'required|email',
            'pas_foto' => 'file|image|mimes:png,jpg,jpeg|max:2048',
            'kartu_keluarga' => 'file|mimes:pdf|max:2048',
            'kartu_pelajar' => 'file|mimes:pdf|max:2048',
            'sertifikat_prakerin' => 'file|mimes:pdf|max:2048',
            'nilai_raport' => 'file|mimes:pdf|max:2048',
        ], [
            'nama_lengkap.required' => 'Wajib diisi',
            'tanggal_lahir.required' => 'Wajib diisi',
            'institusi.required' => 'Wajib diisi',
            'jurusan.required' => 'Wajib diisi',
            'tempat_lahir.required' => 'Wajib diisi',
            'email.required' => 'Wajib diisi',
            'email.email' => 'Email tidak sesuai format',
            'pas_foto.file' => 'Wajib file',
            'pas_foto.image' => 'Wajib gambar',
            'pas_foto.mimes' => 'Foto wajib menggunakan format png, jpg, atau jpeg',
            'pas_foto.max' => 'Ukuran foto maksimal 2mb',
            'kartu_keluarga.file' => 'Wajib file',
            'kartu_keluarga.mimes' => 'File wajib menggunakan format pdf',
            'kartu_keluarga.max' => 'Ukuran file maksimal 2mb',
            'kartu_pelajar.file' => 'Wajib file',
            'kartu_pelajar.mimes' => 'File wajib menggunakan format pdf',
            'kartu_pelajar.max' => 'Ukuran file maksimal 2mb',
            'sertifikat_prakerin.file' => 'Wajib file',
            'sertifikat_prakerin.mimes' => 'File wajib menggunakan format pdf',
            'sertifikat_prakerin.max' => 'Ukuran file maksimal 2mb',
            'nilai_raport.file' => 'Wajib file',
            'nilai_raport.mimes' => 'File wajib menggunakan format pdf',
            'nilai_raport.max' => 'Ukuran file maksimal 2mb'
        ]);

        if (!$validator->passes()) return response()->json([
            'status' => 0,
            'error' => $validator->errors()->toArray()
        ]);

        // // file_foto
        if ($request->pas_foto) {
            $custom_file_name = auth()->user()->id . '-' . $request->file('pas_foto')->getClientOriginalName();
            $image = $request->file('pas_foto')->storeAs('pas_foto', $custom_file_name);
            if ($request->pas_foto_old) {
                Storage::delete($request->pas_foto_old);
            }
        } else {
            $image = $request->pas_foto_old;
        }

        // file foto with base64
        // if ($request->pas_foto) {
        //     $custom_file_name = auth()->user()->id . '-' . $request->file('pas_foto')->getClientOriginalName();
        //     $image = $request->file('pas_foto')->getRealPath();
        //     $imageData = file_get_contents($image);
        //     $imageMimeType = mime_content_type($image);
        //     $imageBase64Prefix = 'data:' . $imageMimeType . ';base64,';
        //     $imageBase64 = $imageBase64Prefix . base64_encode($imageData);
        // } else {
        //     $imageBase64 = $request->pas_foto_old;
        // }
        // end file foto base64, berhasil

        // tambah/edit user detail
        UserDetail::where('user_id', auth()->user()->id)->update([
            'ktp_nik_paspor' => $request->ktp_nik_paspor,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kebangsaan_id' => $request->kebangsaan,
            'alamat_rumah' => $request->alamat_rumah,
            'nomor_hp' => $request->nomor_hp,
            'kualifikasi_pendidikan_id' => $request->kualifikasi_pendidikan,
            'kode_pos' => $request->kode_pos,
            'ttd' => $request->ttd,
            'foto' => $image
        ]);

        // tambah/edit user
        User::find(auth()->user()->id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'institusi_id' => $request->institusi,
            'jurusan_id' => $request->jurusan
        ]);

        // tambah/edit pekerjaan
        if (is_null(Pekerjaan::where('user_id', auth()->user()->id)->first())) {
            // tambah pekerjaan
            Pekerjaan::create([
                'user_id' => auth()->user()->id,
                'nama_pekerjaan' => $request->nama_pekerjaan,
                'jabatan' => $request->jabatan,
                'alamat_pekerjaan' => $request->alamat_kantor_pekerjaan,
                'kode_pos' => $request->kode_pos_pekerjaan,
                'nomor_hp_pekerjaan' => $request->nomor_hp_institusi_pekerjaan,
                'email_pekerjaan' => $request->email_institusi_pekerjaan
            ]);
        } else {
            // edit pekerjaan
            Pekerjaan::where('user_id', auth()->user()->id)->update([
                'nama_pekerjaan' => $request->nama_pekerjaan,
                'jabatan' => $request->jabatan,
                'alamat_pekerjaan' => $request->alamat_kantor_pekerjaan,
                'kode_pos' => $request->kode_pos_pekerjaan,
                'nomor_hp_pekerjaan' => $request->nomor_hp_institusi_pekerjaan,
                'email_pekerjaan' => $request->email_institusi_pekerjaan
            ]);
        }

        // tambah/edit sertifikasi
        if (is_null(Sertifikasi::where('user_id', auth()->user()->id)->first())) {
            // tambah sertifikasi
            Sertifikasi::create([
                'user_id' => auth()->user()->id,
                'tujuan_asesi' => $request->data_sertifikasi,
                'ttd_asesi' => $request->ttd,
                'created_at' => $request->tanggal,
            ]);
        } else {
            // edit sertifikasi
            Sertifikasi::where('user_id', auth()->user()->id)->update([
                'tujuan_asesi' => $request->data_sertifikasi,
                'ttd_asesi' => $request->ttd,
                'created_at' => $request->tanggal,
            ]);
        }

        // file_kartu_keluarga
        if ($request->kartu_keluarga) {
            $custom_file_name = auth()->user()->id . '-' . $request->file('kartu_keluarga')->getClientOriginalName();
            $kartu_keluarga = $request->file('kartu_keluarga')->storeAs('kartu_keluarga', $custom_file_name);
            if ($request->kartu_keluarga_old) {
                Storage::delete($request->kartu_keluarga_old);
            }
        } else {
            $kartu_keluarga = $request->kartu_keluarga_old;
        }

        // file_kartu_pelajar
        if ($request->kartu_pelajar) {
            $custom_file_name = auth()->user()->id . '-' . $request->file('kartu_pelajar')->getClientOriginalName();
            $kartu_pelajar = $request->file('kartu_pelajar')->storeAs('kartu_pelajar', $custom_file_name);
            if ($request->kartu_pelajar_old) {
                Storage::delete($request->kartu_pelajar_old);
            }
        } else {
            $kartu_pelajar = $request->kartu_pelajar_old;
        }

        // file_sertifikat_prakerin
        if ($request->sertifikat_prakerin) {
            $custom_file_name = auth()->user()->id . '-' . $request->file('sertifikat_prakerin')->getClientOriginalName();
            $sertifikat_prakerin = $request->file('sertifikat_prakerin')->storeAs('sertifikat_prakerin', $custom_file_name);
            if ($request->sertifikat_prakerin_old) {
                Storage::delete($request->sertifikat_prakerin_old);
            }
        } else {
            $sertifikat_prakerin = $request->sertifikat_prakerin_old;
        }

        // file_nilai_raport
        if ($request->nilai_raport) {
            $custom_file_name = auth()->user()->id . '-' . $request->file('nilai_raport')->getClientOriginalName();
            $nilai_raport = $request->file('nilai_raport')->storeAs('nilai_raport', $custom_file_name);
            if ($request->nilai_raport_old) {
                Storage::delete($request->nilai_raport_old);
            }
        } else {
            $nilai_raport = $request->nilai_raport_old;
        }
        // tambah/edit kelengkapan pemohon
        if (is_null(KelengkapanPemohon::where('user_id', auth()->user()->id)->first())) {
            // tambah kelengkapan pemohon
            KelengkapanPemohon::create([
                'user_id' => auth()->user()->id,
                'kartu_keluarga' => $kartu_keluarga,
                'kartu_pelajar' => $kartu_pelajar,
                'sertifikat_prakerin' => $sertifikat_prakerin,
                'nilai_raport' => $nilai_raport,
            ]);
        } else {
            // edit kelengkapan pemohon
            KelengkapanPemohon::where('user_id', auth()->user()->id)->update([
                'kartu_keluarga' => $kartu_keluarga,
                'kartu_pelajar' => $kartu_pelajar,
                'sertifikat_prakerin' => $sertifikat_prakerin,
                'nilai_raport' => $nilai_raport,
            ]);
        }

        // return redirect()->route('asesi.Dashboard.Profile');
        return response()->json([
            'status' => 1,
            'msg' => 'Berhasil Menambahkan Data Profil'
        ]);
    }
}
