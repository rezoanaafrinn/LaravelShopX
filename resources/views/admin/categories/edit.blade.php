@extends('layouts.admin')

@section('content')
    <h2>Edit Category</h2>

    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PUT')

        <label>Category Name</label><br>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" required><br><br>

        <button type="submit">Update Category</button>
    </form>
@endsection
