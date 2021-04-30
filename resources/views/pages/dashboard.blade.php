@extends('layouts.pos')

@section('content')
<br><br>
Dashboard
<hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Number Of Customers</th>
                <th>Number Of Products</th>
                <th>Total Sale</th>
            </tr>
            @isset($dash)
                <tr>
                    <td>{{ $dash["numOfCustomer"] }}</td>
                    <td>{{ $dash["numOfProduct"] }}</td>
                    <td>{{ $dash["totalSell"] }}</td>
                </tr>
            @endisset
        </table>
    </div>
@endsection


