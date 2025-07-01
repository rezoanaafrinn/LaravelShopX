@extends('layouts.app')

@section('content')
    <h2 style="margin-bottom: 20px;">All Products</h2>

    @foreach($products as $product)
        <div style="display: flex; gap: 20px; border: 1px solid #ccc; padding: 20px; margin-bottom: 20px; border-radius: 8px; background-color: #f9f9f9;">

            <div style="flex: 1;">
                <h3 style="margin: 0 0 10px;">{{ $product->name }}</h3>
                <p style="margin: 0 0 5px;"><strong>Price:</strong> {{ $product->price }} BDT</p>
                <p style="margin: 0 0 5px;"><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
                <p style="margin: 10px 0;">{{ $product->description }}</p>

                @auth('customer')
                    <form method="POST" action="{{ route('cart.add') }}" style="display: flex; align-items: center; gap: 10px;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" value="1" min="1" style="width: 60px; padding: 5px;">
                        <button type="submit" style="padding: 6px 12px; background-color: #007bff; color: white; border: none; border-radius: 4px;">
                            Add to Cart
                        </button>
                    </form>
                @else
                    <p><a href="{{ route('customer.login') }}" style="color: #007bff;">Login to add to cart</a></p>
                @endauth
            </div>
        </div>
    @endforeach
@endsection
