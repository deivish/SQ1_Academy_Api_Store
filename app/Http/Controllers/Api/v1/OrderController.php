<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Order;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $orders = auth()->user()->orders;
            
            if ($orders->isEmpty()) {
                return response()->json(["message" => "No orders found"], 404);
            }
            
            return response()->json($orders, 200);
        } catch (Throwable $th) {
            \Log::error('Error fetching orders: ' . $th->getMessage(), [
                'stack' => $th->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Error fetching orders',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'total_amount' => 'required|numeric|min:0',
            'order_status' => 'required|string|in:pending,completed,cancelled',
            'payment_method' => 'required|string',
            'shipping_address' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => auth()->id(),
                'total_amount' => $request->total_amount,
                'order_status' => $request->order_status,
                'payment_method' => $request->payment_method,
                'shipping_address' => $request->shipping_address
            ]);

            DB::commit();

            return response()->json($order, 201);
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error('Error creating order: ' . $th->getMessage(), [
                'request_data' => $request->all(),
                'stack' => $th->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Error creating order',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Get user orders by id
        try {
            $order = Order::with('items')->findOrFail($id);
            
            if (!Gate::allows('user-view-order', $order)) {
                return response()->json(["message" => "Access denied"], 403);
            }
            
            return response()->json($order, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Order not found',
                'message' => $e->getMessage()
            ], 404);
        } catch (Throwable $th) {
            \Log::error('Error fetching order: ' . $th->getMessage(), [
                'order_id' => $id,
                'stack' => $th->getTraceAsString()
            ]);
            return response()->json([
                'error' => 'Error fetching order',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'order_status' => 'nullable|string|in:pending,completed,cancelled',
            'total_amount' => 'nullable|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            $order = Order::findOrFail($id);

            // Verificar permisos
            if (!Gate::allows('user-manage-order', $order)) {
                return response()->json(['message' => 'Unauthorized action'], 403);
            }

            $order->update($request->only(['order_status', 'total_amount']));

            DB::commit();

            return response()->json($order, 200);
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json(['message' => 'Order not found'], 404);
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error('Error updating order: ' . $th->getMessage(), [
                'order_id' => $id,
                'request_data' => $request->all(),
                'stack' => $th->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Error updating order',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $order = Order::findOrFail($id);

            // Verificar permisos
            if (!Gate::allows('user-manage-order', $order)) {
                return response()->json(['message' => 'Unauthorized action'], 403);
            }

            $order->delete();

            DB::commit();

            return response()->json(['message' => 'Order deleted successfully'], 200);
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json(['message' => 'Order not found'], 404);
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error('Error deleting order: ' . $th->getMessage(), [
                'order_id' => $id,
                'stack' => $th->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Error deleting order',
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
