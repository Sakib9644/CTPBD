@extends('layouts.customer')

@section('content')
    <div class="container d-flex justify-content-start align-items-center flex-wrap  vh-100 p-5">
            <div class="col-md-12">
                <h2>Products</h2>
            </div>
            @foreach ($products as $product)
            <div class="col-md-3 my-2  ">
                <div class="card">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <img src="{{ asset('uploads/products/' . $product->product_image) }}" alt="Product Image" height="100px">

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark w-100 ">Buy Now</button>

                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-md-12 ">
                <h2>Categories</h2>
            </div>
            @php
                $categories = \App\Models\Category::all();
            @endphp
       @foreach ($categories as $category)
       <div class="col-md-3 my-2">
           <div class="card">
               <div class="card-body rounded" style="">
                   <h5 class="card-title">{{ $category->category_name }}</h5>
                   <!-- Display any other category details as needed -->
               </div>
           </div>
       </div>
   @endforeach
   
     
    </div>
@endsection
