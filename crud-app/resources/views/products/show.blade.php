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

{{-- Submit Review Section --}}
  <div class="container mt-3">
    <h3>Leave a Review!</h3>
    <form action="{{ route('reviews.store') }}" method="POST">
      @csrf
      @include('reviews.form')
    </form>
  </div>
  
  {{-- Table of Reviews --}}
  <div class="container mt-3">
    <h2>Feedback</h2>

    @if ($product->reviews)
      <table class="table table-striped mb-5">
      <thead>
        <tr class="table-success">
          <th scope="col">Rating</th>
          <th scope="col">Comments</th>
          <th>{{-- Delete --}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($product->reviews as $review)
        @csrf
        <tr>
            <td>
              @for ($i = 0;  $i < $review->rating; $i++)
              &starf;
              @endfor
            </td>
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
    </table>    
    @else
      <h3>No Reviews yet</h3>    
    @endif
    
  </div>
@endsection