@extends('dashboard')

@section('content')
<div class="column col-3">
    <h3>Edit a User</h3>

    {{-- Display error messages if they exist --}}
    @if ($errors->any())
    <div class="toast toast-error">
        @foreach ($errors->all() as $error)
            <span>{{$error}}</span><br />
        @endforeach
    </div>
    @endif

    <form method="POST" action="{{route('users.update', $user->id)}}">
        @csrf
        @method('PUT')

        {{-- Data-entry Fields --}}
        <div class="form-group">
            @include('users.form')
        </div>

        {{-- Buttons to store data, or cancel and return to index --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save User</button>
            <a href="{{route('users.index')}}">Cancel</a>
        </div>
    </form>
</div>
@endsection