@extends('layout')

@section('content')
<h3>Products</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th></th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Item Number</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $product)
    <tr>
      <td>{{$product->image}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->item_number}}</td>
      <td><a href="{{ route('products.show', $product->id) }}">Show Detail</a></td>
      <td><a href="{{ route('products.edit', $product->id) }}">Edit Detail</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection