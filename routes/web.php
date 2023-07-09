<?php

use App\Http\Controllers\invoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\tiketviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//hello
Route::get('/', function () {
    return view('welcome');
});

Route::get('/seat-modal', function () {
    return view('modal.seat-modal');
});

Route::get('tiketing', [tiketviewController::class, 'index']);
Route::get('invoice', [invoiceController::class, 'index']);
Route::get('payment/{payment_number}', [OrderController::class, 'show']);
Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);
Route::get('payments/success', [PaymentCallbackController::class, 'success'])->name('payment-success');
Route::get('payments/error', [PaymentCallbackController::class, 'error'])->name('payment-error');
