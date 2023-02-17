@extends('layout')

@section('content')

<div class="container mt-5">
  <a class="btn btn-primary" href="{{route('products.create')}}">Create Product</a>
  <table class="table table-bordered mb-5">
    <thead>
      <tr class="table-success">
        <th scope="col">#</th>
        <th scope="col">Product name</th>
        <th scope="col">Price</th>
        <th scope="col">Description</th>
        <th scope="col">Item Number</th>
        <th scope="col">Image</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <th scope="row">{{ $product->id }}</th>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->item_number }}</td>
        <td><img src="{{$product->image}}" alt="{{$product->image}}" class="img-thumbnail"></td>
        <td><a href="{{route('products.show', $product->id)}}">Show Detail</a></td>
        <td><a class=bootstrap class href="{{route('products.edit', $product->id)}}">Edit</a></td>
        <td>
          <form action="{{route('products.destroy', $product->id)}}" method="POST" onSubmit="return confirm('Are you sure you want to delete?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-error" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
  <div class="d-flex justify-content-center">
    {{ $products->links() }}
  </div>

</div>

@endSection