<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home-page'); 
})->name('home');

Route::get('/shop-page', function () {
    return view('shop-page'); 
})->name('shop-page');

Route::get('/product', function () {
    return view('product-page'); 
})->name('product');

Route::get('/cart', function () {
    return view('cart-page'); 
})->name('cart');