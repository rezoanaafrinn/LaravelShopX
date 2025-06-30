@extends('layouts.admin')

@section('content')
    <h2>Edit Product</h2>

    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Product Name</label><br>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" required><br><br>

        <label>Price (BDT)</label><br>
        <input type="number" name="price" value="{{ old('price', $product->price) }}" required><br><br>

        <label>Description</label><br>
        <textarea name="description" rows="4">{{ old('description', $product->description) }}</textarea><br><br>

        <label>Category</label><br>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select><br><br>

        <label>Image</label><br>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="100"><br>
        @endif
        <input type="file" name="image"><br><br>

        <button type="submit">Update Product</button>
    </form>
@endsection

