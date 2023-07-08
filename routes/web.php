<?php

use App\Http\Controllers\invoiceController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/seat-modal', function () {
    return view('modal.seat-modal');
});

Route::get('tiketing', [tiketviewController::class, 'index']);
Route::get('invoice', [invoiceController::class, 'index']);
