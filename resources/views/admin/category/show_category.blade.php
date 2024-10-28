@extends('admin.layouts.admin')
@section('title','Show Category')
@section('admincontent')

<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Category Detail</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
            <div class="row">
            
        
            </div>
            <div class="row">
              <div class="col-12">
                <h4>Recently products added</h4>
                
                
                @foreach ($latestProducts as $product)
                  <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                      <span class="username">
                        <a href="#">{{$product->name}}</a>
                      </span>
                      <span class="description">Added At: {{$product->created_at}}</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                   {{$product->description}}
                    </p>

                    <p>
                      <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> brand : {{$product->brand}}</a>
                    </p>
                    <p>
                      <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Price : {{$product->price}}$</a>
                    </p>
                  </div>
                  @endforeach
               

              
                  
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
            <h3 class="text-primary"><i class="fas fa-certificate mx-2      "></i> {{$category->name}}</h3>
            
                <div class="info-box bg-light mt-5">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Products Related</span>
                    <span class="info-box-number text-center text-muted mb-0">{{$category->products_count}}</span>
                  </div>
                </div>
           
            <div class="text-center d-flex justify-content-end">
                <a class="btn btn-info btn-sm me-1" href="{{route('categories.edit', $category)}}">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                </a>
              <a href="javascript:{}" onclick="document.getElementById('delete_category_{{$category->id}}').submit();">
                <form id="delete_category_{{$category->id}}" class="btn btn-danger btn-sm" action="{{route('categories.destroy', $category)}}" method="POST">
                  @csrf 
                  @method('DELETE')
                  <i class="fas fa-trash">
                    </i>
                    Delete
                    
                  </form>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  @endsection