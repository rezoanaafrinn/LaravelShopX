@extends('layouts.admin')

@section('content')
    <h2>Welcome, {{ auth('admin')->user()->name }}</h2>

    <p>This is your admin dashboard. From here you can:</p>

    <ul>
        <li><a href="{{ route('categories.index') }}">Manage Categories</a></li>
        <li><a href="{{ route('products.index') }}">Manage Products</a></li>
        <li><a href="{{ route('admin.orders.index') }}">Manage Orders</a></li>
    </ul>
@endsection
