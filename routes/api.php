<?php

use App\Http\Controllers\Api\AngkutanController;
use App\Http\Controllers\Api\AuthMobileController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\HelperController;
use App\Http\Controllers\api\paymentController;
use App\Http\Controllers\Api\PemesananController;
use App\Http\Controllers\Api\refundController;
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
    Route::post('checktoken', [AuthMobileController::class, 'checkToken']);
    Route::get('getkabkota', [HelperController::class, 'getKabKota']);
    Route::post('login-via-google', [AuthMobileController::class, 'loginViaGoogle']);
    Route::post('resend-email-verification', [AuthMobileController::class, 'resendEmailVerification']);
});

//dengan middleware
Route::middleware('auth.api')->group(function () {

    Route::prefix('user')->group(function () {
        Route::get('logout', [AuthMobileController::class, 'logout']);
        Route::get('getuser', [AuthMobileController::class, 'getUser']);
        Route::post('update-number', [AuthMobileController::class, 'editnumber']);
        Route::post('update-pass', [AuthMobileController::class, 'editPassword']);
    });

    route::prefix('pemesanan')->group(function () {
        Route::post('jadwal', [PemesananController::class, 'jadwal']);
        Route::post('get-bangku', [PemesananController::class, 'getBangku']);
        Route::post('store-booking', [PemesananController::class, 'storeBooking']);
        Route::post('geometry-checking', [BookingController::class, 'checkGeometry']);
        Route::post('request-payment', [PemesananController::class, 'requestPayment']);
        Route::post('check-payment', [PemesananController::class, 'checkStatusPayment']);
        Route::post('get-booking', [PemesananController::class, 'getBooking']);
        Route::post('get-booking-detail', [PemesananController::class, 'getBookingdetail']);
        Route::post('cencel-booking', [PemesananController::class, 'refundCencel']);
        Route::post('get-bank', [refundController::class, 'getBank']);
        Route::post('refund', [refundController::class, 'storeRefund']);
    });

    route::prefix('payment')->group(function () {
        Route::post('make-payment', [paymentController::class, 'makePayment']);
    });
});
