@extends('dashboard')

@section('content')

@can('create', App\Models\Product::class)
  <a class="btn btn-primary" href="{{route('products.create')}}">Create</a>
@endcan

<div class="container mt-3">
  {{-- Paginated Links (Top) --}}
  <div class="d-flex justify-content-center">
    {{ $products->links() }}
  </div>

  {{-- Data Table (Seeded) --}}
  <table class="table table-striped mb-5">
    <thead>
      <tr class="table-success">
        <th scope="col justify-content-center">Item Number</th>
        <th scope="col">Image</th>
        <th scope="col">Product Name</th>
        <th scope="col">Price</th>
        <th>{{-- Show Detail --}}</th>
        <th>{{-- Edit Detail --}}</th>
        <th>{{-- Delete --}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{ $product->item_number }}</td>
        <td><img src="{{$product->image}}" alt="{{$product->image}}" class="img-thumbnail"></td>
        <td>{{ $product->name }}</td>
        <td>${{ $product->price }}</td>
        <td><a href="{{route('products.show', $product->id)}}">Show Details</a></td>

        {{-- Permissions Conditions --}}
        @can('viewAny', App\Models\Product::class)
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
        @endcan
        {{-- End Permissions Conditions --}}
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