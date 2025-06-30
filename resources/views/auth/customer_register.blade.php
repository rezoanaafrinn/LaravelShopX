<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration</title>
</head>
<body>
    <h2>Customer Registration</h2>

    @if($errors->any())
        <p style="color:red">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('customer.register') }}">
        @csrf
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Confirm Password:</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
