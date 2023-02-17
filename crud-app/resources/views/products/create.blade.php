@extends('layout')

@section('content')
<div class="column col-3">
    <h3>Create a new Product</h3>

    {{-- Display error messages if they exist --}}
    @if ($errors->any())
    <div class="toast toast-error">
        @foreach ($errors->all() as $error)
            <span>{{$error}}</span><br />
        @endforeach
    </div>
    @endif

    <form method="POST" action="{{route('products.store')}}">
        {{-- Data-entry Fields --}}
        <div class="form-group">
            <label class="form-label" for="name">Name</label>
            <input class="form-input" type="text" name="name" id="name">
            <label class="form-label" for="price">Price</label>
            <input class="form-input" type="text" name="price" id="price">
            <label class="form-label" for="description">Description</label>
            <input class="form-input" type="text" name="description" id="description">
            <label class="form-label" for="item_number">Item Number</label>
            <input class="form-input" type="text" name="item_number" id="item_number">
            <label class="form-label" for="image">Image URL</label>
            <input class="form-input" type="text" name="image" id="image">
        </div>

        {{-- Buttons to store data, or cancel and return to index --}}
        <div class="form-group">
            @csrf
            <button type="submit" class="btn btn-primary">Store Product</button>
            <a href="{{route('products.index')}}">Cancel</a>
        </div>
    </form>
</div>
@endsection