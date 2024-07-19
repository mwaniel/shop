<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
	//index
	Route::get('product', [ProductController::class, 'index'])->name('product');
	//create
	Route::get('product-create', [ProductController::class, 'create'])->name('product-create');
	//store
	Route::post('product-store', [ProductController::class, 'store'])->name('product-store');
	//show
	Route::get('product/{id}/show/', [ProductController::class, 'show'])->name('product-show');
	//edit
	Route::get('product/{id}/edit/', [ProductController::class, 'edit'])->name('product-edit');
	//update
	Route::patch('product/{id}/update/', [ProductController::class, 'update'])->name('product-update');
	//delete
	Route::delete('product/{id}/delete/', [ProductController::class, 'destroy'])->name('product-delete');
	//index
	Route::get('category', [ProductController::class, 'category'])->name('category');
	//create
	Route::get('/category/{id}/{string}', [ProductController::class, 'category_create'])->name('category-create');
	//store
	Route::post('category-store/{string}', [ProductController::class, 'category_store'])->name('category-store');
	//delete
	Route::delete('category/{id}/delete', [ProductController::class, 'category_delete'])->name('category-delete');
});