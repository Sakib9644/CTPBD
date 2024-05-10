@extends('layouts.admin', ['title' => 'Products'])

@section('mainContent')
    <div class="">
        <a href="{{ route('products.create') }}" class="btn btn-info mb-sm-3">Add New Product</a>

        <div class="products mb-3">
            @foreach ($products as $product)
                <div class="__single">
                   
                    <div class="row  row-gap-3">
                        <div class="form-group ">
                            <H4 for="">Product</H4>

                            <p><strong>Product Name:</strong>{{ $product->product_name }}</p>
                            <img src="{{ asset('uploads/products/'.$product->product_image) }}" alt="product Image" height="100px">

                        </div>
                 

                    </div>
                </div>
            @endforeach
        </div>

        <nav aria-label="Page navigation example mt-2">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>


    <script>
        $("#imgSrc").attr('src', "https://ui-avatars.com/api/?background=random&color=fff&name={{ auth()->user()->name }}");
    </script>
@endsection
