@extends('admin.layout_create')
@section('styles')
<style>
    .form-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-container .form-label {
        font-weight: bold;
    }
</style>
@endsection

@section('content')
<div class="container mt-5">
    
    <h1 class="title text-center">Add New Product</h1>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="form-container">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control" required step="0.01" value="{{ old('price') }}">
            </div>
            <div class="mb-3">
                <label for="product_id" class="form-label">product_id</label>
                <input type="text" name="product_id" id="product_id" class="form-control" rows="4">{{ old('product_id') }}</input>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="image" id="images" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</div>
@endsection

