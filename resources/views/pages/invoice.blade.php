@extends('layouts.pos')

@section('content')
<br><br>
<h4 class="align-content-center">Sales Invoice</h4>
<hr>

<p class = "lead">Customer Name: {{ $customerName }}</p>
<p class = "lead">Date: <?php echo date("l jS \of F Y h:i:s A");?></p>
@if(count($carts)>0)
    <p class="lead">Products: </p>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Quantitiy</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                <tr>
                    <td>{{ $cart->brandnm}}</td>
                    <td>{{ $cart->genericnm}}</td>
                    <td>{{ $cart->qty}}</td>
                    <td>{{ $cart->price}}</td>
                    <td>{{ $cart->amount}}</td>
                </tr>
                @endforeach
                <tr>
                    <td>Total: </td>
                    <td>{{ $total }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    <form class="form-inline" action="/cart/invoice" method="post">
        <input type="hidden" name = "customersName" value ="{{ $customerName }}"/>
        @csrf
        <button type="submit" class="btn btn-primary mb-2">Print</button>
    </form>
@endsection
