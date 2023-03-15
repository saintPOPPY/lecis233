@extends('dashboard')

@section('content')
<div class="column col-3">
    <h3>Create a new Product</h3>

    <form method="POST" action="{{route('products.store')}}">
        @csrf
        {{-- Data-entry Fields --}}
        <div class="form-group">
            @include('products.form')
        </div>

        {{-- Buttons to store data, or cancel and return to index --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Store Product</button>
            <a href="{{route('products.index')}}">Cancel</a>
        </div>
    </form>
</div>
@endsection