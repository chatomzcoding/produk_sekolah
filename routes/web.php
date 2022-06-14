<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\DatapokokController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TaglineController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
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


// ROUTE HOMEPAGE
Route::get('/', [HomepageController::class, 'index']);
Route::get('/homepage/artikel', [HomepageController::class , 'artikel']);
Route::get('/homepage/kontak', [HomepageController::class ,'kontak']);
Route::get('/homepage/profil', [HomepageController::class ,'profil']);
Route::get('/homepage/ppdb', [HomepageController::class ,'ppdb']);
Route::get('/homepage/artikel/{id}', [HomepageController::class ,'showartikel']);
Route::get('/infoprofil/{sesi}', [HomepageController::class ,'infoprofil']);
Route::get('/informasi/{sesi}', [HomepageController::class ,'informasi']);

Route::get('/homepage/program', [HomepageController::class ,'program']);
Route::get('/homepage/guru', [HomepageController::class ,'guru']);
Route::get('/homepage/fasilitas', [HomepageController::class ,'fasilitas']);
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
        Route::resource('slider', SliderController::class);
        Route::resource('program', ProgramController::class);
        Route::resource('tagline', TaglineController::class);
        Route::resource('fasilitas', FasilitasController::class);
        Route::resource('guru', GuruController::class);
        Route::resource('profil', ProfilController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('mapel', MapelController::class);
        Route::resource('artikel', ArtikelController::class);
        // SISTEM
        Route::resource('datapokok', DatapokokController::class);
    });

    Route::resource('user', UserController::class);
});