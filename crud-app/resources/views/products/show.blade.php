@extends('layout')

@section('content')
<h3>Product Details</h3>
<table class="table table-striped mb-5">
    <thead>
      <tr class="table-success">
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Price</th>
        <th scrope="col">Description</th>
        <th scope="col justify-content-center">Item Number</th>
        <th scope="col">Image</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->name }}</td>
            <td>${{ $product->price }}</td>
            <td>{{$product->description}}</td>
            <td>{{ $product->item_number }}</td>
            <td><img src="{{$product->image}}" alt="{{$product->image}}" class="img-thumbnail"></td>
        </tr>
    </tbody>
</table>   

<p>
    <a href="{{ route('products.index') }}">All Products</a>
</p>
@endsection