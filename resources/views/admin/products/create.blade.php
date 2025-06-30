@extends('layouts.admin')

@section('content')
    <h2>Add New Product</h2>

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <label>Product Name</label><br>
        <input type="text" name="name" required><br><br>

        <label>Price (BDT)</label><br>
        <input type="number" name="price" required><br><br>

        <label>Description</label><br>
        <textarea name="description" rows="4"></textarea><br><br>

        <label>Category</label><br>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br><br>

        <label>Image</label><br>
        <input type="file" name="image"><br><br>

        <button type="submit">Save Product</button>
    </form>
@endsection
