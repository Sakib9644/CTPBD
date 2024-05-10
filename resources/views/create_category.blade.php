@extends('layouts.admin', ['title' => 'Categories'])

@section('mainContent')
    <div class="container">
        <div class="row row-gap-3">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
            
                <div class="col-md-4">
                    <label for="category_name">Category Name</label>
                    <input type="text" name="category_name" id="category_name" class="form-control">
                </div>
            
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </div>
            </form>
            

        </div>
    @endsection
