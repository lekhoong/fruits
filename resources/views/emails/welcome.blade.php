<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h1>Welcome to Our Application, {{ $user->name }}!</h1>
    <p>We are glad to have you with us.</p>

    <a href="{{ route('login') }}">Click here to login to your account</a>

</body>
</html>
