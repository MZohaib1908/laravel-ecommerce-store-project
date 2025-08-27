<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/product/{id}', [FrontendController::class, 'product'])->name('product.view');
Route::post('/cart/add/{id}', [FrontendController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::post('/order', [FrontendController::class, 'placeOrder'])->name('order.place');

// Admin Routes
Route::prefix('admin')->group(function() {
    Route::get('/', function(){ return view('admin.dashboard'); })->name('admin.dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
});
