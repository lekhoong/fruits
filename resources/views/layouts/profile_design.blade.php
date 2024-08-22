<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #FFB800, #FF9500);
            color: #333;
            font-family: 'Nunito', sans-serif;
        }
    
        .card {
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
        }
    
        .btn-custom {
            background-color: #FFB800;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }
    
        .btn-custom:hover {
            background-color: #FF9500;
        }
    
        .form-control {
            border-radius: 25px;
            padding: 10px 15px;
        }
    
        .card-header h3 {
            font-weight: bold;
            color: #FFB800;
        }
    
        .text-muted {
            color: #777 !important;
        }
    
        hr {
            border-top: 1px solid #FFB800;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>