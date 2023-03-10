<?php

use App\Http\Controllers\Admin\Admin_DashboardController;
use App\Http\Controllers\Admin\Admin_JadwalUjiKompetensi;
use App\Http\Controllers\Admin\Admin_MUKController;
use App\Http\Controllers\Admin\Admin_PengaturanController;
use App\Http\Controllers\Admin\Admin_PenggunaController;
use App\Http\Controllers\Admin\Admin_AssessmentController;
use App\Http\Controllers\Admin\Admin_DetailJadwalUjiKompetensi;
use App\Http\Controllers\Admin\Berkas\BerkasController;
use App\Http\Controllers\Admin\Berkas\Daftar_TUK_Terverifikasi_Controller;
use App\Http\Controllers\Admin\Berkas\DF_Hadir_Asesi_Controller;
use App\Http\Controllers\Admin\Berkas\DF_Hadir_Asesor_Controller;
use App\Http\Controllers\Admin\Berkas\DF_Hadir_Asesor_Pleno_Controller;
use App\Http\Controllers\Admin\Berkas\SK_Penetapan_TUK_Terverifikasi_Controller;
use App\Http\Controllers\Admin\Berkas\Hasil_Verifikasi_TUK_Controller;
use App\Http\Controllers\Admin\Berkas\ST_Verifikasi_TUK_Controller;
use App\Http\Controllers\Admin\Berkas\X03_ST_verifikasi_TUK_controller;
use App\Http\Controllers\Admin\Berkas\X04_Berita_Acara_Controller;
use App\Http\Controllers\Admin\Berkas\Z_BA_Pecah_RP_Controller;
use App\Http\Controllers\Admin\Berkas\Z_BA_RP_Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;

use App\Http\Controllers\Asesi\AsesmenController;
use App\Http\Controllers\Asesi\DashboardController;
use App\Http\Controllers\Asesi\PengaturanController;
use App\Http\Controllers\Asesi\ProfilController;

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

    // LOGOUT
    Route::get('logout', [LoginController::class, 'logout'])->name('Logout');
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
        });
        Route::controller(Admin_MUKController::class)->group(function () {
            Route::any('data-muk', 'data_muk')->name('DataMUK');
            Route::get('muk', 'daftar_data_muk')->name('DaftarMUK');
            Route::post('tambah-muk', 'tambah_muk')->name('TambahMUK');
            Route::get('hapus-muk/{id}', 'hapus_muk');
            Route::post('ubah-muk', 'ubah_muk')->name('UbahMUK');
        });
        Route::controller(Admin_JadwalUjiKompetensi::class)->group(function () {
            Route::any('tampilan_jadwal-uji-kompetensi', 'tampilan_jadwal_uji_kompetensi')->name('TampilanJadwalUjiKompetensi');
            Route::post('tambah-jadwal-uji-kompetensi', 'tambah_jadwal_uji_kompetensi')->name('TambahJadwalUjiKompetensi');
            Route::get('hapus-jadwal-uji-kompetensi/{id}', 'hapus_jadwal_uji_kompetensi');
            Route::any('data-jadwal-uji-kompetensi/{id}', 'data_jadwal_uji_kompetensi');
            Route::post('ubah-jadwal-uji-kompetensi', 'ubah_jadwal_uji_kompetensi')->name('UbahJadwalUjiKompetensi');
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
    // Contoh Pemanggilan Route di Blade -> asesor.Dashboard
    Route::prefix('asesor')->name('asesor.')->middleware(['isAsesor'])->group(function () {
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
            Route::any('materi-uji-kompetensi', 'materi_uji_kompetensi')->name('MateriUjiKompetensi');
            Route::post('assesment', 'store')->name('Assesment.Store');
            Route::get('soal', 'soal')->name('Assesment.Soal');
        });

        Route::controller(ProfilController::class)->group(function () {
            Route::get('dashboard/profile', 'index')->name('Dashboard.Profile');
            Route::post('dashboard/profile', 'update')->name('Dashboard.Update');
        });
    });

    //PENINJAU
    // Contoh Pemanggilan Route di Blade -> peninjau.Dashboard
    Route::prefix('peninjau')->name('peninjau.')->middleware(['isPeninjau'])->group(function () {
    });
});
