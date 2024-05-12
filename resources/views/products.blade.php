@extends('layouts.admin', ['title' => 'Products'])

@section('mainContent')
    <div class="">
        <a href="{{ route('products.create') }}" class="btn btn-info mb-sm-3">Add New Product</a>

        <table class="table table-striped table-bordered" id="systemDatatable">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->product_name }}</td>
                        <td><img src="{{ asset('uploads/products/'.$product->product_image) }}" alt="product Image" height="100px"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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
        $(document).ready(function() {
            $('#systemDatatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    'print'
                ]
            });
        });
    </script>
@endsection
