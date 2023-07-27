<?php

use App\Http\Controllers\invoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\tiketviewController;
use App\Mail\bookedEmail;
use App\Mail\confirmPaymentMail;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

Route::middleware('auth')->group(function () {
    Route::get('tiketing/{id_booking}/{id_tiket}', [invoiceController::class, 'tiket'])->name('print.tiket');
    Route::get('invoice/{id_booking}', [invoiceController::class, 'invoice'])->name('print.invoice');
});

Route::get('payment/{payment_number}', [OrderController::class, 'show']);
Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);
Route::get('payments/success', [PaymentCallbackController::class, 'success'])->name('payment-success');
Route::get('payments/error', [PaymentCallbackController::class, 'error'])->name('payment-error');
