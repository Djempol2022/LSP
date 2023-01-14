<?php

use App\Http\Controllers\Admin\Admin_DashboardController;
use App\Http\Controllers\Admin\Admin_JadwalUjiKompetensi;
use App\Http\Controllers\Admin\Admin_MUKController;
use App\Http\Controllers\Admin\Admin_PengaturanController;
use App\Http\Controllers\Admin\Admin_PenggunaController;
use App\Http\Controllers\Admin\Admin_AssessmentController;
use App\Http\Controllers\Admin\Admin_DetailJadwalUjiKompetensi;
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
    });
    // Contoh Pemanggilan Route di Blade -> asesor.Dashboard
    Route::prefix('asesor')->name('asesor.')->middleware(['isAsesor'])->group(function () {
    });

    //ASESI
    // Contoh Pemanggilan Route di Blade -> asesi.Dashboard
    Route::prefix('asesi')->name('asesi.')->middleware(['isAsesi'])->group(function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'dashboard')->name('Dashboard');
            Route::post('dashboard', 'downloadWord')->name('DownloadWord');
            // Route::get('dashboard/profile', 'profile')->name('Dashboard.Profile');
        });

        Route::controller(PengaturanController::class)->group(function () {
            Route::get('pengaturan', 'pengaturan')->name('Pengaturan');
            Route::post('cg-password', 'cgPassword')->name('cgPassword');
        });

        Route::controller(AsesmenController::class)->group(function () {
            Route::get('assesment', 'assesment')->name('Assesment');
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
