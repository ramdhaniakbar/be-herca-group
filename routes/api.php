<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/calculation-transactions', [TransactionController::class, 'commission_calculation'])->name('calculation.transactions');

Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::post('/payments', [PaymentController::class, 'make_payment'])->name('payments.store');