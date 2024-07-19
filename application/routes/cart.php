<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
	Route::get('cart', [CartController::class, 'index'])->name('cart');
	Route::get('cart-create', [CartController::class, 'create'])->name('cart-create');
	Route::get('cart/{id}/show/', [CartController::class, 'show'])->name('cart-show');
	Route::get('cart/{id}/edit/', [CartController::class, 'edit'])->name('cart-edit');
	Route::post('cart/{id}/store/', [CartController::class, 'store'])->name('cart-store');
	Route::patch('cart/{id}/update/', [CartController::class, 'update'])->name('cart-update');
	Route::delete('cart/', [CartController::class, 'destroy'])->name('cart-delete');
});