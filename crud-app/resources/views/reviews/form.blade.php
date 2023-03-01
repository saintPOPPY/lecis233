    {{-- Input --}}
      <div class="form-group">
        {{-- Display error messages if they exist --}}
        @if ($errors->any())
          <div class="toast toast-error">
            @foreach ($errors->all() as $error)
              <span>{{$error}}</span><br />
            @endforeach
          </div>
        @endif
        {{-- Product_ID (Hidden) --}}
        <label class="form-label" for="product_id" hidden>Product ID</label>
        <input type="number" name="product_id" class="form-control" value="{{$product->id}}" hidden />

        {{-- Rating --}}
        <label for="rating">Your Rating</label>
        <select class="form-control" name="rating" id="rating" value="{{ $product->rating }}">
          <option selected>Rate this Product</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
        
        {{-- Comments --}}
        <label for="comment">Comments</label>
        <textarea class="form-control" name="comment" id="comment" rows="4" value="{{ $product->comment }}">Begin typing your review here...</textarea>
      </div>

      {{-- Add Review Button --}}
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Review</button>
      </div>