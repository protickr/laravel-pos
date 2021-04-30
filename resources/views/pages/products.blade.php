@extends('layouts.pos')

@section('content')
<br><br>
    <div class="center">
        <a href="/addproductForm" class="btn btn-primary mb-2">Add Product</a>
        @if(count($products) > 0)
            <p class="lead right">Total Number of Products: {{ count($products) }}</p>
        @endif
    </div>
    <br><br>
    <hr>

    @if(count($products) > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Brand Name</th>
                        <th>Generic Name</th>
                        <th>Category</th>
                        <th>Date Received</th>
                        <th>Expiry Date</th>
                        <th>Original Price</th>
                        <th>Selling Price</th>
                        <th>QTY</th>
                        <th>QTY Left</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->brandnm}}</td>
                        <td>{{ $product->genericnm}}</td>
                        <td>{{ $product->catdesc}}</td>
                        <td>{{ $product->arrival}}</td>
                        <td>{{ $product->exp}}</td>
                        <td>{{ $product->originpric}}</td>
                        <td>{{ $product->sellpric}}</td>
                        <td>{{ $product->qty}}</td>
                        <td>{{ $product->qtyleft}}</td>
                        <td>{{ $product->qtyleft * $product->sellpric}}</td>
                        <td><a href="/product/delete/{{ $product->id }}">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
    <p class="lead">There is no product</p>
    @endif
@endsection
