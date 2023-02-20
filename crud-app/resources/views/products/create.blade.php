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