@extends('layouts.pos')
@section('content')
<br><br>

    <form class="width-half" action="/product/add" method="post">
        <p class="lead">Add Product</p>

        <div class="form-group">
          <label for="brandnm">Brand Name: </label>
          <input type="text" class="form-control" name="brandnm" id="brandnm" placeholder="Brand Name" required>
        </div>

        <div class="form-group">
          <label for="genericnm">Generic Name: </label>
          <input type="text" class="form-control" name="genericnm" id="genericnm" placeholder="Generic Name"required>
        </div>

        <div class="form-group">
                <label for="catdesc">Category/Description: </label>
                <input type="text" class="form-control" name="catdesc" id="catdesc" placeholder="Category"required>
        </div>

        <div class="form-group">
                <label for="date">Date Arrival: </label>
                <input type="date" class="form-control" name="arrival" value="" required/>
        </div>

        <div class="form-group">
                <label for="date">Expiry Date: </label>
                <input type="date" class="form-control" name="exp" value="" required/>
        </div>

        <div class="form-group">
                <label for="sellpric">Selling Price: </label>
                <input type="text" class="form-control" name="sellpric" id="sellpric" placeholder="Selling Price" required>
        </div>

        <div class="form-group">
                <label for="originpric">Original Price: </label>
                <input type="text" class="form-control" name="originpric" id="originpric" placeholder="Original Price" required>
        </div>

        <div class="form-group">
                <label for="qty">Quantity: </label>
                <input type="text" class="form-control" name="qty" id="qty" placeholder="Quantity" required>
        </div>

        @csrf
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
