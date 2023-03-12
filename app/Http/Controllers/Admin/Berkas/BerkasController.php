<?php

namespace App\Http\Controllers\Admin\Berkas;

use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Models\AsesiUjiKompetensi;
use App\Models\DaftarTUKTerverifikasi;
use App\Models\DFHadirAsesi;
use App\Models\DFHadirAsesorPleno;
use App\Models\HasilVerifikasiTUK;
use App\Models\SKPenetapanTUK;
use App\Models\STVerifikasiTUK;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\X03STVerifikasiTUK;
use App\Models\X04BeritaAcara;
use App\Models\ZBAPecahRP;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Storage;

class BerkasController extends Controller
{
    public function index()
    {
        $year = AsesiUjiKompetensi::selectRaw('YEAR(updated_at) as year')
            ->groupBy('year')->orderBy('year', 'desc')
            ->get();
        return view('admin.berkas.index', [
            'where' => 'Berkas',
            'years' => $year
        ]);
    }

    public function table_surat_sk_penetapan(Request $request)
    {
        $data = SKPenetapanTUK::select([
            'sk_penetapan_tuk.*'
        ])->latest();

        $rekamFilter = $data->get()->count();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();
        $rekamTotal = $data->count();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    public function table_surat_daftar_tuk(Request $request)
    {
        $data = DaftarTUKTerverifikasi::select([
            'df_tuk_terverifikasi.*'
        ])->latest();

        $rekamFilter = $data->get()->count();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();
        $rekamTotal = $data->count();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    public function table_surat_hasil_verifikasi_tuk(Request $request)
    {
        $data = HasilVerifikasiTUK::select([
            'hasil_verifikasi_tuk.*'
        ])->latest();

        $rekamFilter = $data->get()->count();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();
        $rekamTotal = $data->count();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    public function table_surat_st_verifikasi_tuk(Request $request)
    {
        $data = STVerifikasiTUK::select([
            'st_verifikasi_tuk.*'
        ])->latest();

        $rekamFilter = $data->get()->count();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();
        $rekamTotal = $data->count();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    public function table_surat_df_hadir_asesi(Request $request)
    {
        $data = DFHadirAsesi::select([
            'df_hadir_asesi.*'
        ])->latest();

        $rekamFilter = $data->get()->count();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();
        $rekamTotal = $data->count();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    public function table_surat_x03_st_verifikasi_tuk(Request $request)
    {
        $data = X03STVerifikasiTUK::select([
            'x03_st_verifikasi_tuk.*'
        ])->latest();

        $rekamFilter = $data->get()->count();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();
        $rekamTotal = $data->count();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    public function table_surat_x04_berita_acara(Request $request)
    {
        $data = X04BeritaAcara::select([
            'x04_berita_acara.*'
        ])->latest();

        $rekamFilter = $data->get()->count();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();
        $rekamTotal = $data->count();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    public function table_surat_z_ba_pecah_rp(Request $request)
    {
        $data = ZBAPecahRP::select([
            'z_ba_pecah_rp.*'
        ])->where('status', 0)->latest();

        $rekamFilter = $data->get()->count();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();
        $rekamTotal = $data->count();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    public function table_surat_z_ba_rp(Request $request)
    {
        $data = ZBAPecahRP::select([
            'z_ba_pecah_rp.*'
        ])->where('status', 1)->latest();

        $rekamFilter = $data->get()->count();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();
        $rekamTotal = $data->count();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    public function table_surat_df_hadir_asesor_pleno(Request $request)
    {
        $data = DFHadirAsesorPleno::select([
            'df_hadir_asesor_pleno.*'
        ])->where('is_pleno', 1)->latest();

        $rekamFilter = $data->get()->count();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();
        $rekamTotal = $data->count();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    public function table_surat_df_hadir_asesor(Request $request)
    {
        $data = DFHadirAsesorPleno::select([
            'df_hadir_asesor_pleno.*'
        ])->where('is_pleno', 0)->latest();

        $rekamFilter = $data->get()->count();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->get();
        $rekamTotal = $data->count();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    public function show_sk_penetapan($id)
    {
        $sk_penetapan_tuk = SKPenetapanTUK::with(['relasi_sk_penetapan_tuk_child.relasi_nama_tuk', 'relasi_sk_penetapan_tuk_child.relasi_skema_sertifikasi'])->find($id);

        return response()->json($sk_penetapan_tuk);
    }

    public function hapus_sk_penetapan($id)
    {
        $delete_berkas = SKPenetapanTUK::find($id)->delete();

        if (!$delete_berkas) {
            return response()->json([
                'status' => 0,
                'msg' => 'Terjadi kesalahan, Gagal Menghapus'
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'msg' => 'Berhasil Menghapus'
            ]);
        }
    }

    public function cetak_sk_penetapan_pdf($id)
    {
        $sk_penetapan_tuk = SKPenetapanTUK::with(['relasi_sk_penetapan_tuk_child.relasi_nama_tuk', 'relasi_sk_penetapan_tuk_child.relasi_skema_sertifikasi'])->find($id);
        // return view('admin.berkas.sk_penetapan_tuk_terverifikasi.pdf', [
        //     'sk_penetapan_tuk' => $sk_penetapan_tuk,
        // ]);
        $pdf = PDF::loadview('admin.berkas.sk_penetapan_tuk_terverifikasi.pdf', compact('sk_penetapan_tuk'));
        return $pdf->download('SK Penetapan TUK NO SK: ' . $sk_penetapan_tuk->no_sk . '.pdf');
    }

    public function show_daftar_tuk($id)
    {
        $daftar_tuk = DaftarTUKTerverifikasi::with(['relasi_daftar_tuk_terverifikasi_child.relasi_nama_tuk', 'relasi_daftar_tuk_terverifikasi_child.relasi_skema_sertifikasi'])->find($id);

        return response()->json($daftar_tuk);
    }

    public function hapus_daftar_tuk($id)
    {
        $delete_berkas = DaftarTUKTerverifikasi::find($id)->delete();

        if (!$delete_berkas) {
            return response()->json([
                'status' => 0,
                'msg' => 'Terjadi kesalahan, Gagal Menghapus'
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'msg' => 'Berhasil Menghapus'
            ]);
        }
    }

    public function cetak_daftar_tuk_terverifikasi_pdf($id)
    {
        $daftar_tuk = DaftarTUKTerverifikasi::with(['relasi_daftar_tuk_terverifikasi_child.relasi_nama_tuk', 'relasi_daftar_tuk_terverifikasi_child.relasi_skema_sertifikasi'])->find($id);
        // dd($daftar_tuk);
        // return view('admin.berkas.daftar_tuk_terverifikasi.pdf', [
        //     'daftar_tuk_terverifikasi' => $daftar_tuk,
        // ]);
        $pdf = PDF::loadview('admin.berkas.daftar_tuk_terverifikasi.pdf', compact('daftar_tuk'));
        return $pdf->download('Daftar TUK Terverifikasi.pdf');
    }

    public function show_hasil_verifikasi_tuk($id)
    {
        $hasil_verifikasi_tuk = HasilVerifikasiTUK::with(['relasi_skema_sertifikasi.relasi_jurusan', 'relasi_sarana_prasarana.relasi_sarana_prasarana_sub.relasi_sarana_prasarana_sub2', 'relasi_penguji_hasil_verifikasi'])->find($id);

        return response()->json($hasil_verifikasi_tuk);
    }

    public function hapus_hasil_verifikasi_tuk($id)
    {
        $delete_berkas = HasilVerifikasiTUK::find($id)->delete();

        if (!$delete_berkas) {
            return response()->json([
                'status' => 0,
                'msg' => 'Terjadi kesalahan, Gagal Menghapus'
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'msg' => 'Berhasil Menghapus'
            ]);
        }
    }

    public function cetak_hasil_verifikasi_tuk_pdf($id)
    {
        $hasil_verifikasi_tuk = HasilVerifikasiTUK::with(['relasi_skema_sertifikasi.relasi_jurusan', 'relasi_sarana_prasarana.relasi_sarana_prasarana_sub.relasi_sarana_prasarana_sub2', 'relasi_penguji_hasil_verifikasi'])->find($id);
        // dd($hasil_verifikasi_tuk);
        // return view('admin.berkas.hasil_verifikasi_tuk.pdf', [
        //     'hasil_verifikasi_tuk' => $hasil_verifikasi_tuk,
        // ]);
        $pdf = PDF::loadview('admin.berkas.hasil_verifikasi_tuk.pdf', compact('hasil_verifikasi_tuk'));
        return $pdf->download('Hasil Verifikasi TUK.pdf');
    }

    public function show_st_verifikasi_tuk($id)
    {
        $st_verifikasi_tuk = STVerifikasiTUK::with(['relasi_skema_sertifikasi', 'relasi_nama_jabatan'])->find($id);

        return response()->json($st_verifikasi_tuk);
    }

    public function hapus_st_verifikasi_tuk($id)
    {
        $delete_berkas = STVerifikasiTUK::find($id)->delete();

        if (!$delete_berkas) {
            return response()->json([
                'status' => 0,
                'msg' => 'Terjadi kesalahan, Gagal Menghapus'
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'msg' => 'Berhasil Menghapus'
            ]);
        }
    }

    public function cetak_st_verifikasi_tuk_pdf($id)
    {
        $st_verifikasi_tuk = STVerifikasiTUK::with(['relasi_skema_sertifikasi', 'relasi_nama_jabatan'])->find($id);
        // dd($st_verifikasi_tuk);
        // return view('admin.berkas.st_verifikasi_tuk.pdf', [
        //     'st_verifikasi_tuk' => $st_verifikasi_tuk,
        // ]);
        $pdf = PDF::loadview('admin.berkas.st_verifikasi_tuk.pdf', compact('st_verifikasi_tuk'));
        return $pdf->download('ST Verifikasi TUK.pdf');
    }

    public function show_df_hadir_asesi($id)
    {
        $df_hadir_asesi = DFHadirAsesi::with(['relasi_skema_sertifikasi', 'relasi_df_hadir_asesi_child.relasi_institusi'])->find($id);

        return response()->json($df_hadir_asesi);
    }

    public function hapus_df_hadir_asesi($id)
    {
        $delete_berkas = DFHadirAsesi::find($id)->delete();

        if (!$delete_berkas) {
            return response()->json([
                'status' => 0,
                'msg' => 'Terjadi kesalahan, Gagal Menghapus'
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'msg' => 'Berhasil Menghapus'
            ]);
        }
    }

    public function cetak_df_hadir_asesi_pdf($id)
    {
        $df_hadir_asesi = DFHadirAsesi::with(['relasi_skema_sertifikasi', 'relasi_df_hadir_asesi_child.relasi_institusi'])->find($id);
        // dd($df_hadir_asesi);
        // return view('admin.berkas.df_hadir_asesi.pdf', [
        //     'df_hadir_asesi' => $df_hadir_asesi,
        // ]);
        $pdf = PDF::loadview('admin.berkas.df_hadir_asesi.pdf', compact('df_hadir_asesi'));
        return $pdf->download('Daftar Hadir Asesi.pdf');
    }

    public function show_x03_st_verifikasi_tuk($id)
    {
        $x03_st_verifikasi_tuk = X03STVerifikasiTUK::with(['relasi_nama_tuk', 'relasi_nama_jabatan'])->find($id);

        return response()->json($x03_st_verifikasi_tuk);
    }

    public function hapus_x03_st_verifikasi_tuk($id)
    {
        $delete_berkas = X03STVerifikasiTUK::find($id)->delete();

        if (!$delete_berkas) {
            return response()->json([
                'status' => 0,
                'msg' => 'Terjadi kesalahan, Gagal Menghapus'
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'msg' => 'Berhasil Menghapus'
            ]);
        }
    }

    public function cetak_x03_st_verifikasi_tuk_pdf($id)
    {
        $x03_st_verifikasi_tuk = X03STVerifikasiTUK::with(['relasi_nama_tuk', 'relasi_nama_jabatan'])->find($id);
        // dd($x03_st_verifikasi_tuk);
        // return view('admin.berkas.x03_st_verifikasi_tuk.pdf', [
        //     'x03_st_verifikasi_tuk' => $x03_st_verifikasi_tuk,
        // ]);
        $pdf = PDF::loadview('admin.berkas.x03_st_verifikasi_tuk.pdf', compact('x03_st_verifikasi_tuk'));
        return $pdf->download('X03 ST Verifikasi TUK.pdf');
    }

    public function show_x04_berita_acara($id)
    {
        $x04_berita_acara = X04BeritaAcara::with(['relasi_skema_sertifikasi.relasi_jurusan'])->find($id);

        return response()->json($x04_berita_acara);
    }

    public function hapus_x04_berita_acara($id)
    {
        $delete_berkas = X04BeritaAcara::find($id)->delete();

        if (!$delete_berkas) {
            return response()->json([
                'status' => 0,
                'msg' => 'Terjadi kesalahan, Gagal Menghapus'
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'msg' => 'Berhasil Menghapus'
            ]);
        }
    }

    public function cetak_x04_berita_acara_pdf($id)
    {
        $x04_berita_acara = X04BeritaAcara::with(['relasi_skema_sertifikasi.relasi_jurusan'])->find($id);
        // dd($x04_berita_acara);
        // return view('admin.berkas.x04_berita_acara.pdf', [
        //     'x04_berita_acara' => $x04_berita_acara,
        // ]);
        $pdf = PDF::loadview('admin.berkas.x04_berita_acara.pdf', compact('x04_berita_acara'));
        return $pdf->download('X04 Berita Acara.pdf');
    }

    public function show_z_ba_pecah_rp($id)
    {
        $z_ba_pecah_rp = ZBAPecahRP::with(['relasi_skema_sertifikasi', 'relasi_institusi', 'relasi_nama_tuk', 'relasi_nama_jabatan', 'relasi_bahasan_diskusi'])->find($id);

        return response()->json($z_ba_pecah_rp);
    }

    public function hapus_z_ba_pecah_rp($id)
    {
        $delete_berkas = ZBAPecahRP::find($id)->delete();

        if (!$delete_berkas) {
            return response()->json([
                'status' => 0,
                'msg' => 'Terjadi kesalahan, Gagal Menghapus'
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'msg' => 'Berhasil Menghapus'
            ]);
        }
    }

    public function cetak_z_ba_pecah_rp_pdf($id)
    {
        $z_ba_pecah_rp = ZBAPecahRP::with(['relasi_skema_sertifikasi', 'relasi_institusi', 'relasi_nama_tuk', 'relasi_nama_jabatan', 'relasi_bahasan_diskusi'])->find($id);
        // dd($z_ba_pecah_rp);
        // return view('admin.berkas.z_ba_pecah_rp.pdf', [
        //     'z_ba_pecah_rp' => $z_ba_pecah_rp,
        // ]);
        $pdf = PDF::loadview('admin.berkas.z_ba_pecah_rp.pdf', compact('z_ba_pecah_rp'));
        return $pdf->download('Z Berita Acara Pecah Rapat Pleno.pdf');
    }

    public function show_z_ba_rp($id)
    {
        $z_ba_rp = ZBAPecahRP::with(['relasi_skema_sertifikasi', 'relasi_institusi', 'relasi_nama_tuk', 'relasi_nama_jabatan', 'relasi_bahasan_diskusi'])->find($id);

        return response()->json($z_ba_rp);
    }

    public function cetak_z_ba_rp_pdf($id)
    {
        $z_ba_rp = ZBAPecahRP::with(['relasi_skema_sertifikasi', 'relasi_institusi', 'relasi_nama_tuk', 'relasi_nama_jabatan', 'relasi_bahasan_diskusi'])->find($id);
        // dd($z_ba_rp);
        // return view('admin.berkas.z_ba_rp.pdf', [
        //     'z_ba_rp' => $z_ba_rp,
        // ]);
        $pdf = PDF::loadview('admin.berkas.z_ba_rp.pdf', compact('z_ba_rp'));
        return $pdf->download('Z Berita Acara Rapat Pleno.pdf');
    }

    public function show_df_hadir_asesor_pleno($id)
    {
        $df_hadir_asesor_pleno = DFHadirAsesorPleno::with(['relasi_nama_jabatan'])->find($id);

        return response()->json($df_hadir_asesor_pleno);
    }

    public function hapus_df_hadir_asesor_pleno($id)
    {
        $delete_berkas = DFHadirAsesorPleno::find($id)->delete();

        if (!$delete_berkas) {
            return response()->json([
                'status' => 0,
                'msg' => 'Terjadi kesalahan, Gagal Menghapus'
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'msg' => 'Berhasil Menghapus'
            ]);
        }
    }

    public function cetak_df_hadir_asesor_pleno_pdf($id)
    {
        $df_hadir_asesor_pleno = DFHadirAsesorPleno::with(['relasi_nama_jabatan'])->find($id);
        // dd($df_hadir_asesor_pleno);
        // return view('admin.berkas.df_hadir_asesor_pleno.pdf', [
        //     'df_hadir_asesor_pleno' => $df_hadir_asesor_pleno,
        // ]);
        $pdf = PDF::loadview('admin.berkas.df_hadir_asesor_pleno.pdf', compact('df_hadir_asesor_pleno'));
        return $pdf->download('Daftar Hadir Asesor Pleno.pdf');
    }

    public function show_df_hadir_asesor($id)
    {
        $df_hadir_asesor = DFHadirAsesorPleno::with(['relasi_nama_jabatan'])->find($id);

        return response()->json($df_hadir_asesor);
    }

    public function cetak_df_hadir_asesor_pdf($id)
    {
        $df_hadir_asesor = DFHadirAsesorPleno::with(['relasi_nama_jabatan'])->find($id);
        // dd($df_hadir_asesor);
        // return view('admin.berkas.df_hadir_asesor.pdf', [
        //     'df_hadir_asesor' => $df_hadir_asesor,
        // ]);
        $pdf = PDF::loadview('admin.berkas.df_hadir_asesor.pdf', compact('df_hadir_asesor'));
        return $pdf->download('Daftar Hadir Asesor.pdf');
    }

    public function table_df_hadir_asesi_bnsp($year)
    {
        $user_asesi_id = AsesiUjiKompetensi::selectRaw('MAX(id) as id')
            ->whereYear('updated_at', $year)
            ->where('status_ujian_berlangsung', 2)
            ->groupBy('user_asesi_id')
            ->orderBy('user_asesi_id')
            ->get()
            ->map(function ($item) {
                return AsesiUjiKompetensi::find($item->id);
            });
        $user = User::with('relasi_user_detail', 'relasi_institusi')->whereIn('id', $user_asesi_id->pluck('user_asesi_id')->all())->get();
        return response()->json([
            'user' => $user,
        ]);
    }

    public function update_df_hadir_asesi_bnsp(Request $request)
    {
        if ($request->ajax()) {
            $fieldName = $request->input('field');
            $userId = $request->pk;
            $fieldValue = $request->value;

            switch ($fieldName) {
                case 'kode_kota':
                    UserDetail::where('user_id', $userId)->update([
                        'kode_kota' => $fieldValue,
                    ]);
                    break;
                case 'kode_provinsi':
                    UserDetail::where('user_id', $userId)->update([
                        'kode_provinsi' => $fieldValue,
                    ]);
                    break;
                case 'kode_pendidikan':
                    UserDetail::where('user_id', $userId)->update([
                        'kode_pendidikan' => $fieldValue,
                    ]);
                    break;
                case 'kode_pekerjaan':
                    UserDetail::where('user_id', $userId)->update([
                        'kode_pekerjaan' => $fieldValue,
                    ]);
                    break;
                case 'kode_jadwal':
                    UserDetail::where('user_id', $userId)->update([
                        'kode_jadwal' => $fieldValue,
                    ]);
                    break;
                case 'kode_sumber_anggaran':
                    UserDetail::where('user_id', $userId)->update([
                        'kode_sumber_anggaran' => $fieldValue,
                    ]);
                    break;
                case 'kode_kementerian':
                    UserDetail::where('user_id', $userId)->update([
                        'kode_kementerian' => $fieldValue,
                    ]);
                    break;
                default:
                    break;
            }
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function update_input_df_hadir_asesi_bnsp(Request $request)
    {
        if ($request->ajax()) {

            $user_asesi_id = AsesiUjiKompetensi::selectRaw('MAX(id) as id')
                ->whereYear('updated_at', $request->input('year'))
                ->where('status_ujian_berlangsung', 2)
                ->groupBy('user_asesi_id')
                ->orderBy('user_asesi_id')
                ->get()
                ->map(function ($item) {
                    return AsesiUjiKompetensi::find($item->id);
                });

            $user = User::with('relasi_user_detail', 'relasi_institusi')->whereIn('id', $user_asesi_id->pluck('user_asesi_id')->all())->get();

            $fieldName = $request->input('field');
            $userId = $request->pk;
            $fieldValue = $request->value;

            foreach ($user_asesi_id as $value) {
                UserDetail::where('user_id', $value->user_asesi_id)->update([
                    "$fieldName" => $fieldValue,
                ]);
            }

            return response()->json([
                'success' => true,
            ]);
        }
    }

    public function export_excel($year)
    {
        return Excel::download(new UserExport($year), 'users.xlsx');
    }

    public function table_sertifikat($year)
    {
        $user_asesi_id = AsesiUjiKompetensi::selectRaw('MAX(id) as id')
            ->whereYear('updated_at', $year)
            ->where('status_ujian_berlangsung', 2)
            ->groupBy('user_asesi_id')
            ->orderBy('user_asesi_id')
            ->get()
            ->map(function ($item) {
                return AsesiUjiKompetensi::find($item->id);
            });
        $user = User::with(['relasi_user_detail', 'relasi_institusi'])->whereIn('id', $user_asesi_id->pluck('user_asesi_id')->all())->get();
        return response()->json([
            'user' => $user,
        ]);
    }

    public function print_sertifikat($id)
    {
        $user = User::with(['relasi_user_detail', 'relasi_institusi', 'relasi_jurusan', 'relasi_asesi_uji_kompetensi.relasi_jadwal_uji_kompetensi.relasi_muk', 'relasi_skema_sertifikasi.relasi_unit_kompetensi'])->find($id);
        $lang = new GoogleTranslate();
        $jurusan = $lang->setSource('id')->setTarget('en')->translate($user->relasi_jurusan->jurusan);
        $muk = $lang->setSource('id')->setTarget('en')->translate($user->relasi_asesi_uji_kompetensi->relasi_jadwal_uji_kompetensi->relasi_muk->muk);

        // gambar
        // Get the file extension of the image
        $extension = pathinfo($user->relasi_user_detail->foto, PATHINFO_EXTENSION);

        // Determine the MIME type based on the file extension
        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                $mime_type = 'image/jpeg';
                break;
            case 'png':
                $mime_type = 'image/png';
                break;
            case 'gif':
                $mime_type = 'image/gif';
                break;
            default:
                $mime_type = 'application/octet-stream';
                break;
        }

        // Get the base64 encoded data of the image with the appropriate MIME type prefix
        $foto = 'data:' . $mime_type . ';base64,' . base64_encode(file_get_contents(public_path('storage/' . $user->relasi_user_detail->foto)));

        // return view('admin.berkas.sertifikat.pdf', [
        //     'user' => $user,
        //     'jurusan' => $jurusan,
        //     'muk' => $muk,
        //     'foto' => $foto
        // ]);
        $pdf = PDF::loadview('admin.berkas.sertifikat.pdf', compact(['user', 'jurusan', 'muk', 'foto']));
        return $pdf->download($user->nama_lengkap . '.pdf');
    }

    public function print_sertifikat_all($year)
    {
        $users = User::with(['relasi_user_detail', 'relasi_institusi', 'relasi_jurusan', 'relasi_asesi_uji_kompetensi.relasi_jadwal_uji_kompetensi.relasi_muk', 'relasi_skema_sertifikasi.relasi_unit_kompetensi'])
            ->whereIn('id', function ($query) use ($year) {
                $query->selectRaw('MAX(user_asesi_id) as id')
                    ->from('asesi_uji_kompetensi')
                    ->whereYear('updated_at', $year)
                    ->where('status_ujian_berlangsung', 2)
                    ->groupBy('user_asesi_id');
            })
            ->orderBy('nama_lengkap')
            ->get();
        $lang = new GoogleTranslate();
        $data = [];
        foreach ($users as $user) {
            $jurusan = $lang->setSource('id')->setTarget('en')->translate($user->relasi_jurusan->jurusan);
            $muk = $lang->setSource('id')->setTarget('en')->translate($user->relasi_asesi_uji_kompetensi->relasi_jadwal_uji_kompetensi->relasi_muk->muk);
            // gambar
            // Get the file extension of the image
            $extension = pathinfo($user->relasi_user_detail->foto, PATHINFO_EXTENSION);

            // Determine the MIME type based on the file extension
            switch ($extension) {
                case 'jpg':
                case 'jpeg':
                    $mime_type = 'image/jpeg';
                    break;
                case 'png':
                    $mime_type = 'image/png';
                    break;
                case 'gif':
                    $mime_type = 'image/gif';
                    break;
                default:
                    $mime_type = 'application/octet-stream';
                    break;
            }

            // Get the base64 encoded data of the image with the appropriate MIME type prefix
            $foto = 'data:' . $mime_type . ';base64,' . base64_encode(file_get_contents(public_path('storage/' . $user->relasi_user_detail->foto)));

            $data[] = compact(['user', 'jurusan', 'muk', 'foto']);
        }
        // dd($data);
        $pdf = PDF::loadView('admin.berkas.sertifikat.all-pdf', compact('data'));
        return $pdf->download('Semua sertifikat.pdf');
    }

    public function update_sertifikat(Request $request)
    {
        if ($request->ajax()) {
            UserDetail::where('user_id', $request->pk)->update([
                'no_sertifikat' => $request->value,
            ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }
}
