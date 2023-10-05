<?php

use App\Http\Controllers\PaypalController;
use App\Http\Controllers\TransaksiController;
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

Route::get('payment/{IdTransaksi}', [PaypalController::class, 'index'])->name('payment.index');
Route::controller(PaypalController::class)
    ->group(function () {
        Route::view('paypal', 'paypal')->name('create.payment');
        Route::get('handle-payment', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');
    });
Route::resource('transaksi', TransaksiController::class);
Route::get('/transaksi/create/{userId}', [TransaksiController::class, 'create']);