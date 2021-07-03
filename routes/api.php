<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DisclaimerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/user/getBankReport', [ReportRekeningController::class, 'index']);

// Route::resource('/api/user/getBankReport', ReportRekeningController::class);

Route::middleware('auth:sanctum')->group( function () {
    Route::get('/user/getReport/', [ReportController::class, 'getReportByUser']);
    Route::get('/user/getBankReport/', [ReportController::class, 'getBankReportByUser']);
    Route::get('/user/getPhoneReport/', [ReportController::class, 'getPhoneReportByUser']); 
    Route::get('/user/getDisclaimer/', [DisclaimerController::class, 'getDisclaimerByUser']);
    Route::get('/admin/getReport/', [AdminController::class, 'getAllReport']);
});