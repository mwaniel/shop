<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
	Route::post('m-pesa-transaction', [TransactionController::class, 'store'])->name('m-pesa-transaction');
	Route::post('cash-transaction', [TransactionController::class, 'store'])->name('cash-transaction');
});

Route::middleware('auth')->group(function () {
	Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');
	Route::get('transaction-create', [TransactionController::class, 'create'])->name('transaction-create');
	Route::get('transaction/{id}/show/', [TransactionController::class, 'show'])->name('transaction-show');
	Route::get('transaction/{id}/edit/', [TransactionController::class, 'edit'])->name('transaction-edit');
	Route::patch('transaction/{id}/update/', [TransactionController::class, 'update'])->name('transaction-update');
	Route::delete('transaction/{id}/delete/', [TransactionController::class, 'show'])->name('transaction-show');
});