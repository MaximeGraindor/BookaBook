<?php

use App\Models\OrderStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookOrderController;
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
    Route::get('/profil/{user:slug}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/profil/{user:slug}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/profil/{user:slug}/order/{order:number}', [OrderController::class, 'show'])->name('order.show');

    Route::get('/students', [UserController::class, 'index'])->name('user.index');

    Route::get('/books', [BookController::class, 'index'])->name('book.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/books/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/books/{book:slug}', [BookController::class, 'show'])->name('book.show');
    Route::get('/books/{book:slug}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/books/{book:slug}/update', [BookController::class, 'update'])->name('book.update');

    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::post('/order/{order:id}/status', [OrderStatusController::class, 'update'])->name('orderStatus.update');
    Route::post('/order/{order:id}/status/waiting', [OrderStatusController::class, 'updateDraftOrder'])->name('orderStatus.updateDraftOrder');
    Route::post('/order/{book:id}/quantity', [BookOrderController::class, 'update'])->name('bookOrder.update');
    Route::post('/order/{book:id}/delete', [BookOrderController::class, 'destroy'])->name('bookOrder.destroy');


    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
});

