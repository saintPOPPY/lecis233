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
<input class="form-input" type="text" name="name" id="name" value="{{old('name', $product->name)}}">
<label class="form-label" for="price">Price</label>
<input class="form-input" type="text" name="price" id="price" value="{{old('price', $product->price)}}">
<label class="form-label" for="description">Description</label>
<input class="form-input" type="text" name="description" id="description" value="{{old('description', $product->description)}}">
<label class="form-label" for="item_number">Item Number</label>
<input class="form-input" type="text" name="item_number" id="item_number" value="{{old('item_number', $product->item_number)}}">
<label class="form-label" for="image">Image URL</label>
<input class="form-input" type="text" name="image" id="image" value="{{old('image', $product->image)}}">