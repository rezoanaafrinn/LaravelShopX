@extends('layouts.admin')

@section('content')
    <h2>Add New Category</h2>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <label>Category Name</label><br>
        <input type="text" name="name" required><br><br>

        <button type="submit">Create Category</button>
    </form>
@endsection
