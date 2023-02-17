@extends('layout')

@section('content')

<div class="container mt-3">

  {{-- Create Button Link --}}
  <a class="btn btn-primary" href="{{route('products.create')}}">Create Product</a>

  {{-- Paginated Links (Top) --}}
  <div class="d-flex justify-content-center">
    {{ $products->links() }}
  </div>

  {{-- Data Table (Seeded) --}}
  <table class="table table-striped mb-5">
    <thead>
      <tr class="table-success">
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Price</th>
        <th scope="col justify-content-center">Item Number</th>
        <th scope="col">Image</th>
        <th>{{-- Show Detail --}}</th>
        <th>{{-- Edit Detail --}}</th>
        <th>{{-- Delete --}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <th scope="row">{{ $product->id }}</th>
        <td>{{ $product->name }}</td>
        <td>${{ $product->price }}</td>
        <td>{{ $product->item_number }}</td>
        <td><img src="{{$product->image}}" alt="{{$product->image}}" class="img-thumbnail"></td>
        <td><a href="{{route('products.show', $product->id)}}">Show Detail</a></td>
        <td><a class=bootstrap class href="{{route('products.edit', $product->id)}}">Edit</a></td>
        
        {{-- Destroy Form... --}}
        <td>
          <form action="{{route('products.destroy', $product->id)}}" method="POST" onSubmit="return confirm('Are you sure you want to delete?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-error" type="submit">Delete</button>
          </form>
        </td>
        {{-- ... end of Destroy Form --}}

      </tr>
      @endforeach
    </tbody>
  </table>
  
  {{-- Paginated Links (Bot) --}}
  <div class="d-flex justify-content-center">
    {{ $products->links() }}
  </div>

</div>
@endSection