<?php

use App\Http\Controllers\Admin\DatapokokController;
use App\Http\Controllers\Admin\DokumenspkController;
use App\Http\Controllers\Admin\InfowebsiteController;
use App\Http\Controllers\Admin\KontrakController;
use App\Http\Controllers\Admin\PekerjaanController;
use App\Http\Controllers\Admin\PerusahaanController;
use App\Http\Controllers\Admin\TimlokusController;
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
    // Umum
    Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('dashboard');

    // Route Admin
    Route::middleware(['admin'])->group(function () {
        // simpan route admin dibawah ini

        Route::resource('timteknis', TimlokusController::class);
        Route::resource('pekerjaan', PekerjaanController::class);
        Route::resource('perusahaan', PerusahaanController::class);
        Route::resource('kontrak', KontrakController::class);
        Route::get('ajax/{sesi}', [KontrakController::class, 'ajax'])->name('pajax');
        Route::resource('dokumenspk', DokumenspkController::class);
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

