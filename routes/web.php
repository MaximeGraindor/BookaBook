<?php

use App\Models\OrderStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderStatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/', [HomeController::class, 'show'])->name('home');

    Route::get('/profil/{user:slug}', [UserController::class, 'show'])->name('user.show');

    Route::get('/books', [BookController::class, 'index'])->name('book.index');
    Route::get('/books/{book:slug}', [BookController::class, 'show'])->name('book.show');

    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::post('/order/{order:id}/status', [OrderStatusController::class, 'update'])->name('orderStatus.update');


    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
});

