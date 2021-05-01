<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DisclaimerController;

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
    return view('landing');
});

Route::post('/', [HomeController::class, 'cek'])->name('post_cek');

Route::get('/akun/pengaturan', function () {
    return view('settings_profile');
});

Route::get('/akun/laporan/riwayat', [ReportController::class, 'index']);

Route::get('/akun/laporkan/bank', [ReportController::class, 'create_bank']);
Route::post('/akun/laporkan/bank', [ReportController::class, 'store_bank'])->name('post_bank');

Route::get('/akun/laporkan/telepon', [ReportController::class, 'create_phone']);
Route::post('/akun/laporkan/telepon', [ReportController::class, 'store_phone'])->name('post_phone');

Route::get('/akun/sanggahan/riwayat', [DisclaimerController::class, 'index']);

Route::get('/akun/sanggahan/buat', [DisclaimerController::class, 'create']);
Route::post('/akun/sanggahan/buat', [DisclaimerController::class, 'store'])->name('post_disclaimer');

Route::get('/akun/verifikasi', function () {
    return view('user_verify');
});

Route::get('/akun/masuk', function () {
    return view('sign-in');
});

Route::get('/akun/daftar', function () {
    return view('sign-up');
});

Route::get('/akun/reset', function () {
    return view('forgot-password');
});

Route::get('/akun/laporkan', function () {
    return redirect('/akun/laporkan/bank');
});

Route::get('/cek/rekening/{no_rek}', [HomeController::class, 'get_cek_rek'])->name('cek_rekening');

Route::get('/cek/telepon/{no_telepon}', [HomeController::class, 'get_cek_telp'])->name('cek_telepon');

Route::get('/404', function () {
    return view('404');
})->name('show_404');