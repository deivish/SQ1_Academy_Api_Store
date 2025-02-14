<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Order;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Get the logged in user's orders, using model relation.
        $orders = auth()->user()->orders;
        return response()->json($orders, 200);
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

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $request->total_amount,
            'order_status' => $request->order_status,
            'payment_method' => $request->payment_method,
            'shipping_address' => $request->shipping_address
        ]);

        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Get user orders by id
        $order = Order::with('items')->find($id);

        // Si no existe la orden, devolver error 404
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        //Use Gate so that the logged in user can see only their orders. Gate rules are in the boot method of the AppServiceProviders class
        if (!Gate::allows('user-view-order', $order)) {
            return response()->json(['message' => 'Sorry, You dont have access to this resources'], 403);
        }

        return response()->json($order,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Check permission
        if (!Gate::allows('user-manage-order', $order)) {
            return response()->json(['message' => 'Unauthorized action'], 403);
        }

        $request->validate([
            'order_status' => 'nullable|string|in:pending,completed,cancelled',
            'total_amount' => 'nullable|numeric|min:0',
        ]);

        $order->update($request->only(['order_status', 'total_amount']));

        return response()->json($order, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Check permission
        if (!Gate::allows('user-manage-order', $order)) {
            return response()->json(['message' => 'Unauthorized action'], 403);
        }

        $order->delete();

        return response()->json(['message' => 'Order deleted successfully'], 200);
    }
}
