<?php

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

Route::get('/', function () {
    return view('landing');
});

Route::get('/akun/pengaturan', function () {
    return view('settings_profile');
});

Route::get('/akun/laporkan/bank', function () {
    return view('report_bank');
});

Route::get('/akun/laporkan/telepon', function () {
    return view('report_phone');
});

Route::get('/akun/laporan/riwayat', function () {
    return view('report_history');
});

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
});