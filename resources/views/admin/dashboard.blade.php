@extends('admin.layout')

@section('styles')
<style>
    /* General body and container settings */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f7fb;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px;
    }

    /* Header Section */
    .title {
        text-align: center;
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 40px;
        font-weight: bold;
    }

    /* Order cards container with grid */
    .order-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 20px;
    }

    /* Order card */
    .order-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .order-card:hover {
        transform: translateY(-10px);
    }

    /* Header of order card */
    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .order-header h3 {
        font-size: 1.5rem;
        color: #333;
    }

    /* Status badge */
    .status {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.9rem;
    }

    .status.pending {
        background-color: #f39c12;
        color: white;
    }

    .status.completed {
        background-color: #2ecc71;
        color: white;
    }

    /* Body content */
    .order-body {
        flex-grow: 1;
    }

    .order-info p {
        margin: 5px 0;
        font-size: 1rem;
        color: #555;
    }

    .order-items ul {
        list-style-type: none;
        padding-left: 0;
    }

    .order-items li {
        font-size: 1rem;
        color: #777;
    }

    /* Footer with buttons */
    .order-footer {
        margin-top: 15px;
        text-align: center;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        font-size: 1rem;
    }

    .mark-delivered {
        background-color: #3498db;
        color: white;
    }

    .mark-delivered:hover {
        background-color: #2980b9;
    }

    .completed {
        background-color: #95a5a6;
        color: white;
    }

    .completed:disabled {
        background-color: #7f8c8d;
        cursor: not-allowed;
    }

    /* Pagination styling */
    .pagination {
        display: flex;
        justify-content: center;
        padding: 20px;
    }

    .pagination .page-item {
        margin: 0 5px;
    }

    .pagination .page-link {
        padding: 10px 15px;
        border-radius: 5px;
        color: #3498db;
        text-decoration: none;
        border: 1px solid #ddd;
    }

    .pagination .page-link:hover {
        background-color: #3498db;
        color: white;
    }

    .pagination .active .page-link {
        background-color: #2980b9;
        color: white;
        border: none;
    }

    /* 搜索表单样式 */
    .input-group {
        margin-bottom: 20px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h1 class="title">Admin Dashboard</h1>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- 搜索表单 -->
    <form action="{{ route('admin.dashboard') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search orders by ID or customer name..." value="{{ old('search', $search) }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <!-- 订单列表 -->
    <div class="order-container">
        @foreach ($purchases as $purchase)
            <div class="order-card">
                <div class="order-header">
                    <h3>Order #{{ $purchase->id }}</h3>
                    <span class="status {{ $purchase->status === 'pending' ? 'pending' : 'completed' }}">
                        {{ ucfirst($purchase->status) }}
                    </span>
                </div>
                <div class="order-body">
                    <div class="order-info">
                        <p><strong>Customer:</strong> {{ $purchase->user->name }}</p>
                        <p><strong>Address:</strong> {{ $purchase->user->address }}</p>
                        <p><strong>Total Price:</strong> ${{ $purchase->total_price }}</p>
                        <p><strong>Delivery Method:</strong> {{ $purchase->delivery_method }}</p>
                    </div>
                    <div class="order-items">
                        <strong>Items:</strong>
                        <ul>
                            @foreach ($purchase->Items as $item)
                                <li>{{ $item->product->name }} - Qty: {{ $item->quantity }}g</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="order-footer">
                    @if($purchase->status === 'pending')
                        <form action="{{ route('admin.updateStatus', $purchase->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn mark-delivered">Mark as Delivered</button>
                        </form>
                    @else
                        <button class="btn completed" disabled>Completed</button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- 分页 -->
    <div class="pagination">
        {{ $purchases->links() }}
    </div>
</div>
@endsection
