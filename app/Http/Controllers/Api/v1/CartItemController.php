<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\ShoppingCart;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;


class CartItemController extends Controller
{
    // Obtener los items del carrito
    public function index(Request $request)
    {
        $user = $request->user();
        $cart = ShoppingCart::where('user_id', $user->id)->where('status', 'active')->first();

        if (!$cart) {
            return response()->json(['message' => 'No active shopping cart found'], 404);
        }

        return response()->json($cart->cartItems);
    }

    // Agregar un producto al carrito
    public function store(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = $request->user();
        $cart = ShoppingCart::firstOrCreate(
            ['user_id' => $user->id, 'status' => 'active'],
            ['created_date' => now()]
        );

        $variant = ProductVariant::findOrFail($request->variant_id);

        if ($variant->stock_quantity < $request->quantity) {
            return response()->json(['message' => 'Not enough stock available'], 400);
        }

        $cartItem = CartItem::updateOrCreate(
            ['cart_id' => $cart->id, 'variant_id' => $request->variant_id],
            ['quantity' => $request->quantity, 'unit_price' => $variant->price ?? 0]
        );

        return response()->json($cartItem, 201);
    }

    // Actualizar la cantidad de un producto en el carrito
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::findOrFail($id);

        $variant = ProductVariant::findOrFail($cartItem->variant_id);
        if ($variant->stock_quantity < $request->quantity) {
            return response()->json(['message' => 'Not enough stock available'], 400);
        }

        $cartItem->update(['quantity' => $request->quantity]);

        return response()->json($cartItem);
    }

    // Eliminar un producto del carrito
    public function destroy($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();

        return response()->json(['message' => 'Item removed from cart']);
    }
}
