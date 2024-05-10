@extends('layouts.admin', ['title' => 'Categories'])

@section('mainContent')
    <div class="container">

        <a href="{{ route('categories.create') }}" class="btn btn-info mb-3">Add New Category</a>
        <div class="row row-gap-3">

            @foreach ($categories as $category)
                <div class="col-md-6">
                    <div class="single-category">
                        <h3 class="fw-bold">{{ $category->category_name }}</h3>
                        @foreach ($category->products as $product )
                        <strong>Product Name:</strong> <p class="m-0">  {{ $product->product_name }}</p>
                            <img src="{{ asset('uploads/products/'.$product->product_image) }}" alt="product Image" height="100px">
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <!-- Pagination links can be added here -->
            </ul>
        </nav>

    </div>
@endsection
