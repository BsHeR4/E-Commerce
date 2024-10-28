@extends('admin.layouts.admin')
@section('title','List Products')
@section('admincontent')
    <!-- Default box -->

    <div class="col-md-8 offset-md-2 mb-3">
      <form action="{{route('products.index')}}" method="GET" id="searchForm">
          <div class="row">
              <div class="col-md-8">
                  <div class="input-group">
                      <input name="product_name" type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                      <div class="input-group-append">
                          <button type="submit" class="btn btn-lg btn-default">
                              <i class="fa fa-search"></i>
                          </button>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <select name="category_id" class="form-control form-control-lg" onchange="document.getElementById('searchForm').submit();">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                          <option value="{{$category->id}}" {{ $category->id == $category_id ? 'selected' : '' }}>{{$category->name}}</option>
                      @endforeach
                  </select>
              </div>
          </div>
      </form>
  </div>
  
  



  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Products</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
 
      </div>
      
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">
                      Id
                  </th>
                  <th style="width: 8%">
                      Product Name
                  </th>
                  <th style="width: 8%">
                      Brand
                  </th>
                  {{-- <th style="width: 7%" >
                      categories
                  </th> --}}
                  <th style="width: 7%" >
                      Price
                  </th>
                  <th style="width: 8%" >
                      Amount
                  </th>
                  <th style="width: 4%" >
                      Availability
                  </th>
                  <th style="width: 20%">
                  </th>
                  
              </tr>
              
          </thead>
          <tbody>
            @foreach ($products as $product)
                
           
              <tr>
                  <td>
                    {{$product->id}}
                </td>
                  <td>
                    {{$product->name}}
                  </td>
                  <td>
                    {{$product->brand}}
                  </td>
               
                  {{-- <td>
                    <ul>
                    @foreach ($product->categories as $category)
                     <li>{{$category->name}}</li>   
                    @endforeach
                </ul>
                </td> --}}
                  <td>
                      <span class="badge badge-success">{{$product->price}}$</span>
                  </td>
                  <td >
                    {{$product->amount}}
                  </td>
                  <td >
                    @if ($product->availability)
                    <span class="badge badge-success">Yes</span>
                    @else
                    <span class="badge badge-danger">No</span>
                    @endif
                  </td>
                  <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{route('products.show', $product)}}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{route('products.edit', $product)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>

                    {{-- test --}}
                    <div data-toggle="dropdown" aria-expanded="false" class="btn btn-danger btn-sm dropdown-toggle" >
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
                    {{-- end --}}
                    {{-- <a href="javascript:{}" onclick="document.getElementById('delete_product_{{$product->id}}').submit();">
                    <form id="delete_product_{{$product->id}}" class="btn btn-danger btn-sm" action="{{route('products.destroy', $product)}}" method="POST">
                      @csrf 
                      @method('DELETE')
                      <i class="fas fa-trash">
                        </i>
                        Delete
                        
                      </form>
                  </a> --}}
                </td>
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  @endsection
