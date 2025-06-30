@extends('layouts.admin')

@section('content')
    <h2>All Products</h2>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('products.create') }}" style="margin-bottom: 10px; display: inline-block;">+ Add New Product</a>

    @forelse($products as $product)
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <h4>{{ $product->name }}</h4>
            <p>Price: {{ $product->price }} BDT</p>
            <p>Category: {{ $product->category->name ?? 'N/A' }}</p>
            <p>{{ $product->description }}</p>

            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="100">
            @endif

            <p>
                <a href="{{ route('products.edit', $product->id) }}">Edit</a> |
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this product?')">Delete</button>
                </form>
            </p>
        </div>
    @empty
        <p>No products found.</p>
    @endforelse
@endsection
