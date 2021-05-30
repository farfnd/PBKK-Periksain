<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DisclaimerController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/akun/pengaturan', [UserController::class, 'show_settings'])->middleware('auth')->name('get_account_setting');
Route::post('/akun/pengaturan/update_user_detail', [UserController::class, 'update_user_detail'])->middleware('auth')->name('post_update_account_detail');
Route::post('/akun/pengaturan/update_user_password', [UserController::class, 'update_user_password'])->middleware('auth')->name('post_update_user_password');

Route::get('/akun/laporan/riwayat', [ReportController::class, 'index'])->middleware('auth')->name('get_report_history');

Route::get('/akun/laporkan/rekening', [ReportController::class, 'create_bank'])->middleware('auth')->name('get_bank_form');
Route::post('/akun/laporkan/rekening', [ReportController::class, 'store_bank'])->middleware('auth')->name('post_bank');

Route::get('/akun/laporkan/telepon', [ReportController::class, 'create_phone'])->middleware('auth')->name('get_phone_form');
Route::post('/akun/laporkan/telepon', [ReportController::class, 'store_phone'])->middleware('auth')->name('post_phone');

Route::get('/akun/sanggahan/riwayat', [DisclaimerController::class, 'index'])->middleware('auth')->name('get_disclaimer_history');

Route::get('/akun/sanggahan/buat', [DisclaimerController::class, 'create'])->middleware('auth')->name('get_disclaimer_form');
Route::post('/akun/sanggahan/buat', [DisclaimerController::class, 'store'])->middleware('auth')->name('post_disclaimer');

Route::get('/akun/verifikasi', [UserController::class, 'show_verify'])->middleware('auth')->name('get_verify_form');
Route::post('/akun/verifikasi', [UserController::class, 'post_verify'])->middleware('auth')->name('post_verify_form');

Route::get('/akun/masuk', [UserController::class, 'show_signin'])->name('get_signin_form');
Route::post('/akun/masuk', [UserController::class, 'auth_user'])->name('post_auth');

Route::get('/akun/daftar', [UserController::class, 'show_signup'])->name('get_signup_form');
Route::post('/akun/daftar', [UserController::class, 'store_user'])->name('post_user');

Route::get('/akun/logout', [UserController::class, 'logout_user'])->name('logout_user');

Route::get('/akun/reset', function () {
    return view('forgot-password');
});

Route::get('/akun/laporkan', function () {
    return redirect()->route('get_bank_form');
});

Route::get('/akun/sanggahan', function () {
    return redirect()->route('get_disclaimer_form');
});
Route::get('/admin',function() {
    return view('admin');
});
Route::get('/edit/report',function() {
    return view('edit_report');
});

Route::get('/cek/rekening/{no_rek}', [HomeController::class, 'index_rek'])->name('cek_rekening');

Route::get('/cek/telepon/{no_telepon}', [HomeController::class, 'index_telp'])->name('cek_telepon');

Route::get('/404', function () {
    return view('404');
})->name('show_404');