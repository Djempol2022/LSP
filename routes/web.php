<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Asesi\AssesmentController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;

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
    return redirect('dashboard');
});



// LOGIN CONTROLLER
Route::controller(LoginController::class)->group(function () {
    // contoh penggunaan :
    // Route::~nama method~('~nama URI~', '~nama fungsi~')
    Route::get('login', 'login')->name('Login')->middleware('guest');
    Route::get('logout', 'logout')->name('Logout');
    Route::post('login', 'authenticate')->name('Auth');
});


// REGISTRASI CONTROLLER
Route::controller(RegistrasiController::class)->group(function () {
    Route::get('registrasi', 'registrasi')->name('Registrasi');
    Route::post('registrasi', 'store')->name('Register');
    Route::get('getJurusan/{sekolah_id}', 'getJurusan'); // DAPATKAN NAMA JURUSAN DARI FOREIGN KEY SEKOLAH
});


// DASHBOARD CONTROLLER
Route::controller(DashboardController::class)->group(function () {
    Route::get('dashboard', 'dashboard')->name('Dashboard')->middleware('auth');
    Route::get('dashboard/profile', 'profile')->name('Profile')->middleware('auth');
});


// ASSESMENT CONTROLLER
Route::controller(AssesmentController::class)->group(function () {
    Route::get('assesment', 'assesment')->name('Assesment')->middleware('auth');
});


// PENGATURAN CONTROLLER
Route::controller(PengaturanController::class)->group(function () {
    Route::get('pengaturan', 'pengaturan')->name('Pengaturan')->middleware('auth');
    Route::post('cg-password', 'cgPassword')->name('cgPassword')->middleware('auth');
});
