@extends('layouts.admin') 
@section('content')
    <h2>All Orders</h2>

    @if(session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    @forelse($orders as $order)
        <div style="border:1px solid #ccc; padding:15px; margin-bottom:15px;">
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Customer:</strong> {{ $order->customer->name ?? 'N/A' }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Items:</strong></p>
            <ul>
                @foreach($order->orderItems as $item)
                    <li>
                        {{ $item->product->name }} - {{ $item->quantity }} x {{ $item->price }} BDT
                    </li>
                @endforeach
            </ul>

            <form method="POST" action="{{ route('admin.orders.status', $order->id) }}">
                @csrf
                <select name="status" required>
                    <option value="">--Change Status--</option>
                    <option value="approved" {{ $order->status == 'approved' ? 'selected' : '' }}>Approve</option>
                    <option value="declined" {{ $order->status == 'declined' ? 'selected' : '' }}>Decline</option>
                </select>
                <button type="submit">Update</button>
            </form>
        </div>
    @empty
        <p>No orders found.</p>
    @endforelse
@endsection
