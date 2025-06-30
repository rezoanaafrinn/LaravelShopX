<!DOCTYPE html>
<html>
<head>
    <title>Simple Shop</title>
</head>
<body>
    <div style="background:#eee; padding:10px;">
        <a href="{{ route('home') }}">Home</a> |
        @auth('customer')
            <a href="{{ route('cart.index') }}">Cart</a> |
            <a href="{{ route('orders.index') }}">Orders</a> |
            <form method="POST" action="{{ route('customer.logout') }}" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('customer.login') }}">Login</a> |
            <a href="{{ route('customer.register.form') }}">Register</a>
        @endauth
    </div>

    <div style="padding:20px;">
        @yield('content')
    </div>
</body>
</html>
