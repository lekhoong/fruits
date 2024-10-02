@extends('layouts.app')

@section('title', 'Track Purchases')

@section('content')
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 logo_section">
                <a href={{ route('index') }}><img src="images/logo.png" alt="back" /></a>
            </div>
        </div>
    </div>
</header>
<div class="container mt-5">
    <h2>PURCHASED</h2>
    @if($purchases->isNotEmpty())
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Delivery Method</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date Purchased</th>
                        <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $purchase)
                        <tr>
                            <td>
                                <ul>
                                    @foreach($purchase->items as $item)
                                        <li>
                                            {{ $item->product->name }} ({{ $item->quantity }}g)
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="align-middle">${{ number_format($purchase->total_price, 2) }}</td>
                            <td class="align-middle">{{ ucfirst($purchase->delivery_method) }}</td>
                            <td class="align-middle">{{ ucfirst($purchase->status) }}</td>
                            <td class="align-middle">{{ $purchase->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info text-center">
            You have no purchase records.
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
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
        padding: 10px;
    }

    .thead-dark th {
        background-color: #343a40;
        color: white;
    }

    .alert-info {
        background-color: #d1ecf1;
        color: #0c5460;
        border-radius: 15px;
    }
</style>
@endsection
