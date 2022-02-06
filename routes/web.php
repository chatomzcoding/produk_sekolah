<?php

use App\Http\Controllers\Admin\DatapokokController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Sistem\UserController;
use Illuminate\Support\Facades\Route;
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

// HOMEPAGE
Route::get('/', function ()
{
    return redirect('login');
});
/*
-------------------------------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {

    Route::get('/migrasi', [HomeController::class, 'migrasi']);
    // Umum
    Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('dashboard');

    // Route Admin
    Route::middleware(['admin'])->group(function () {
        // simpan route admin dibawah ini

        Route::resource('guru', GuruController::class);
        // SISTEM
        Route::resource('datapokok', DatapokokController::class);
    });

    Route::resource('user', UserController::class);
});

// --------------------------------------------------------------------------------------------
// PENGUJIAN DLL
// --------------------------------------------------------------------------------------------
// Cetak PDF dengan dompdf packgake
Route::get('/cetak/lihat','App\Http\Controllers\Pengujian\PrintpdfController@get');
Route::get('/cetak/download','App\Http\Controllers\Pengujian\PrintpdfController@out');
// --------------------------------------------------------------------------------------------

// ADEK SDA
Route::get('/halaman/{sesi}','App\Http\Controllers\HomeController@halaman');

