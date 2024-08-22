<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Order Page')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #FFB800, #FF9500); /* 主页面颜色渐变 */
            color: #333;
            font-family: 'Nunito', sans-serif;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 30px;
        }
        .order-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        .product-img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
            border-radius: 50px;
            margin: 5px;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        .weight-btns {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }
        .price-weight {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .price-weight span {
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>
</head>