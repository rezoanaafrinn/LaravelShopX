<!DOCTYPE html>
<html>

<head>
    <title>Customer Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <nav>
        <a href="{{ route('customer.home') }}">Home</a> |
        <a href="{{ route('customer.profile') }}">Profile</a> |
        <a href="{{ route('customer.logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </nav>

    <hr>

    @yield('content')

</body>

</html>
