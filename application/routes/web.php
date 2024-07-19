<?php

use App\Http\Controllers\ProfileController;
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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/welcome.php';
require __DIR__.'/auth.php';
require __DIR__.'/cart.php';
require __DIR__.'/payment.php';
require __DIR__.'/product.php';
require __DIR__.'/order.php';
require __DIR__.'/invoice.php';
require __DIR__.'/sale.php';
require __DIR__.'/transaction.php';
require __DIR__.'/dashboard.php';