<?php

use App\Http\Controllers\Api\v1\AuthControlller;
use App\Http\Controllers\Api\v1\OrderController;
use App\Http\Controllers\Api\v1\ProductController;
use App\Http\Controllers\Api\v1\ShoppingCartController;
use App\Http\Controllers\Api\v1\CartItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->group( function () {
    
    //Auth
    Route::post('/register', [AuthControlller::class, 'register']);
    Route::post('/login', [AuthControlller::class, 'login']);
    Route::middleware('auth:sanctum')->post('logout', [AuthControlller::class, 'logout']);

    //products
    Route::prefix('products')->group( function () {
        Route::get('/search', [ProductController::class, 'search']);
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::post('/', [ProductController::class, 'store']);
        Route::put('/{id}', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'destroy']);
    });

    //orders
    Route::prefix('orders')->middleware('auth:sanctum')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::get('/{id}', [OrderController::class, 'show']);
    });

    // Shopping Cart Routes
    Route::prefix('cart')->middleware('auth:sanctum')->group(function () {
        Route::get('/', [ShoppingCartController::class, 'getCart']); 
        Route::delete('/', [ShoppingCartController::class, 'clearCart']);

    // Rutas para CartItemController
        Route::get('/items', [CartItemController::class, 'index']); // Listar ítems en el carrito
        Route::post('/items', [CartItemController::class, 'store']); // Agregar producto al carrito
        Route::put('/items/{id}', [CartItemController::class, 'update']); // Actualizar cantidad
        Route::delete('/items/{id}', [CartItemController::class, 'destroy']); // Eliminar producto
    });

    
});

