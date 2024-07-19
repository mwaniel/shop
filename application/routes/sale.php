<?php

use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
	Route::get('sale', [SaleController::class, 'index'])->name('sale');
	Route::get('sale-create', [SaleController::class, 'create'])->name('sale-create');
	Route::get('sale/{id}/show/', [SaleController::class, 'show'])->name('sale-show');
	Route::get('sale/{id}/edit/', [SaleController::class, 'edit'])->name('sale-edit');
	Route::post('sale-store', [SaleController::class, 'store'])->name('sale-store');
	Route::patch('sale/{id}/update/', [SaleController::class, 'update'])->name('sale-update');
	Route::delete('sale/{id}/delete/', [SaleController::class, 'show'])->name('sale-show');
});