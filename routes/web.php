<?php

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

    //ADMIN
    // Contoh Pemanggilan Route di Blade -> admin.Dashboard
    Route::prefix('admin')->name('admin.')->middleware(['isAdmin'])->group(function () {
    });

    //ASESOR
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
