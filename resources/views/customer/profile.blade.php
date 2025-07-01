@extends('layouts.customer')

@section('content')
    <h2>Customer Profile</h2>
    <ul>
        <li><strong>Name:</strong> {{ $customer->name }}</li>
        <li><strong>Email:</strong> {{ $customer->email }}</li>
        <li><strong>Joined:</strong> {{ $customer->created_at->format('d M Y') }}</li>
    </ul>
    <p><a href="{{ route('customer.home') }}">Back to Dashboard</a></p>
@endsection
