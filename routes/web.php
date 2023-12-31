<?php

use App\Http\Controllers\invoiceController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\AuthController;
use App\Mail\confirmPaymentMail;
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
Route::get('/', [jadwalController::class, 'jadwal']);

// Route::get('/', function () {
//     return view('welcome');
// });

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
Route::get('terms-condition', function () {
    return view('privacy.terms-condition');
})->name('terms-condition');

Route::get('verify/email/{token}', [AuthController::class, 'verify'])->name('verify-email');

Route::get('test-email', function () {
    // Mail::to('sakti.pardano29@gmail.com')->send(new bookedEmail(53));
    Mail::to('sakti.pardano29@gmail.com')->send(new confirmPaymentMail(56));
});
