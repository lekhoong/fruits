@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 logo_section">
                <a href={{ route('juice') }}><img src="images/logo.png" alt="back" /></a>
            </div>
        </div>
    </div>
</header>
<div class="container mt-5">
    @if($cartItems->isNotEmpty())
        <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Total mass</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ $item->product->image }}" alt="product" class="img-thumbnail cart-image">
                                </td>
                                <td class="align-middle">{{ $item->product->name }}</td>
                                <td class="align-middle">{{ $item->quantity }}g</td>
                                <td class="align-middle">${{ number_format(($item->price / 100) * $item->quantity, 2) }}</td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('remove', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-oval">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <!-- 显示总价 -->
                        <tr>
                            <td colspan="3" class="text-right"><strong>Total Price:</strong></td>
                            <td class="align-middle">${{ number_format($totalPrice, 2) }}</td>
                            <td></td>
                        </tr>
                        <!-- Add a row for the Delivery/Pick Up selection -->
                        <tr>
                            <td colspan="5">
                                <div class="text-center mb-3">
                                    <form action="{{ route('checkout') }}" method="POST">
                                        @csrf
                                        <p class="form-label">Choose Delivery Method:</p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="delivery" name="delivery_method" value="delivery" checked>
                                            <label class="form-check-label" for="delivery">
                                                Delivery
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="pickup" name="delivery_method" value="pickup">
                                            <label class="form-check-label" for="pickup">
                                                Pick Up
                                            </label>
                                        </div>
                        
                                        <!-- Check Out button -->
                                        <button type="submit" class="btn btn-orange btn-oval mt-3">Check Out</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    
                </table>
           
        </div>
    @else
        <div class="alert alert-info text-center">
            Your cart is empty.
        </div>
    @endif
</div>

<style>
    .container {
        max-width: 900px;
        margin: 0 auto;
    }

    .table-responsive {
        background-color: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        overflow-x: auto; /* Allow horizontal scroll if needed */
    }

    .table {
        width: 100%; /* Ensure table spans the full width of the container */
        margin-bottom: 0; /* Remove bottom margin to reduce extra space */
        border-collapse: collapse; /* Remove spacing between table cells */
    }

    .table th, 
    .table td {
        text-align: center;
        vertical-align: middle;
        padding: 10px; /* Reduce padding to decrease space */
    }

    .cart-image {
        width: 80px;
        height: auto;
        border-radius: 10px;
    }

    .table thead th {
        background-color: #f8f9fa;
        color: orange;
        font-weight: bold;
        padding: 10px; /* Reduce padding for headers */
        border-bottom: 2px solid #dee2e6; /* Keep the bottom border for separation */
    }

    .table tbody tr {
        border-bottom: 1px solid #dee2e6; /* Optional: Add a subtle line between rows */
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 14px;
        border-radius: 20px; /* Oval shape */
    }

    .btn-lg {
        padding: 10px 20px;
        font-size: 18px;
        border-radius: 20px; /* Oval shape */
    }

    .btn-oval {
        border-radius: 20px; /* Oval shape */
        padding: 8px 20px; /* Adjust padding for better oval appearance */
        font-size: 16px;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-orange {
        background-color: orange;
        color: white;
        border: none;
    }

    .btn-orange:hover {
        background-color: #e07b00; /* Darker shade of orange on hover */
        color: white;
    }

    .alert-info {
        background-color: #d1ecf1;
        color: #0c5460;
        border-color: #bee5eb;
        border-radius: 15px;
    }

    .form-check-input {
        border-radius: 50%; /* Round shape for radio buttons */
    }

    .form-check-label {
        font-size: 16px;
    }

    .form-check {
        margin-bottom: 10px;
    }
</style>
@endsection
