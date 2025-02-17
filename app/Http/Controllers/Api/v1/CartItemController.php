<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\ShoppingCart;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


    class CartItemController extends Controller
{
    // Obtener los items del carrito
    public function index(Request $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $user = $request->user();
                $cart = ShoppingCart::where('user_id', $user->id)
                                    ->where('status', 'active')
                                    ->first();

                if (!$cart) {
                    return response()->json(['message' => 'No active shopping cart found'], 404);
                }

                return response()->json($cart->cartItems);
            });
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving cart items', 'error' => $e->getMessage()], 500);
        }
    }

    // Agregar un producto al carrito
    public function store(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction(); // Inicia la transacción

        try {
            $user = $request->user();
            $cart = ShoppingCart::firstOrCreate(
                ['user_id' => $user->id, 'status' => 'active'],
                ['created_date' => now()]
            );

            $variant = ProductVariant::lockForUpdate()->findOrFail($request->variant_id);

            if ($variant->stock_quantity < $request->quantity) {
                DB::rollBack(); // Deshacer cambios si no hay suficiente stock
                return response()->json(['message' => 'Not enough stock available'], 400);
            }

            $cartItem = CartItem::updateOrCreate(
                ['cart_id' => $cart->id, 'variant_id' => $request->variant_id],
                ['quantity' => $request->quantity, 'unit_price' => $variant->price ?? 0]
            );

            DB::commit(); // Confirma la transacción si todo sale bien
            return response()->json($cartItem, 201);

        } catch (\Exception $e) {
            DB::rollBack(); // Deshacer cambios en caso de error
            Log::error('Error adding item to cart: ' . $e->getMessage()); // Registrar el error en logs
            return response()->json(['message' => 'Error adding item to cart', 'error' => $e->getMessage()], 500);
        }
    }

    // Actualizar la cantidad de un producto en el carrito
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            return DB::transaction(function () use ($request, $id) {
                $cartItem = CartItem::lockForUpdate()->findOrFail($id);
                $variant = ProductVariant::lockForUpdate()->findOrFail($cartItem->variant_id);

                if ($variant->stock_quantity < $request->quantity) {
                    return response()->json(['message' => 'Not enough stock available'], 400);
                }

                $cartItem->update(['quantity' => $request->quantity]);

                return response()->json($cartItem);
            });
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating cart item', 'error' => $e->getMessage()], 500);
        }
    }

    // Eliminar un producto del carrito
    public function destroy($id)
    {
        try {
            return DB::transaction(function () use ($id) {
                $cartItem = CartItem::lockForUpdate()->findOrFail($id);
                $cartItem->delete();

                return response()->json(['message' => 'Item removed from cart']);
            });
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error removing cart item', 'error' => $e->getMessage()], 500);
        }
    }
}
