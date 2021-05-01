<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

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

Route::get('/akun/pengaturan', function () {
    return view('settings_profile');
});

Route::get('/akun/laporkan/bank', [ReportController::class, 'create_bank']);
Route::post('/akun/laporkan/bank', [ReportController::class, 'store_bank'])->name('post_bank');

Route::get('/akun/laporkan/telepon', [ReportController::class, 'create_phone']);
Route::post('/akun/laporkan/telepon', [ReportController::class, 'store_phone'])->name('post_phone');

Route::get('/akun/laporan/riwayat', [ReportController::class, 'index']);

Route::get('/akun/sanggahan/buat', function () {
    return view('disclaimer_create');
});

Route::get('/akun/sanggahan/riwayat', function () {
    return view('disclaimer_history');
});

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

Route::get('/cek/rekening/{no_rek}', function ($no_rek) {
    return view('cek_rekening', ['no_rek' => $no_rek]);
});

Route::get('/cek/telepon/{no_telepon}', function ($no_telepon) {
    return view('cek_telepon', ['no_telepon' => $no_telepon]);
});


Route::get('/404', function () {
    return view('404');
})->name('show_404');