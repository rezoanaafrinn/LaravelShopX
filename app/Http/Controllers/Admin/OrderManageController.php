<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderManageController extends Controller
{
    public function index()
    {
        $orders = Order::with(['customer', 'orderItems.product'])->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:approved,declined',
        ]);

        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Order status updated successfully.');
    }
}
