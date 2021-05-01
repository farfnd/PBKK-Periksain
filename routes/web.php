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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/', [HomeController::class, 'show'])->name('post_periksa');

Route::get('/akun/pengaturan', function () {
    return view('settings_profile');
})->name('get_account_setting')->name('get_account_setting');

Route::post('/akun/pengaturan', function () {
    return view('settings_profile');
})->name('get_account_setting')->name('post_account_setting');

Route::get('/akun/laporan/riwayat', [ReportController::class, 'index'])->name('get_report_history');

Route::get('/akun/laporkan/rekening', [ReportController::class, 'create_bank'])->name('get_bank_form');
Route::post('/akun/laporkan/rekening', [ReportController::class, 'store_bank'])->name('post_bank');

Route::get('/akun/laporkan/telepon', [ReportController::class, 'create_phone'])->name('get_phone_form');
Route::post('/akun/laporkan/telepon', [ReportController::class, 'store_phone'])->name('post_phone');

Route::get('/akun/sanggahan/riwayat', [DisclaimerController::class, 'index'])->name('get_disclaimer_history');

Route::get('/akun/sanggahan/buat', [DisclaimerController::class, 'create'])->name('get_disclaimer_form');
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
    return redirect()->route('get_bank_form');
});

Route::get('/akun/sanggahan', function () {
    return redirect()->route('get_disclaimer_form');
});

Route::get('/cek/rekening/{no_rek}', [HomeController::class, 'index_rek'])->name('cek_rekening');

Route::get('/cek/telepon/{no_telepon}', [HomeController::class, 'index_telp'])->name('cek_telepon');

Route::get('/404', function () {
    return view('404');
})->name('show_404');