@extends('dashboard')

@section('content')

<div class="container mt-3">
  <h3>Product Details</h3>
  {{-- Product Details --}}
  <table class="table table-striped mb-5">
    <thead>
      <tr class="table-success">
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>${{ $user->email }}</td>
            <td>{{$user->password}}</td>
        </tr>
    </tbody>
  </table>  

    {{-- Return to All Products --}}
    <p>
      <a href="{{ route('users.index') }}">All Users</a>
    </p>
</div>
@endsection