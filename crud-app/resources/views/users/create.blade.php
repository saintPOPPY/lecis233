@extends('dashboard')

@section('content')
<div class="column col-3">
    <h3>Create a new user</h3>

    <form method="POST" action="{{route('users.store')}}">
        @csrf
        {{-- Data-entry Fields --}}
        <div class="form-group">
            @include('users.form')
        </div>

        {{-- Buttons to store data, or cancel and return to index --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Store User</button>
            <a href="{{route('users.index')}}">Cancel</a>
        </div>
    </form>
</div>
@endsection