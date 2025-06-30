@extends('layouts.app')

@section('content')
    <h2>Your Cart</h2>

    @if(session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    @forelse($cartItems as $item)
        <div style="border-bottom: 1px solid #ccc; padding: 10px 0;">
            <h4>{{ $item->product->name }}</h4>
            <p>Price: {{ $item->product->price }} BDT</p>

            <form method="POST" action="{{ route('cart.update', $item->id) }}">
                @csrf
                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width: 60px;">
                <button type="submit">Update</button>
            </form>

            <form method="POST" action="{{ route('cart.delete', $item->id) }}" style="margin-top:5px;">
                @csrf
                <button type="submit" onclick="return confirm('Remove this item?')">Remove</button>
            </form>
        </div>
    @empty
        <p>Your cart is empty.</p>
    @endforelse

    @if($cartItems->count())
        <form method="POST" action="{{ route('order.place') }}">
            @csrf
            <button type="submit" style="margin-top:15px;">Place Order</button>
        </form>
    @endif
@endsection
