@extends('layouts.customer')

@section('content')
    <h2>Welcome, {{ $customer->name }}</h2>
    <p>Email: {{ $customer->email }}</p>
    <p><a href="{{ route('customer.profile') }}">View Profile</a></p>
@endsection
