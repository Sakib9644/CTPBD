
@extends('layouts.admin', ['title' => 'Products'])

@section('mainContent')
    <div class="container">
        <div class="row row-gap-3">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="col-md-4">
                    <label for="product_image">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="product_image">Product Image</label>
                    <input type="file" name="product_image" id="product_image" class="form-control">
                </div>
                <div>
                    <p class="fw-bold m-0">Categories:</p>

                    @php
                    $categories = App\Models\Category::all();
                    @endphp
                    <div>
                        <select name="category_id" id="" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Create Prudct</button>
                </div>
            </form>
            

        </div>
    @endsection

