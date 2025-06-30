@extends('layouts.app')

@section('content')
    <h2>Your Orders</h2>

    @if(session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    @forelse($orders as $order)
        <div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

            <ul>
                @foreach($order->orderItems as $item)
                    <li>
                        {{ $item->product->name }} - {{ $item->quantity }} × {{ $item->price }} BDT
                    </li>
                @endforeach
            </ul>
        </div>
    @empty
        <p>No orders placed yet.</p>
    @endforelse
@endsection
