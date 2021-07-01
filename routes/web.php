<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DisclaimerController;
use App\Http\Controllers\FileController;
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
    return redirect()->route('home');
});

require __DIR__.'/auth.php';

Route::get('/getAuthInfo', [ReportController::class, 'getAuthorization']);

Route::get('/akun/pengaturan', [UserController::class, 'show_settings'])->middleware('auth')->name('get_account_setting');
Route::post('/akun/pengaturan/update_user_detail', [UserController::class, 'update_user_detail'])->middleware('auth')->name('post_update_account_detail');
Route::post('/akun/pengaturan/update_user_password', [UserController::class, 'update_user_password'])->middleware('auth')->name('post_update_user_password');

//get_(bank|phone)_form
Route::get('/akun/laporan/riwayat', [ReportController::class, 'index'])->middleware('auth')->name('get_report_history');
Route::get('/akun/laporkan/{tipe}', [ReportController::class, 'create'])->middleware('auth')->name('report.create');
Route::post('/akun/laporkan/rekening', [ReportController::class, 'store_bank'])->middleware('auth')->name('report.store_bank');
Route::post('/akun/laporkan/telepon', [ReportController::class, 'store_phone'])->middleware('auth')->name('report.store_phone');
Route::get('/akun/laporan/{id}', [ReportController::class, 'show'])->middleware('auth')->name('report.show');
Route::get('/akun/laporan/{id}/edit', [ReportController::class, 'edit'])->middleware('auth')->name('report.edit');
Route::put('/akun/laporan/{id}', [ReportController::class, 'update'])->middleware('auth')->name('report.update');
// Route::delete('/akun/laporan', [ReportController::class, 'destroy'])->middleware('auth')->name('report.destroy');

Route::get('/akun/sanggahan/riwayat', [DisclaimerController::class, 'index'])->middleware('auth')->name('get_disclaimer_history');
Route::get('/akun/sanggahan/buat', [DisclaimerController::class, 'create'])->middleware('auth')->name('disclaimer.create');
Route::post('/akun/sanggahan/buat', [DisclaimerController::class, 'store'])->middleware('auth')->name('disclaimer.store');

Route::get('/akun/verifikasi', [UserController::class, 'show_verify'])->middleware('auth')->name('get_verify_form');
Route::post('/akun/verifikasi', [UserController::class, 'post_verify'])->middleware('auth')->name('post_verify_form');

Route::get('/akun/masuk', [UserController::class, 'show_signin'])->name('get_signin_form');
Route::post('/akun/masuk', [UserController::class, 'auth_user'])->name('post_auth');

Route::get('/akun/daftar', [UserController::class, 'show_signup'])->name('get_signup_form');
Route::post('/akun/daftar', [UserController::class, 'store_user'])->name('post_user');

Route::get('/akun/logout', [UserController::class, 'logout_user'])->name('logout_user');

Route::get('/akun/reset', function () {
    return view('akun.forgot-password');
});

Route::get('/akun/laporkan', function () {
    return redirect()->route('report.create', ['tipe' => 'rekening']);
});

Route::get('/akun/sanggahan', function () {
    return redirect()->route('disclaimer.create');
});

Route::get('/admin', [UserController::class, 'show_admin'])->name('show_admin');

Route::get('/admin/buat_akun', [UserController::class, 'create_user_admin'])->name('create_user_admin');

Route::post('/admin/buat_akun', [UserController::class, 'store_user_admin'])->name('store_user_admin');

Route::get('/edit/report',function() {
    return view('edit_report');
});

Route::get('/cek/rekening/{no_rek}', [HomeController::class, 'index_rek'])->name('cek_rekening');

Route::get('/cek/telepon/{no_telepon}', [HomeController::class, 'index_telp'])->name('cek_telepon');

Route::get('/404', function () {
    return view('404');
})->name('show_404');

Route::get('/report_images/{id}/{filename}', [HomeController::class, 'get_report_image'])->middleware('auth')->name('show_report_image');
Route::get('/disclaimer_images/{id}/{filename}', [HomeController::class, 'get_disclaimer_image'])->middleware('auth')->name('show_disclaimer_image');
