<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CartItem;
use App\Models\ShoppingCart;
use App\Models\ProductVariant;
use App\Models\User;

class CartItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Obtener carritos activos o crearlos si no existen
        $users = User::all();

        foreach ($users as $user) {
            $cart = ShoppingCart::firstOrCreate([
                'user_id' => $user->id,
                'status' => 'active'
            ], [
                'created_date' => now(),
            ]);

            // Obtener 3-5 variantes de productos aleatorias
            $variants = ProductVariant::inRandomOrder()->limit(rand(3, 5))->get();

            foreach ($variants as $variant) {
                // Verificar stock antes de agregar al carrito
                $quantity = rand(1, min($variant->stock_quantity, 5));

                if ($quantity > 0) {
                    CartItem::create([
                        'cart_id' => $cart->id,
                        'variant_id' => $variant->id,
                        'quantity' => $quantity,
                        'unit_price' => $variant->price ?? 0
                    ]);
                }
            }
        }
    }
}
