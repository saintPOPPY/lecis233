{{-- Display error messages if they exist --}}
@if ($errors->any())
    <div class="toast toast-error">
        @foreach ($errors->all() as $error)
            <span>{{$error}}</span><br />
        @endforeach
    </div>
@endif

{{-- Shared fillable data form for Create/Update --}}
<label class="form-label" for="name">Name</label>
<input class="form-input" type="text" name="name" id="name" value="{{old('name', $user->name)}}">
<label class="form-label" for="email">Email</label>
<input class="form-input" type="text" name="email" id="email" value="{{old('email', $user->email)}}">

