<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('customer_id', Auth::guard('customer')->id())
            ->get();

        return view('frontend.cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $existing = Cart::where('customer_id', Auth::guard('customer')->id())
                        ->where('product_id', $request->product_id)
                        ->first();

        if ($existing) {
            $existing->increment('quantity', $request->quantity);
        } else {
            Cart::create([
                'customer_id' => Auth::guard('customer')->id(),
                'product_id'  => $request->product_id,
                'quantity'    => $request->quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $cart = Cart::findOrFail($id);
        $cart->update(['quantity' => $request->quantity]);

        return redirect()->back()->with('success', 'Cart updated.');
    }

    public function delete($id)
    {
        Cart::destroy($id);
        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}
