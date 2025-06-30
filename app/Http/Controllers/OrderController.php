<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function place()
    {
        $customer = Auth::guard('customer')->user();

        $cartItems = $customer->cartItems()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your cart is empty!');
        }

        $order = Order::create([
            'customer_id' => $customer->id,
            'status'      => 'pending',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);
        }

        $customer->cartItems()->delete();

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    public function index()
    {
        $orders = Order::with('orderItems.product')
                       ->where('customer_id', Auth::guard('customer')->id())
                       ->latest()
                       ->get();

        return view('frontend.orders.index', compact('orders'));
    }
}
