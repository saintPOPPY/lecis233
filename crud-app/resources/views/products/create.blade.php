@extends('layout')

@section('content')
<div class="column col-3">
    <h3>Create a new Product</h3>

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
    </div>
</div>
@endsection