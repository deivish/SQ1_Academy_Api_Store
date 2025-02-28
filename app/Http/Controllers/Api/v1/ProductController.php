<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    /**
     * Get Method: Get all products
     */
    public function index(Request $request)
    {
        try {
            /**
             * Get the number of records per page. 
             * This is passed in the route as parameter /products?per_page=1, 
             * if the parameter is not sent it takes 10 by default.
             */
            $perPage = $request->query('per_page', 10);
            
            /**
             * Obtain products with information about their variants using 
             * the relationship between models, using paginate for pagination.
             */
            $products = Product::with('variants')->paginate($perPage);

            //If there are no products in the database we return a 404.
            if($products->isEmpty()) {
                return response()->json(["message" => "Products Not Found"], 404);
            }

            return response()->json($products, 200);
        } catch(\Throwable $th) {
            
            \Log::error('Error Getting products: ' . $th->getMessage(), [
                'stack' => $th->getTraceAsString(), // Detailed stacktrace information
            ]);

            return response()->json([
                'error' => 'Error Getting products',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Get Method: Get Product By ID
     */
    public function show(int $id)
    {
        
        try {
            //Get a product by ID
            $product = Product::with('variants')->find($id);
            return response()->json($product, 200);
        } catch(ModelNotFoundException $e) {

            \Log::error('Error fetching product: ' . $e->getMessage(), [
                'product_id' => $id,            
                'stack' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Product not found',
                'message' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Post Method: Save Product
     */
    public function store(Request $request)
    {
        //Start transaction
        \DB::beginTransaction();

        try {

            //Save product to database.
            $product = Product::findOrFail($id);

        // Actualizar los datos del producto
        $product->update($request->only(['name', 'description', 'price', 'other_attributes']));

        // Manejo de variantes del producto
        if ($request->has('variants')) {
            $variantIds = [];
            foreach ($request->input('variants') as $variantData) {
                if (isset($variantData['id'])) {
                    // Actualizar variante existente
                    $variant = ProductVariant::where('id', $variantData['id'])
                                            ->where('product_id', $id)
                                            ->first();
                    if ($variant) {
                        $variant->update($variantData);
                        $variantIds[] = $variant->id; // Guardar los IDs actualizados
                    }
                } else {
                    // Crear nueva variante
                    $variantData['product_id'] = $id;
                    $newVariant = ProductVariant::create($variantData);
                    $variantIds[] = $newVariant->id; // Guardar el nuevo ID
                }
            }

            // Opcional: Eliminar variantes que no están en la nueva lista
            ProductVariant::where('product_id', $id)
                        ->whereNotIn('id', $variantIds)
                        ->delete();
        }

        \DB::commit();
        return response()->json($product->load('variants'), 200);

    } catch (ModelNotFoundException $e) {
        \DB::rollBack();
        \Log::error('Product not found: ' . $e->getMessage(), ['product_id' => $id]);
        return response()->json(['error' => 'Product not found'], 404);
    } catch (\Throwable $th) {
        \DB::rollBack();
        \Log::error('Error updating product: ' . $th->getMessage(), ['input' => $request->all()]);
        return response()->json(['error' => 'Failed to update product'], 500);
        }
    }

    /**
     * Put Method: Update Product
     */
    public function update(Request $request, int $id)
    {
        \DB::beginTransaction();

        try {
            
             // Find Product in Database.
            $product = Product::findOrFail($id);

            // Actualizar los datos del producto
            $product->update($request->only(['name', 'description', 'price', 'other_attributes']));

            // Confirmar los cambios
            \DB::commit();

            return response()->json([
                'message' => 'Producto actualizado correctamente',
                'product' => $product
            ], 200);
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Error al actualizar el producto: ' . $e->getMessage());

            return response()->json([
                'message' => 'Error al actualizar el producto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Put Method: Update Product Variant By Id
     */

    public function updateVariant(Request $request, int $id, int $variant_id)
{
    \DB::beginTransaction();
    
    try {
        // Buscar la variante asegurando que pertenezca al producto correcto
        $variant = ProductVariant::where('id', $variant_id)
                ->where('product_id', $id)
                ->firstOrFail();

        // Actualizar la variante con los datos proporcionados
        $variant->update($request->only(['color', 'size', 'stock_quantity']));

        \DB::commit();
        return response()->json($variant, 200);
        
    } catch (ModelNotFoundException $e) {
        \DB::rollBack();
        \Log::error('Variant not found: ' . $e->getMessage(), [
            'product_id' => $id, 
            'variant_id' => $variant_id
        ]);
        return response()->json(['error' => 'Variant not found'], 404);
        
    } catch (\Throwable $th) {
        \DB::rollBack();
        \Log::error('Error updating variant: ' . $th->getMessage(), [
            'product_id' => $id,
            'variant_id' => $variant_id,
            'input' => $request->all()
        ]);
        return response()->json(['error' => 'Failed to update variant'], 500);
    }
}

    /**
     * Post Method: Delete Product
     */
    public function destroy(int $id)
    {
        
        try {
            //Find Product in Database.
            $product = Product::findOrFail($id);
    
            // Eliminar el producto
            $product->delete();
    
            // Confirmar los cambios
            \DB::commit();
    
            return response()->json([
                'message' => 'Product successfully removed'
            ], 204);
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Error deleting product: ' . $e->getMessage());
    
            return response()->json([
                'message' => 'Error deleting product',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Post Method: Search and Filter Products
     */
    public function search(Request $request)
    {
        $query = Product::with('variants');

        if($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        // Filtro por precio
        if($request->has('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }

        if($request->has('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }
        
        if($request->has('attributes') && $request->has('value')) {
            $attributes = $request->input('attributes');
            $value = $request->input('value');

            $query->whereJsonContains('other_attributes->' .  $attributes, $value);
        }

        // Filtro por color
        if($request->has('color')) {
            $color = $request->input('color');
            $query->whereHas('variants', function (Builder $q) use ($color) {
                $q->where('color', $color);
            });
        }

        // Filtro por talla
        $showSize = false;
        if ($request->has('size')) {
            $size = $request->input('size');
            $query->whereHas('variants', function (Builder $q) use ($size) {
                $q->where('size', $size);
            });
            $showSize = true; // Activamos la variable si se ha filtrado por talla
        }


        $products = $query->paginate(10);

        // dd($products);


        return view('shop-page', compact('products', 'showSize'));
    }

}
