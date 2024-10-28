@extends('admin.layouts.admin')
@section('title','Show Product')
@section('admincontent')

<div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-6">
        {{-- <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3> --}}
        <div class="col-12">
          <img src="{{asset('storage/' . $product->image_path)}}" class="product-image" alt="Product Image">
        </div>
        {{-- <div class="col-12 product-image-thumbs">
          <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
          <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
          <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
          <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
          <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
        </div> --}}
      </div>
      <div class="col-12 col-sm-6">
        <h3 class="my-3">{{$product->name}}</h3>
        <p>Available: {{$product->availability ? 'Yes' : 'No'}}</p>
        <p>Amount: {{$product->amount}}</p>
        <hr>
        <div class="bg-gray py-2 px-3 mt-4">
          <h2 class="mb-0">
           Price: {{$product->price}}$
          </h2>
          <h4 class="mt-0">
          </h4>
        </div>

        <a class="btn btn-info btn-lg mt-3" href="{{route('products.edit', $product)}}">
            <i class="fas fa-pencil-alt">
            </i>
            Edit
        </a>

          <div data-toggle="dropdown" aria-expanded="false" class="btn btn-danger btn-lg dropdown-toggle mt-3" >
            <i class="fas fa-trash-alt">
            </i>
            Delete
          <div class="dropdown-menu" style="">
        
            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('remove_to_trush_product_{{$product->id}}').submit();">
              <form id="remove_to_trush_product_{{$product->id}}" action="{{route('products.destroy', $product)}}" method="POST">
                @csrf 
                @method('DELETE')
                <i>
                  </i>
                  Remove to trash
                </form>
            </a>

            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('force_delete_product_{{$product->id}}').submit();">
              <form id="force_delete_product_{{$product->id}}"  action="{{route('products.forceDelete',['id'=> $product->id , 'routeName' => Route::currentRouteName()])}}" method="POST">
                @csrf 
                @method('DELETE')
                <i>
                  </i>
                  Delete permently
                </form>
            </a>
        </div>
     </div>
        </div>

      

      </div>
    </div>
    <div class="row mt-4">
      <nav class="w-100">
        <div class="nav nav-tabs" id="product-tab" role="tablist">
          <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
          <a class="nav-item nav-link" id="product-categories-tab" data-toggle="tab" href="#product-categories" role="tab" aria-controls="product-categories" aria-selected="false">Categories</a>
        </div>
      </nav>
      <div class="tab-content p-3" id="nav-tabContent">
        <div class="tab-pane fade active show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{$product->description}}</div>
        <div class="tab-pane fade" id="product-categories" role="tabpanel" aria-labelledby="product-categories-tab"> 
            <ul>
                @foreach ($product->categories as $category)
                <li>
                    {{$category->name}}                    
                </li>    
                @endforeach
            </ul>    
        </div>
      </div>
    </div>
  </div>
  @endsection