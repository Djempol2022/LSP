<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;

use App\Http\Controllers\Admin\Admin_UmpanBalik;
use App\Http\Controllers\Asesi\ProfilController;
use App\Http\Controllers\Asesor\AsesorDashboard;
use App\Http\Controllers\Asesi\AsesmenController;

use App\Http\Controllers\Asesor\AsesorKelolaSoal;
use App\Http\Controllers\Asesor\AsesorPengesahan;
use App\Http\Controllers\Admin\Admin_MUKController;
use App\Http\Controllers\Asesi\DashboardController;

use App\Http\Controllers\Asesi\PengaturanController;
use App\Http\Controllers\Asesi\UmpanBalikController;
use App\Http\Controllers\Asesor\AsesorSesiWawancara;
use App\Http\Controllers\Admin\Admin_PenggunaController;
use App\Http\Controllers\Admin\Admin_DashboardController;
use App\Http\Controllers\Admin\Admin_JadwalUjiKompetensi;
use App\Http\Controllers\Admin\Admin_AssessmentController;
use App\Http\Controllers\Admin\Admin_PengaturanController;

use App\Http\Controllers\Admin\Admin_DetailJadwalUjiKompetensi;
use App\Http\Controllers\Asesor\AsesorDaftarAsesiMenyelesaikanUjian;
use App\Http\Controllers\Admin\Berkas\BerkasController;
use App\Http\Controllers\Admin\Berkas\Daftar_TUK_Terverifikasi_Controller;
use App\Http\Controllers\Admin\Berkas\DF_Hadir_Asesor_Controller;
use App\Http\Controllers\Admin\Berkas\DF_Hadir_Asesor_Pleno_Controller;
use App\Http\Controllers\Admin\Berkas\SK_Penetapan_TUK_Terverifikasi_Controller;
use App\Http\Controllers\Admin\Berkas\Hasil_Verifikasi_TUK_Controller;
use App\Http\Controllers\Admin\Berkas\ST_Verifikasi_TUK_Controller;
use App\Http\Controllers\Admin\Berkas\X03_ST_verifikasi_TUK_controller;
use App\Http\Controllers\Admin\Berkas\X04_Berita_Acara_Controller;
use App\Http\Controllers\Admin\Berkas\Z_BA_Pecah_RP_Controller;
use App\Http\Controllers\Admin\Berkas\Z_BA_RP_Controller;
use App\Http\Controllers\Peninjau\PeninjauDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('asesi/dashboard');
});
// LOGIN CONTROLLER
Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('login', 'login')->name('Login');
        Route::get('logout', 'logout')->name('Logout');
        Route::post('login', 'authenticate')->name('Auth');
    });
});

// REGISTRASI CONTROLLER
Route::controller(RegistrasiController::class)->group(function () {
    Route::get('registrasi', 'registrasi')->name('Registrasi');
    Route::post('registrasi', 'store')->name('Register');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('jurusan-get', 'jurusan_get')->name('JurusanGet');

    // LOGOUT
    Route::get('logout', [LoginController::class, 'logout'])->name('Logout');
    Route::get('switch/{role}/{nama_role}', [LoginController::class, 'switch'])->name('Switch');
    Route::post('ubah-password', [Admin_PengaturanController::class, 'ubah_password'])->name('UbahPassword');

    //ADMIN
    // Contoh Pemanggilan Route di Blade -> admin.Dashboard
    Route::prefix('admin')->name('admin.')->middleware(['isAdmin'])->group(function () {
        Route::get('dashboard', [Admin_DashboardController::class, 'dashboard'])->name('Dashboard');
        Route::controller(Admin_AssessmentController::class)->group(function () {
            Route::get('assessment', 'assessment')->name('Assessment');
            Route::get('permohonan-sertifikasi', 'permohonan_sertifikasi_kompetensi')->name('PermohonanSertifikasi');
            Route::any('data-permohonan-sertifikasi-kompetensi', 'data_permohonan_sertifikasi_kompetensi')->name('DataPermohonanSertifikasiKompetensi');
            Route::get('detail-permohonan-sertifikasi-kompetensi/{id}', 'detail_permohonan_sertifikasi_kompetensi')->name('DetailPermohonanSertifikasiKompetensi');
            Route::get('detail-data-permohonan-sertifikasi-kompetensi/{id}', 'detail_data_permohonan_sertifikasi_kompetensi');
            Route::get('data-sertifikasi-jurusan/{id}', 'data_sertifikasi_jurusan');

            Route::post('update-judul-sertifikasi', 'update_judul_sertifikasi')->name('UpdateJudulSertifikasi');
            Route::post('update-nomor-sertifikasi', 'update_nomor_sertifikasi')->name('UpdateNomorSertifikasi');
            Route::post('tambah-unit-kompetensi', 'tambah_unit_kompetensi')->name('TambahUnitKompetensi');
            Route::any('data-unit-kompetensi/{id}', 'data_unit_kompetensi')->name('DataUnitKompetensi');
            Route::post('ubah-unit-kompetensi', 'ubah_unit_kompetensi')->name('UbahUnitKompetensi');
            Route::get('hapus-unit-kompetensi/{id}', 'hapus_unit_kompetensi');
            Route::post('persetujuan-admin', 'tambah_ubah_persetujuan_admin')->name('TambahOrUbahPersetujuanAdmin');
            Route::post('nomor-urut', 'tambah_ubah_nomor_urut')->name('TambahOrUbahNomorUrutAsesi');
            Route::any('data-asesi-asessment-mandiri', 'data_asesi_asessment_mandiri')->name('DataAsesiAsessmentMandiri');            
            Route::any('data-daftar-permohonan-sertifikasi-acc', 'data_permohonan_sertifikasi_kompetensi_acc')->name('DataPermohonanSertifikasiKompetensiAcc');            
            Route::any('data-pengajuan-asesmen-mandiri-acc', 'data_pengajuan_asesmen_mandiri_acc')->name('DataPengajuanAsesmenMandiri');
            Route::get('detail-data-pengajuan-asesmen-mandiri-acc/{id}/{jurusan_id}', 'detail_pengesahan_asesmen_mandiri_acc');
        });

        Route::controller(Admin_UmpanBalik::class)->group(function () {
            Route::any('data-umpan-balik-asesi', 'data_umpan_balik_asesi')->name('DataUmpanBalikAsesi');
            Route::get('umpan-balik', 'umpan_balik')->name('HalamanUmpanBalik');
            Route::any('daftar-data-umpan-balik', 'daftar_data_umpan_balik')->name('DaftarKomponenUmpanBalik');
            Route::get('buat-umpan-balik', 'halaman_buat_umpan_balik')->name('HalamanBuatKomponenUmpanBalik');
            Route::post('tambah-umpan-balik', 'tambah_umpan_balik')->name('TambahKomponenUmpanBalik');
            Route::get('hapus-umpan-balik/{id}', 'hapus_umpan_balik');
            Route::post('ubah-umpan-balik', 'ubah_umpan_balik')->name('UbahKomponenUmpanBalik');
        });        

        Route::controller(Admin_PengaturanController::class)->group(function () {
            Route::get('pengaturan', 'pengaturan')->name('Pengaturan');
            Route::get('jurusan', 'daftar_data_jurusan')->name('DaftarJurusan');
            Route::post('tambah-jurusan', 'tambah_jurusan')->name('TambahJurusan');
            Route::get('hapus-jurusan/{id}', 'hapus_jurusan');
            Route::post('ubah-jurusan', 'ubah_jurusan')->name('UbahJurusan');
            Route::any('data-jurusan', 'data_jurusan')->name('DataJurusan');
            Route::get('jurusan-id/{id}', 'jurusan_id');

            Route::get('institusi', 'daftar_data_institusi')->name('DaftarInstitusi');
            Route::post('tambah-institusi', 'tambah_institusi')->name('TambahInstitusi');
            Route::get('hapus-institusi/{id}', 'hapus_institusi');
            Route::post('ubah-institusi', 'ubah_institusi')->name('UbahInstitusi');
            Route::any('data-institusi', 'data_institusi')->name('DataInstitusi');

            Route::get('kualifikasi-pendidikan', 'daftar_data_kualifikasi_pendidikan')->name('DaftarKualifikasiPendidikan');
            Route::post('tambah-kualifikasi-pendidikan', 'tambah_kualifikasi_pendidikan')->name('TambahKualifikasiPendidikan');
            Route::get('hapus-kualifikasi-pendidikan/{id}', 'hapus_kualifikasi_pendidikan');
            Route::post('ubah-kualifikasi-pendidikan', 'ubah_kualifikasi_pendidikan')->name('UbahKualifikasiPendidikan');
            Route::any('data-kualifikasi-pendidikan', 'data_kualifikasi_pendidikan')->name('DataKualifikasiPendidikan');

            Route::any('data-nama-tuk', 'data_nama_tuk')->name('DataNamaTUK');
            Route::get('tempat-uji-kompetensi', 'halaman_nama_tuk')->name('HalamanDataNamaTUK');
            Route::any('daftar-data-nama-tuk', 'daftar_data_nama_tuk')->name('DaftarDataNamaTUK');
            Route::post('tambah-nama-tuk', 'tambah_nama_tuk')->name('TambahDataNamaTUK');
            Route::get('hapus-nama-tuk/{id}', 'hapus_nama_tuk');
            Route::post('ubah-nama-tuk', 'ubah_nama_tuk')->name('UbahDataNamaTUK');
        });
        Route::controller(Admin_MUKController::class)->group(function () {
            Route::any('data-muk', 'data_muk')->name('DataMUK');
            Route::get('muk', 'daftar_data_muk')->name('DaftarMUK');
            Route::post('tambah-muk', 'tambah_muk')->name('TambahMUK');
            Route::get('hapus-muk/{id}', 'hapus_muk');
            Route::post('ubah-muk', 'ubah_muk')->name('UbahMUK');
        });
        Route::controller(Admin_JadwalUjiKompetensi::class)->group(function () {
            Route::any('tampilan-jadwal-uji-kompetensi', 'tampilan_jadwal_uji_kompetensi')->name('TampilanJadwalUjiKompetensi');
            Route::post('tambah-jadwal-uji-kompetensi', 'tambah_jadwal_uji_kompetensi')->name('TambahJadwalUjiKompetensi');
            Route::get('hapus-jadwal-uji-kompetensi/{id}', 'hapus_jadwal_uji_kompetensi');
            Route::any('data-jadwal-uji-kompetensi', 'data_jadwal_uji_kompetensi')->name('DataJadwalUjiKompetensi');
            Route::post('ubah-jadwal-uji-kompetensi', 'ubah_jadwal_uji_kompetensi')->name('UbahJadwalUjiKompetensi');

            Route::get('tambah-asesor-peninjau/{id}', 'halaman_tambah_data_asesor_peninjau');
            Route::any('data-muk-asesor-peninjau/{id}', 'data_muk_asesor_peninjau');
            Route::post('tambah-muk-asesor-peninjau', 'tambah_muk_asesor_peninjau')->name('TambahMukAsesorPeninjau');
            Route::post('ubah-muk-asesor-peninjau', 'ubah_muk_asesor_peninjau')->name('UbahMukAsesorPeninjau');

            Route::get('detail-jadwal-uji-kompetensi-acc/{jadwal_id}/{jurusan_id}', 'halaman_detail_jadwal_uji_kompetensi_acc');
            Route::post('ubah-jadwal-pelaksanaan-ujian/{id}', 'ubah_jadwal_pelaksanaan_ujian')->name('UbahJadwalPelaksanaanUjian');
            Route::post('tambah-asesi-ukom', 'tambah_asesi_ke_ukom')->name('TambahDataAsesiKeJadwalUkom');
            Route::any('data-asesi-uji-kompetensi/{id}', 'data_asesi_uji_kompetensi');
            Route::get('hapus-asesi-uji-kompetensi/{asesi_id}/{jadwal_id}', 'hapus_asesi_uji_kompetensi');
        });

        Route::controller(Admin_DetailJadwalUjiKompetensi::class)->group(function () {
            Route::get('detail-jadwal-uji-kompetensi/{id}', 'detail_jadwal_uji_kompetensi')->name('DetailJadwalUjiKompetensi');
            Route::post('tambah-asesi', 'tambah_asesi')->name('TambahAsesi');
            Route::get('hapus-asesi/{id}', 'hapus_asesi');
            Route::any('data-asesi/{id}', 'data_asesi')->name('DataAsesi');
            Route::post('ubah-asesi', 'ubah_asesi')->name('UbahAsesi');

            Route::post('tambah-asesor', 'tambah_asesor')->name('TambahAsesor');
            Route::get('hapus-asesor/{id}', 'hapus_asesor');
            Route::any('data-asesor/{id}', 'data_asesor');
            Route::post('ubah-asesor', 'ubah_asesor')->name('UbahAsesor');

            Route::post('tambah-peninjau', 'tambah_peninjau')->name('TambahPeninjau');
            Route::get('hapus-peninjau/{id}', 'hapus_peninjau');
            Route::any('data-peninjau/{id}', 'data_peninjau')->name('DataPeninjau');
            Route::post('ubah-peninjau', 'ubah_peninjau')->name('UbahPeninjau');
        });

        Route::controller(Admin_PenggunaController::class)->group(function () {
            Route::get('pengguna', 'daftar_data_pengguna')->name('DaftarPengguna');
            Route::any('data-pengguna', 'data_pengguna')->name('DataPengguna');
            Route::get('hapus-pengguna/{id}', 'hapus_pengguna');
            Route::post('tambah-pengguna', 'tambah_pengguna')->name('TambahPengguna');
            Route::post('ubah-pengguna', 'ubah_pengguna')->name('UbahPengguna');
        });

        // Berkas
        Route::controller(SK_Penetapan_TUK_Terverifikasi_Controller::class)->group(function () {
            Route::get('berkas/sk-penetapan-tuk-terverifikasi', 'index')->name('Berkas.SKPenetapanTUKTerverifikasi');
            Route::post('berkas/sk-penetapan-tuk-terverifikasi', 'store')->name('Berkas.SKPenetapanTUKTerverifikasi.Add');
        });

        Route::controller(Daftar_TUK_Terverifikasi_Controller::class)->group(function () {
            Route::get('berkas/daftar-tuk-terverifikasi', 'index')->name('Berkas.DaftarTUKTerverifikasi');
            Route::post('berkas/daftar-tuk-terverifikasi', 'store')->name('Berkas.DaftarTUKTerverifikasi.Add');
        });

        Route::controller(Hasil_Verifikasi_TUK_Controller::class)->group(function () {
            Route::get('berkas/hasil-verifikasi-tuk', 'index')->name('Berkas.HasilVerifikasiTUK');
            Route::post('berkas/hasil-verifikasi-tuk', 'store')->name('Berkas.HasilVerifikasiTUK.Add');
        });

        Route::controller(ST_Verifikasi_TUK_Controller::class)->group(function () {
            Route::get('berkas/st-verifikasi-tuk', 'index')->name('Berkas.STVerifikasiTUK');
            Route::post('berkas/st-verifikasi-tuk', 'store')->name('Berkas.STVerifikasiTUK.Add');
        });

        Route::controller(X03_ST_verifikasi_TUK_controller::class)->group(function () {
            Route::get('berkas/x03-st-verifikasi-tuk', 'index')->name('Berkas.X03STVerifikasiTUK');
            Route::post('berkas/x03-st-verifikasi-tuk', 'store')->name('Berkas.X03STVerifikasiTUK.Add');
        });

        Route::controller(X04_Berita_Acara_Controller::class)->group(function () {
            Route::get('berkas/x04-berita-acara', 'index')->name('Berkas.X04BeritaAcara');
            Route::post('berkas/x04-berita-acara', 'store')->name('Berkas.X04BeritaAcara.Add');
        });

        Route::controller(Z_BA_Pecah_RP_Controller::class)->group(function () {
            Route::get('berkas/z-ba-pecah-rp', 'index')->name('Berkas.ZBAPecahRP');
            Route::post('berkas/z-ba-pecah-rp', 'store')->name('Berkas.ZBAPecahRP.Add');
        });

        Route::controller(Z_BA_RP_Controller::class)->group(function () {
            Route::get('berkas/z-ba-rp', 'index')->name('Berkas.ZBARP');
            Route::post('berkas/z-ba-rp', 'store')->name('Berkas.ZBARP.Add');
        });

        Route::controller(DF_Hadir_Asesor_Pleno_Controller::class)->group(function () {
            Route::get('berkas/df-hadir-asesor-pleno', 'index')->name('Berkas.DFHadirAsesorPleno');
            Route::post('berkas/df-hadir-asesor-pleno', 'store')->name('Berkas.DFHadirAsesorPleno.Add');
        });

        Route::controller(DF_Hadir_Asesor_Controller::class)->group(function () {
            Route::get('berkas/df-hadir-asesor', 'index')->name('Berkas.DFHadirAsesor');
            Route::post('berkas/df-hadir-asesor', 'store')->name('Berkas.DFHadirAsesor.Add');
        });

        Route::controller(DF_Hadir_Asesi_Controller::class)->group(function () {
            Route::get('berkas/df-hadir-asesi', 'index')->name('Berkas.DFHadirAsesi');
            Route::post('berkas/df-hadir-asesi', 'store')->name('Berkas.DFHadirAsesi.Add');
        });


        Route::controller(BerkasController::class)->group(function () {
            Route::get('berkas', 'index')->name('Berkas');

            Route::any('table-surat-sk-penetapan', 'table_surat_sk_penetapan')->name('SuratSKPenetapan');
            Route::get('table-surat-sk-penetapan/{id}', 'show_sk_penetapan')->name('SuratSKPenetapan.Show');
            Route::get('hapus-sk-penetapan-tuk-terverifikasi/{id}', 'hapus_sk_penetapan');

            Route::any('table-surat-daftar-tuk', 'table_surat_daftar_tuk')->name('SuratDaftarTUK');
            Route::get('table-surat-daftar-tuk/{id}', 'show_daftar_tuk')->name('SuratDaftarTUK.Show');
            Route::get('hapus-daftar-tuk-terverifikasi/{id}', 'hapus_daftar_tuk');

            Route::any('table-surat-hasil-verifikasi-tuk', 'table_surat_hasil_verifikasi_tuk')->name('SuratHasilVerifikasiTUK');
            Route::get('table-hasil-verifikasi-tuk/{id}', 'show_hasil_verifikasi_tuk')->name('SuratHasilVerifikasiTUK.Show');
            Route::get('hapus-hasil-verifikasi-tuk/{id}', 'hapus_hasil_verifikasi_tuk');

            Route::any('table-surat-st-verifikasi-tuk', 'table_surat_st_verifikasi_tuk')->name('SuratSTVerifikasiTUK');
            Route::get('table-surat-st-verifikasi-tuk/{id}', 'show_st_verifikasi_tuk')->name('SuratSTVerifikasiTUK.Show');
            Route::get('hapus-st-verifikasi-tuk/{id}', 'hapus_st_verifikasi_tuk');

            Route::any('table-surat-x03-st-verifikasi-tuk', 'table_surat_x03_st_verifikasi_tuk')->name('SuratX03STVerifikasiTUK');
            Route::get('table-surat-x03-st-verifikasi-tuk/{id}', 'show_x03_st_verifikasi_tuk')->name('SuratX03STVerifikasiTUK.Show');
            Route::get('hapus-x03-st-verifikasi-tuk/{id}', 'hapus_x03_st_verifikasi_tuk');

            Route::any('table-surat-x04-berita-acara', 'table_surat_x04_berita_acara')->name('SuratX04BeritaAcara');
            Route::get('table-surat-x04-berita-acara/{id}', 'show_x04_berita_acara')->name('SuratX04BeritaAcara.Show');
            Route::get('hapus-x04-berita-acara/{id}', 'hapus_x04_berita_acara');

            Route::any('table-surat-z-ba-pecah-rp', 'table_surat_z_ba_pecah_rp')->name('SuratZBAPecahRP');
            Route::get('table-surat-z-ba-pecah-rp/{id}', 'show_z_ba_pecah_rp')->name('SuratZBAPecahRP.Show');
            Route::get('hapus-z-ba-pecah-rp/{id}', 'hapus_z_ba_pecah_rp');

            Route::any('table-surat-z-ba-rp', 'table_surat_z_ba_rp')->name('SuratZBARP');
            Route::get('table-surat-z-ba-rp/{id}', 'show_z_ba_rp')->name('SuratZBARP.Show');

            Route::any('table-surat-df-hadir-asesor-pleno', 'table_surat_df_hadir_asesor_pleno')->name('SuratDFHadirAsesorPleno');
            Route::get('table-surat-df-hadir-asesor-pleno/{id}', 'show_df_hadir_asesor_pleno')->name('SuratDFHadirAsesorPleno.Show');
            Route::get('hapus-df-hadir-asesor-pleno/{id}', 'hapus_df_hadir_asesor_pleno');

            Route::any('table-surat-df-hadir-asesor', 'table_surat_df_hadir_asesor')->name('SuratDFHadirAsesor');
            Route::get('table-surat-df-hadir-asesor/{id}', 'show_df_hadir_asesor')->name('SuratDFHadirAsesor.Show');


            // PDF
            Route::get('cetak-sk-penetapan-tuk/{id}', 'cetak_sk_penetapan_pdf')->name('CetakSKPentapanTUKPDF');
            Route::get('cetak-daftar-tuk-terverifikasi/{id}', 'cetak_daftar_tuk_terverifikasi_pdf')->name('CetakDaftarTUKTerverifikasiPDF');
            Route::get('cetak-st-verifikasi-tuk/{id}', 'cetak_st_verifikasi_tuk_pdf')->name('CetakSTVerifikasiTUKPDF');
            Route::get('cetak-x03-st-verifikasi-tuk/{id}', 'cetak_x03_st_verifikasi_tuk_pdf')->name('CetakX03STVerifikasiTUKPDF');
            Route::get('cetak-x04-berita-acara/{id}', 'cetak_x04_berita_acara_pdf')->name('CetakX04BeritaAcaraPDF');
            Route::get('cetak-z-ba-pecah-rp/{id}', 'cetak_z_ba_pecah_rp_pdf')->name('CetakZBAPecahRPPDF');
            Route::get('cetak-df-hadir-asesor-pleno/{id}', 'cetak_df_hadir_asesor_pleno_pdf')->name('CetakDFHadirAsesorPlenoPDF');
            Route::get('cetak-df-hadir-asesor/{id}', 'cetak_df_hadir_asesor_pdf')->name('CetakDFHadirAsesorPDF');
        });
    });

    // ASESOR
    // Contoh Pemanggilan Route di Blade -> asesor.Dashboard
    Route::prefix('asesor')->name('asesor.')->middleware(['isAsesor'])->group(function () {
        Route::controller(AsesorDashboard::class)->group(function () {
            Route::get('dashboard', 'dashboard')->name('Dashboard');
            // Data Unit Kompetensi
            Route::any('data-unit-kompetensi-jurusan-asesor', 'data_unit_kompetensi_perjurusan_asesor');
            // Data Elemen atau Unit Kompetensi Sub
            Route::get('tambah-elemen-unit-kompetensi/{id}', 'halaman_tambah_elemen_unit_kompetensi');
            // Route::any('data-elemen-unit-kompetensi-jurusan-asesor/{id}', 'data_elemen_unit_kompetensi');
            Route::post('tambah-elemen', 'tambah_elemen_unit_kompetensi')->name('TambahElemen');
            Route::post('ubah-elemen', 'ubah_elemen_unit_kompetensi')->name('UbahElemen');
            Route::get('hapus-elemen/{id}', 'hapus_elemen_unit_kompetensi');
            // Data Isi Elemen
            Route::any('data-isi-elemen-unit-kompetensi-jurusan-asesor', 'data_isi_elemen_unit_kompetensi_perjurusan_asesor');
            Route::post('tambah-isi-elemen', 'tambah_isi_elemen_unit_kompetensi')->name('TambahIsiElemenKonten');
            Route::post('ubah-konten-elemen', 'ubah_konten_elemen')->name('UbahKontenElemen');
            Route::get('hapus-isi-elemen/{id}', 'hapus_isi_elemen_unit_kompetensi');
            Route::get('isi-sub-elemen/{id}', 'isi_sub_elemen_unit_kompetensi')->name('IsiSubElemen');
            Route::post('tambah-isi-sub-elemen', 'tambah_isi_sub_elemen_unit_kompetensi')->name('TambahIsiSubElemen');
            Route::any('data-peserta-pelaksanaan-uji-kompetensi', 'data_peserta_pelaksanaan_uji_kompetensi');
            Route::post('ubah-isi-2-elemen', 'ubah_isi_2_elemen')->name('UbahIsiElemen2');
            Route::get('hapus-isi-2-elemen/{id}', 'hapus_isi_2_elemen_unit_kompetensi');
            Route::any('data-list-asesi-peserta-uji-kompetensi/{jadwal_id}', 'data_list_asesi_peserta_uji_kompetensi');
        });

        Route::controller(AsesorPengesahan::class)->group(function () {
            // HALAMAN PENGESAHAN            
            Route::get('pengesahan-asesmen-mandiri', 'halaman_pengesahan_asesmen_mandiri')->name('HalamanPengesahanAsesmemMandiri');
            Route::any('data-asesmen-mandiri', 'data_asesmen_mandiri')->name('DataAsesmenMandiri');
            Route::get('detail-pengesahan-asesmen-mandiri/{user_asesi_id}', 'detail_pengesahan_asesmen_mandiri')->name('DetailPengesahanAsesmemMandiri');
            Route::put('asesor-acc-asesmen-mandiri/{id}', 'asesor_acc_asesmen_mandiri')->name('AsesorAccAsesmenMandiri');
            Route::get('batalkan-asesmen/{id}', 'batalkan_asesmen')->name('BatalkanAsesmen');
            Route::get('setujui-asesmen/{id}', 'setujui_asesmen')->name('SetujuiAsesmen');
        });

        Route::controller(AsesorKelolaSoal::class)->group(function () {
            // HALAMAN KELOLA SOAL
            Route::get('kelola-soal', 'kelola_soal')->name('KelolaSoal');            
            Route::any('data-kelola-soal', 'data_kelola_soal')->name('DataKelolaSoal');
            Route::get('jenis-soal/{id}', 'pilih_jenis_soal')->name('PilihJenisSoal');
            Route::get('buat-soal/{id}/{jenis_soal_id}', 'buat_soal')->name('BuatSoal');
            Route::post('tambah-soal-pilihan-ganda', 'tambah_soal_pilihan_ganda')->name('TambahSoalPilihanGanda');
            Route::post('tambah-soal-essay', 'tambah_soal_essay')->name('TambahSoalEssay');
            Route::post('tambah-soal-wawancara', 'tambah_soal_wawancara')->name('TambahSoalWawancara');
            Route::get('review-soal/{jadwal_id}/{jenis_tes}', 'review_soal')->name('ReviewSoal');
            Route::put('ubah-soal/{soal_id}', 'ubah_soal')->name('UbahSoal');
            Route::get('hapus-soal/{soal_id}', 'hapus_soal');
            Route::put('ubah-soal-essay/{soal_id}', 'ubah_soal_essay')->name('UbahSoalEssay');
            Route::get('pilih-jawaban-salah/{soal_id}', 'pilih_soal_salah')->name('PilihJawabanSalah');
            Route::get('pilih-jawaban-benar/{soal_id}', 'pilih_soal_benar')->name('PilihJawabanBenar');
        });

        Route::controller(AsesorDaftarAsesiMenyelesaikanUjian::class)->group(function () {
            Route::get('daftar-data-soal', 'halaman_daftar_ujian_asesi')->name('DaftarDataUjian');   
            Route::any('data-asesi-telah-selesai-ujian', 'data_asesi_telah_selesai_ujian');         
            Route::get('koreksi-jawaban/{jadwal_id}/{asesi_id}', 'halaman_koreksi_jawaban');
            Route::post('hasil-koreksi-jawaban/{jadwal_id}/{asesi_id}', 'hasil_koreksi_jawaban')->name('HasilKoreksiJawaban');
        });

        Route::controller(AsesorSesiWawancara::class)->group(function () {
            Route::any('data-asesi-ujian-wawancara', 'data_asesi_ujian_wawancara');
            Route::get('soal-wawancara/{jadwal_id}/{soal_id}/{asesi_id}', 'proses_wawancara_asesi')->name('ProsesWawancaraAsesi');
            Route::post('simpan-jawaban-asesi-wawancara', 'simpan_jawaban_asesi_wawancara')->name('SimpanJawabanAsesiWawancara');           
            Route::post('selesai-wawancara-ujian/{jadwal_id}/{asesi_id}', 'selesai_wawancara_ujian');  
        });
    });

    //ASESI
    // Contoh Pemanggilan Route di Blade -> asesi.Dashboard
    Route::prefix('asesi')->name('asesi.')->middleware(['isAsesi'])->group(function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'dashboard')->name('Dashboard');
            // Route::get('dashboard/profile', 'profile')->name('Dashboard.Profile');
        });

        Route::controller(PengaturanController::class)->group(function () {
            Route::get('pengaturan', 'pengaturan')->name('Pengaturan');
            Route::post('cg-password', 'cgPassword')->name('cgPassword');
        });

        Route::controller(AsesmenController::class)->group(function () {
            Route::get('assesment', 'index')->name('Assesment');
            Route::any('asesi-materi-uji-kompetensi', 'materi_uji_kompetensi')->name('AsesiMateriUjiKompetensi');
            Route::post('assesment', 'store')->name('Assesment.Store');
            Route::get('soal/{jadwal_id}/{soal_id}', 'pengerjaan_soal')->name('PengerjaanSoal');
            Route::post('simpan-jawaban-asesi', 'simpan_jawaban_asesi')->name('SimpanJawabanAsesi');         
            Route::post('selesai-mengerjakan-soal/{jadwal_id}', 'selesai_mengerjakan_soal');         
            Route::get('waktu-ujian-habis/{jadwal_id}', 'waktu_ujian_habis');
            Route::get('review-jawaban/{jadwal_id}', 'review_jawaban')->name('Assesment.ReviewJawaban');
        });

        Route::controller(ProfilController::class)->group(function () {
            Route::get('dashboard/profile', 'index')->name('Dashboard.Profile');
            Route::post('dashboard/profile', 'update')->name('Dashboard.Update');
        });

        Route::controller(UmpanBalikController::class)->group(function () {
            Route::post('umpan-balik-asesi', 'simpan_umpan_balik_asesi')->name('SimpanUmpanBalikAsesi');
        });
    });

    //PENINJAU
    // Contoh Pemanggilan Route di Blade -> peninjau.Dashboard
    Route::prefix('peninjau')->name('peninjau.')->middleware(['isPeninjau'])->group(function () {
        Route::controller(PeninjauDashboardController::class)->group(function () {
            Route::get('dashboard', 'dashboard')->name('Dashboard');
            Route::any('tampil-data-muk-asesor-peninjau', 'tampil_data_muk_asesor_peninjau');
            Route::get('peninjau-review-soal/{jadwal_id}/{jenis_tes}', 'peninjau_review_soal')->name('PeninjauReviewSoal');
            Route::get('peninjau-pengesahan-muk', 'pengesahan_muk')->name('PengesahanMuk');
        });
    });
});
