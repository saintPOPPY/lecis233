@extends('layout')

@section('content')

<div class="container mt-3">
  <h3>Product Details</h3>
  {{-- Product Details --}}
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

    {{-- Return to All Products --}}
    <p>
      <a href="{{ route('products.index') }}">All Products</a>
    </p>
</div>

{{-- Review Section --}}
  <div class="container mt-3">
      <h3>Leave a Review!</h3>
    <form action="{{ route('reviews.store') }}" method="POST">
      @csrf

      {{-- Rating & Comment Input --}}
      <div class="form-group">
        
        {{-- Product_ID (Hidden) --}}
        <label class="form-label" for="product_id" hidden>Product ID</label>
        <input type="hidden" name="product_id" id="product_id" value="{{ $product->product_id }}">

        {{-- Rating --}}
        <label for="rating">Your Rating</label>
        <select class="form-control" name="rating" id="rating" value="{{old('rating', $product->rating)}}">
          <option selected>Rate this Product</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
        
        {{-- Comments --}}
        <label for="comment">Comments</label>
        <textarea class="form-control" name="comment" id="comment" rows="4" value="{{old('comment', $product->comment)}}">Begin typing your review here...</textarea>
      </div>

      {{-- Add Review Button --}}
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Review</button>
      </div>
    </form>
  </div>
  
  {{-- Table of Reviews --}}
  <div class="container mt-3">
    <h2>Feedback</h2>
    <table class="table table-striped mb-5">
      <thead>
        <tr class="table-success">
          <th scope="col">Rating</th>
          <th scope="col">Comments</th>
          <th>{{-- Delete --}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($product->review as $review)
        @csrf
        <tr>
            <td>{{ $review->rating }}</td>
            <td>{{ $review->comment }}</td>
            <td>
              <form action="{{route('reviews.destroy', $review)}}" method="POST" onSubmit="return confirm('Are you sure you want to delete?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-error" type="submit">Delete</button>
              </form>
            </td>
        </tr>
        @endforeach
      </tbody>
  </div>
@endsection