@extends('dashboard')

@section('content')

@can('create', App\Models\User::class)
  <a class="btn btn-primary" href="{{route('users.create')}}">Create</a>
@endcan

 <div class="container mt-3">
  {{-- Paginated Links (Top) --}}
  <div class="d-flex justify-content-center">
    {{ $users->links() }}
  </div>

  {{-- Data Table (Seeded) --}}
  <table class="table table-striped mb-5">
    <thead>
      <tr class="table-success">
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th>{{-- Show Detail --}}</th>
        <th>{{-- Edit Detail --}}</th>
        <th>{{-- Delete --}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>

        {{-- Permissions Conditions --}}
        @can('viewAny', App\Models\User::class)
        <td><a href="{{route('users.show', $user->id)}}">Show Details</a></td>
        <td><a class=bootstrap class href="{{route('users.edit', $user->id)}}">Edit</a></td>
        {{-- Destroy Form... --}}
        <td>
          <form action="{{route('users.destroy', $user->id)}}" method="POST" onSubmit="return confirm('Are you sure you want to delete?');">
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
    {{ $users->links() }}
  </div>

</div> 
@endSection