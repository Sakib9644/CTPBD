@extends('layouts.admin', ['title' => 'Product'])

@section('mainContent')
@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
            </div>
            <!-- Add more fields as needed -->
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection

@endsection
