<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            margin: 30px auto;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
        }
        p {
            color: #666666;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .otp {
            font-size: 24px;
            font-weight: bold;
            color: #333333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Application, {{ $user->name }}!</h1>
        <p>We are glad to have you with us. Here is your OTP for verification:</p>

        <p class="otp">{{ $user->otp }}</p>

        <p>Please enter this OTP on the verification page to complete your registration.</p>

        <a href="{{ route('verify') }}" class="btn">Click here to login to your account</a>
    </div>
</body>
</html>
