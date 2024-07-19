<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
	Route::get('/payment/{id}/{string}/', [PaymentController::class, 'index']);
});

Route::middleware('auth')->group(function () {
	Route::get('payment', [PaymentController::class, 'index'])->name('payment');
	Route::get('payment-create', [PaymentController::class, 'create'])->name('payment');
	Route::get('payment/{id}/show/', [PaymentController::class, 'show'])->name('payment-show');
	Route::get('payment/{id}/edit/', [PaymentController::class, 'edit'])->name('payment-edit');
	Route::post('payment-store', [PaymentController::class, 'store'])->name('payment-store');
	Route::patch('payment/{id}/update/', [PaymentController::class, 'update'])->name('payment-update');
	Route::delete('payment/{id}/delete/', [PaymentController::class, 'show'])->name('payment-show');
});