<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f6f6;
            margin: 0;
            padding: 0;
        }
        .header {
            background: #222;
            color: white;
            padding: 15px;
        }
        .nav {
            background: #ddd;
            padding: 10px;
        }
        .nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #333;
        }
        .container {
            padding: 20px;
        }
        .logout-form {
            display: inline;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Admin Panel</h1>
    </div>

    <div class="nav">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="{{ route('categories.index') }}">Categories</a>
        <a href="{{ route('admin.orders.index') }}">Orders</a>
        <form method="POST" action="{{ route('admin.logout') }}" class="logout-form" style="display:inline;">
            @csrf
            <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">Logout</button>
        </form>
    </div>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
