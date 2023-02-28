@extends('layout')

@section('content')

<h3>Product Details</h3>

<table class="table table-striped mb-5">
    <thead>
      <tr class="table-success">
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Product Name</th>
        <th scope="col">Price</th>
        <th scrope="col">Description</th>
        <th scope="col justify-content-center">Item Number</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td><img src="{{$product->image}}" alt="{{$product->image}}" class="img-thumbnail"></td>
            <td>{{ $product->name }}</td>
            <td>${{ $product->price }}</td>
            <td>{{$product->description}}</td>
            <td>{{ $product->item_number }}</td>
        </tr>
    </tbody>
</table>  

<p>
    <a href="{{ route('products.index') }}">All Products</a>
</p>

{{-- Review Form --}}
<form method="POST" action="{{route('reviews.store', $product->product_id)}}">
  @csrf
  <label class="form-label" for="product_id" hidden>Product ID</label>
  <input type="hidden" name="product_id" id="product_id" value="{{ $product->product_id }}">

  <h3>Leave a Review!</h3>
  
  <div class="form-group">
    <label for="ratingFormControlSelect1">Your Rating</label>
    <select class="form-control" id="ratingFormControlSelect1">
      <option selected>Rate this Product</option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  
  <div class="form-group">
    <label for="commentsFormControlTextarea1">Comments</label>
    <textarea class="form-control" id="commentsFormControlTextarea1" rows="4">Begin typing your review here...</textarea>
  </div>

{{-- Button to add review --}}
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Add Review</button>
  </div>           
</form>

<p></p>

{{-- Submitted Reviews --}}


@endsection