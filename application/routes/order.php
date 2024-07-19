<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
	Route::post('order-store', [OrderController::class, 'store'])->name('order-store');
});

Route::middleware('auth')->group(function () {
	Route::get('order', [OrderController::class, 'index'])->name('order');
	Route::get('my-order', [OrderController::class, 'my_order'])->name('my-order');
	Route::get('order-create', [OrderController::class, 'create'])->name('order-create');
	Route::get('order/{id}/show/', [OrderController::class, 'show'])->name('order-show');
	Route::get('order/{id}/edit/', [OrderController::class, 'edit'])->name('order-edit');
	Route::patch('order/{id}/update/', [OrderController::class, 'update'])->name('order-update');
	Route::delete('order/{id}/delete/', [OrderController::class, 'show'])->name('order-delete');
});