<?php

use App\Http\Controllers\Admin\Admin_DashboardController;
use App\Http\Controllers\Admin\Admin_JadwalUjiKompetensi;
use App\Http\Controllers\Admin\Admin_MUKController;
use App\Http\Controllers\Admin\Admin_PengaturanController;
use App\Http\Controllers\Admin\Admin_PenggunaController;
use App\Http\Controllers\Admin\Admin_PenilaianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;

use App\Http\Controllers\Asesi\AsesmenController;
use App\Http\Controllers\Asesi\DashboardController;
use App\Http\Controllers\Asesi\PengaturanController;
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
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'login')->name('Login');
    Route::get('logout', 'logout')->name('Logout');
    Route::post('login', 'authenticate')->name('Auth');
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

        
        Route::controller(Admin_PenilaianController::class)->group(function () {
            Route::get('penilaian', 'penilaian')->name('Penilaian');
        });
        
        Route::controller(Admin_PengaturanController::class)->group(function () {
            Route::get('pengaturan', 'pengaturan')->name('Pengaturan');
            Route::get('jurusan', 'daftar_data_jurusan')->name('DaftarJurusan');
            Route::post('tambah-jurusan', 'tambah_jurusan')->name('TambahJurusan');
            Route::get('hapus-jurusan/{id}', 'hapus_jurusan');
            Route::post('ubah-jurusan', 'ubah_jurusan')->name('UbahJurusan');
            Route::any('data-jurusan', 'data_jurusan')->name('DataJurusan');
            Route::get('jurusan-id/{id}', 'jurusan_id');
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
            Route::any('data_jadwal_uji_kompetensi/{id}', 'data_jadwal_uji_kompetensi');
            Route::post('ubah-jadwal-uji-kompetensi', 'ubah_jadwal_uji_kompetensi')->name('UbahJadwalUjiKompetensi');
            // Route::get('detail-jadwal-uji-kompetensi/{id}', 'detail_jadwal_uji_kompetensi');

        }); 
        Route::controller(Admin_PenggunaController::class)->group(function () {
            // Route::get('pengguna', 'daftar_data_pengguna')->name('DaftarPengguna');
            Route::any('data-pengguna', 'data_pengguna')->name('DataPengguna');
            Route::get('hapus-pengguna/{id}', 'hapus_pengguna');
            Route::post('tambah-pengguna', 'tambah_pengguna')->name('TambahPengguna');
            Route::post('ubah-mukpengguna', 'ubah_pengguna')->name('UbahPengguna');
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
            Route::get('dashboard/profile', 'profile')->name('Dashboard.Profile');
        });

        Route::controller(PengaturanController::class)->group(function () {
            Route::get('pengaturan', 'pengaturan')->name('Pengaturan');
            Route::post('cg-password', 'cgPassword')->name('cgPassword');
        });

        Route::controller(AsesmenController::class)->group(function () {
            Route::get('assesment', 'assesment')->name('Assesment');
            Route::get('soal', 'soal')->name('Assesment.Soal');
        });
    });

    //PENINJAU
    // Contoh Pemanggilan Route di Blade -> peninjau.Dashboard
    Route::prefix('peninjau')->name('peninjau.')->middleware(['isPeninjau'])->group(function () {
    });
});
