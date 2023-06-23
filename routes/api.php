<?php

use App\Http\Controllers\Api\AngkutanController;
use App\Http\Controllers\Api\AuthMobileController;
use App\Http\Controllers\Api\PemesananController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('guest')->group(function () {
    Route::post('login', [AuthMobileController::class, 'login']);
    Route::post('register', [AuthMobileController::class, 'registration']);
    Route::post('check-token', [AuthMobileController::class, 'checkToken']);
});

//dengan middleware
Route::middleware('auth.api')->group(function () {

    Route::prefix('user')->group(function () {
        Route::get('logout', [AuthMobileController::class, 'logout']);
        Route::get('get-user', [AuthMobileController::class, 'getUser']);
    });

    route::prefix('pemesanan')->group(function () {
        Route::get('jadwal', [PemesananController::class, 'jadwal']);
    });
});
