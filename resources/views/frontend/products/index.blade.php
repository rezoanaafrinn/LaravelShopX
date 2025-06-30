@extends('layouts.app')

@section('content')
    <h2>All Products</h2>

    @foreach($products as $product)
        <div style="border:1px solid #ddd; padding:15px; margin:10px 0;">
            <h4>{{ $product->name }}</h4>
            <p>Price: {{ $product->price }} BDT</p>
            <p>Category: {{ $product->category->name ?? 'N/A' }}</p>
            <p>{{ $product->description }}</p>

            @auth('customer')
                <form method="POST" action="{{ route('cart.add') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="number" name="quantity" value="1" min="1" style="width:60px;">
                    <button type="submit">Add to Cart</button>
                </form>
            @else
                <p><a href="{{ route('customer.login') }}">Login to add to cart</a></p>
            @endauth
        </div>
    @endforeach
@endsection
