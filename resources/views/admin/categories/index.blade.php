@extends('layouts.admin')

@section('content')
    <h2>All Categories</h2>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('categories.create') }}" style="margin-bottom: 10px; display: inline-block;">+ Add New Category</a>

    @forelse($categories as $category)
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <h4>{{ $category->name }}</h4>
            <p>
                <a href="{{ route('categories.edit', $category->id) }}">Edit</a> |
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this category?')">Delete</button>
                </form>
            </p>
        </div>
    @empty
        <p>No categories found.</p>
    @endforelse
@endsection
