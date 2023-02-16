@extends('layout')

@section('content')
<h3>Show Product Detail</h3>
<p>
    {{$product->name}}
    {{$product->price}}
    {{$product->description}}
    {{$product->item_number}}
    {{$product->image}}
</p>

<p>
    <a href="{{ route('products.index') }}">All Products</a>
</p>
@endsection