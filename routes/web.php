<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// HOME
Route::get('/home', function () {
    return view('home-page'); 
})->name('home');

// SHOP-PAGE
Route::get('/shop-page', function () {
    return view('shop-page'); 
})->name('shop-page');

Route::get('/shop-page', [ProductController::class, 'search'])->name('search');

// product
Route::get('/product', function () {
    return view('product-page'); 
})->name('product');

// CART
Route::get('/cart', function () {
    return view('cart-page'); 
})->name('cart');

// CHECKOUT
Route::get('/checkout', function () {
    return view('checkout-page'); 
})->name('checkout');

Route::post('/register', [AuthControlller::class, 'register'])->name('register');
Route::post('/login', [AuthControlller::class, 'login'])->name('login');
Route::post('/logout', [AuthControlller::class, 'logout'])->name('logout')->middleware('auth');
