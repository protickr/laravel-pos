@extends('layouts.pos')

@section('content')
<br><br>
    @if(count($products) > 0)
        <p class="lead">Select Product and quantity to Sell</p>

        <form class="" action="/cart/add" method="post">
            <div class="form-group">
                <select class="form-control" id="product" name="product">
                    @foreach ($products as $product )
                        <option value="{{ $product->id }}">{{ $product->brandnm }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="qty" id="qty" placeholder="Quantity" required>
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">Add To Cart</button>
        </form>
    @else
    <p class="lead">There is no product to sell</p>
    @endif

    <br><br><br>
    <hr>

    @if(count($carts)>0)
        <p class="lead">Cart: </p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Product ID</th>
                        <th>Brand Name</th>
                        <th>Generic Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantitiy</th>
                        <th>Amount</th>
                        <th>Profit</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($carts as $cart)
                <tr>
                    <td>{{ $cart->productid}}</td>
                    <td>{{ $cart->brandnm}}</td>
                    <td>{{ $cart->genericnm}}</td>
                    <td>{{ $cart->catdesc}}</td>
                    <td>{{ $cart->price}}</td>
                    <td>{{ $cart->qty}}</td>
                    <td>{{ $cart->amount}}</td>
                    <td>{{ $cart->profit}}</td>
                    <td><a href="/cart/delete/{{ $cart->id }}">Delete</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <form class="" action="/cart/checkout" method="get">
            <div class="form-group">
                <select class="form-control" id="customer" name="customer">
                    Select Cusomer:
                    @foreach ($customers as $customer )
                        <option value="{{ $customer->name }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Check Out</button>
        </form>

        @else
        <p class="lead">Cart Is Empty</p>
    @endif
    <br><br><br>
@endsection

