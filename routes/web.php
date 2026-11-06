<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\MemberBukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;


/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| REGISTER
|--------------------------------------------------------------------------
*/

Route::get('/register/admin', [RegisterController::class, 'admin']);
Route::post('/register/admin', [RegisterController::class, 'storeAdmin']);

Route::get('/register/member', [RegisterController::class, 'member']);
Route::post('/register/member', [RegisterController::class, 'storeMember']);

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return redirect('/login/admin');
})->name('login');

Route::get('/login/admin', [LoginController::class, 'admin']);
Route::get('/login/member', [LoginController::class, 'member']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| SEMUA HALAMAN YANG HARUS LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | MEMBER
    |--------------------------------------------------------------------------
    */

    Route::get('/member', [MemberController::class, 'index']);

    Route::get('/verifikasi-npm', [MemberController::class, 'verifikasi']);
    Route::post('/verifikasi-npm', [MemberController::class, 'cekNpm']);

    Route::get('/riwayat', [MemberController::class, 'riwayat']);
    Route::get('/denda', [MemberController::class, 'denda']);
    Route::get('/reservasi', [MemberController::class, 'reservasi']);
    Route::get('/profil', [MemberController::class, 'profil']);
    Route::post('/profil/update', [MemberController::class, 'updateProfil']);

    /*
    |--------------------------------------------------------------------------
    | BUKU MEMBER
    |--------------------------------------------------------------------------
    */

    Route::get('/member/buku', [MemberBukuController::class, 'index']);
    Route::get('/member/detail/{id}', [MemberBukuController::class, 'detail']);
    Route::post('/member/pinjam/{id}', [MemberBukuController::class, 'pinjam']);

    /*
    |--------------------------------------------------------------------------
    | ADMIN BUKU
    |--------------------------------------------------------------------------
    */

    Route::resource('/buku', BukuController::class);

    Route::resource('/kategori', \App\Http\Controllers\KategoriController::class);


    /*
    |--------------------------------------------------------------------------
    | ADMIN ANGGOTA
    |--------------------------------------------------------------------------
    */

    Route::get('/anggota', [AnggotaController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | PEMINJAMAN
    |--------------------------------------------------------------------------
    */

    Route::resource('/peminjaman', PeminjamanController::class);

    /*
    |--------------------------------------------------------------------------
    | PENGEMBALIAN
    |--------------------------------------------------------------------------
    */

    Route::get('/pengembalian', [PengembalianController::class, 'index']);
    Route::post('/pengembalian/{id}', [PengembalianController::class, 'kembalikan']);

//Laporan
    Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/laporan/cetak', [LaporanController::class, 'cetak']);
    });