@extends('admin.layouts.admin')
@section('title','Trashed Products')
@section('admincontent')
    <!-- Default box -->
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
                  <th style="width: 10%">
                      Description
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
                  <td>
                    {{$product->description}}
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
                        Yes
                    @else
                        No
                    @endif
                  </td>
                  <td class="project-actions text-right">

                    <a  href="javascript:{}" onclick="document.getElementById('restore_product_{{$product->id}}').submit();">
                        <form class="btn btn-primary btn-sm" id="restore_product_{{$product->id}}" action="{{route('products.restore', $product->id)}}" method="POST">
                            @csrf
                            <i class="fas  fa-reply-all mx-2">
                            </i>
                            Restore
                          </form>
                    </a>

                    <a href="javascript:{}" onclick="document.getElementById('force_delete_product_{{$product->id}}').submit();">
                        <form id="force_delete_product_{{$product->id}}" class="btn btn-danger btn-sm" action="{{route('products.forceDelete',['id'=> $product->id , 'routeName' => Route::currentRouteName()])}}" method="POST">
                          @csrf 
                          @method('DELETE')
                          <i class="fas fa-trash">
                            </i>
                            Delete permently
                          </form>
                      </a>

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
