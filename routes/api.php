<?php

use App\Http\Controllers\Admin\Berkas\Api\DF_Hadir_Asesi_Controller_API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/admin/berkas/df-hadir-asesi-api', [DF_Hadir_Asesi_Controller_API::class, 'getDataBerkasDFHadirAsesi']);
