<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShoppingCart;

class ShoppingCartController extends Controller
{
    //
    // Obtener el carrito del usuario autenticado
    public function getCart(Request $request)
    {
        $user = $request->user();
        $cart = ShoppingCart::where('user_id', $user->id)->where('status', 'active')->with('cartItems')->first();

        if (!$cart) {
            return response()->json(['message' => 'No active shopping cart found'], 404);
        }

        return response()->json($cart);
    }

    // Vaciar el carrito de compras
    public function clearCart(Request $request)
    {
        $user = $request->user();
        $cart = ShoppingCart::where('user_id', $user->id)->where('status', 'active')->first();

        if (!$cart) {
            return response()->json(['message' => 'No active shopping cart found'], 404);
        }

        // Eliminar todos los elementos del carrito
        $cart->cartItems()->delete();

        return response()->json(['message' => 'Cart cleared successfully']);
    }
}
