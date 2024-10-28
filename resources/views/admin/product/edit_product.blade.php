@extends('admin.layouts.admin')
@section('title','Edit Product')
@section('admincontent')

<form action="{{route('products.update', $product)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
    <div class="card-body">
        <h4>Edit Product</h4>
     
        <div class="form-group">
          <label>Product Name</label>
          <input name="name" value="{{$product->name}}" type="text" class="form-control form-control-border border-width-2">
        </div>
    
        <div class="form-group">
          <label>Brand</label>
          <input name="brand" value="{{$product->brand}}" type="text" class="form-control form-control-border border-width-2">
        </div>
    
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Enter ...">{{$product->description}}</textarea>
          </div>
          
          <label>Price</label>
        <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-dollar-sign"></i>
              </span>
            </div>
            <input name="price" value="{{$product->price}}" type="number" class="form-control">
            <div class="input-group-append">
            </div>
          </div>

          <label class="mt-3">Amount</label>
        <div class="input-group">
            <input name="amount" value="{{$product->amount}}" type="number" class="form-control">
            <div class="input-group-append">
            </div>
          </div>

              <div class="form-group mt-3" data-select2-id="51">
                  <label>Categories</label>
                  <select name="categories_ids[]" class="select2bs4 select2-hidden-accessible" multiple data-placeholder="Select a State" style="width: 100%;" data-select2-id="23" tabindex="-1" aria-hidden="true">
                    @foreach ($categories as $category)
            <option value="{{$category->id}}" {{$product->categories->contains($category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                  </select>
               </div>

          <div class="form-group">
          <label >Image</label>
          <div class="custom-file">
            <input name="image" type="file" class="custom-file-input">
            <label class="custom-file-label">Choose file</label>
          </div>
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
              <input name="availability" value="1" type="checkbox" class="custom-control-input" id="customSwitch3" {{$product->availability ? 'checked' : ''}}>
              <label class="custom-control-label" for="customSwitch3">Show/Hide From Shop</label>
            </div>
          </div>

        </div>
        <input type="submit" class="btn btn-outline-primary btn-lg ms-4 mb-5" value="Edit">
</form>

  @endsection