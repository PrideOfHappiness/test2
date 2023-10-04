<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\UkuranKarakterController;
use App\Http\Controllers\LetakSetirController;
use App\http\Controllers\PlatNomorController;
use App\Http\Controllers\FotoMobilController;

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
    return view('auth/login');
});
Route::get('/login', function () {
    return view('auth/login');
});

Auth::routes();

//Login menggunakan Google and Logout
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('loginGoogle');
Route::get('/auth/google/call-back', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/dashboard', 'DashboardController@index')->middleware('CheckRoleDashboard');

Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware(['Admin'])->group(function() {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('adminHome');
    Route::resource('/admin/jenis', JenisController::class);
    Route::resource('/admin/merek', MerekController::class);
    Route::post('/admin/merek/cari', [MerekController::class, 'search'])->name('search');
    Route::resource('/admin/mesin', MesinController::class);
    Route::resource('/admin/ukuranKarakter', UkuranKarakterController::class);
    Route::resource('/admin/setir', LetakSetirController::class);
    Route::resource('/admin/platNomor', PlatNomorController::class);
});

Route::middleware(['Users'])->group(function() {
    Route::get('/users/home', [HomeController::class, 'usersHome'])->name('usersHome');
    Route::get('/users/jenis', [JenisController::class, 'index_users'])->name("UsersJenisMobil");
    Route::get('/users/jenis/{id}', [JenisController::class, 'showUsers']);
    Route::get('/users/merek', [MerekController::class, 'index_users']);
    Route::post('/users/merek/cari', [MerekController::class, 'search'])->name('searchUsers');
    Route::get('/users/mesin', [MesinController::class, 'index_users']);
    Route::get('/users/ukuranKarakter', [UkuranKarakterController::class, 'indexUsers']);
    Route::resource('/users/fotoMobil', FotoMobilController::class);
    Route::post('/users/mobil/cari', [MerekController::class, 'search'])->name('search');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
