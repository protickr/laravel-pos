@extends('layouts.pos')
@section('content')
<br><br>

<div class="center">
    <form class="form-inline" action="/customer/add" method="post">
        <div class="form-group mb-2">
            <label for="name" class="sr-only">Name </label>
            <input type="text" class="form-control" name="fullName" id="" value="" placeholder="Full Name">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="profession" class="sr-only">Profession</label>
            <input type="text" class="form-control" name="prof" id="" placeholder="Profession">
        </div>
         @csrf
        <button type="submit" class="btn btn-primary mb-2">Add User</button>
    </form>
    @if(count($customers) > 0)
        <p class="lead right">Total Number of Customer: {{ count($customers) }}</p>
    @endif
</div>

<br><br>
<hr>
    @if(count($customers) > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Customer Name</th>
                        <th>Profession</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->name}}</td>
                            <td>{{ $customer->profession}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="lead">There is no customer</p>
    @endif
@endsection
