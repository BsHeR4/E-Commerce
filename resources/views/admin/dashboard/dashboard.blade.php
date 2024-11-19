@extends('admin.layouts.admin')
@section('title','Dashboard')
@section('admincontent')
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
   <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Orders</span>
                        <span class="info-box-number">{{$ordersCount}}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Current Users</span>
                        <span class="info-box-number">{{$usersCount}}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cogs"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Admins</span>
                        <span class="info-box-number">{{$adminsCount}}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-bag" style="color: white"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Products</span>
                        <span class="info-box-number">{{$productsCount}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
   

    <div class="card">
      <div class="card-header border-transparent">
        <h3 class="card-title">Latest Orders</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table m-0">
            <thead>
            <tr>
              <th>Order ID</th>
              <th>User</th>
              <th>Product</th>
              <th>Status</th>
              <th>Total Price</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($latestOrders as $order)
              <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}</td>
                <td>{{$order->product->name}}</td>
                <td>
                  @if ($order->status->name == 'Pending')
                  <span class="badge badge-warning">{{$order->status->name}}</span>
                  @elseif ($order->status->name == 'Processing')
                  <span class="badge badge-info">{{$order->status->name}}</span>
                  @elseif ($order->status->name == 'Shipped')
                  <span class="badge badge-success">{{$order->status->name}}</span>
                  @else
                  <span class="badge badge-danger">{{$order->status->name}}</span>
                  @endif
                </td>
                <td>
                  <div class="sparkbar" data-color="#00c0ef" data-height="20">{{$order->total_price}}$</div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <a href="{{route('orders.index')}}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
      </div>
      <!-- /.card-footer -->
    </div>

    <div class="row">
      <!-- USERS LIST -->
      <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Latest Members</h3>
                  <div class="card-tools">
                      {{-- <span class="badge badge-danger">8 New Members</span> --}}
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                      </button>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                  <ul class="users-list clearfix mt-3">
                      @foreach ($latestUsers as $user)
                      <li>
                          <img src="{{asset('storage/' . $user->image_path)}}" alt="User Image" class="img-fluid rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                          <a class="users-list-name" href="#">{{$user->name}}</a>
                          <span class="users-list-date">{{$user->created_at->format('d-m-Y')}}</span>
                      </li>
                      @endforeach
                  </ul>
                  <!-- /.users-list -->
              </div>
              <!-- /.card-body -->
              {{-- <div class="card-footer text-center">
                  <a href="javascript:">View All Users</a>
              </div> --}}
              <!-- /.card-footer -->
          </div>
          <!--/.card -->
      </div>
      <!--/.col -->
  
      <!-- PRODUCTS LIST -->
      <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Recently Added Products</h3>
                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                      </button>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                      @foreach ($latestProducts as $product)
                      <li class="item">
                          <div class="product-img">
                              <img src="{{asset('storage/' . $product->image_path)}}" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                              <a href="{{route('products.show',$product)}}" class="product-title">{{$product->name}}
                                  <span class="badge badge-success float-right me-5 mt-2">${{$product->price}}</span></a>
                              <span class="product-description">
                                  {{$product->description}}
                              </span>
                          </div>
                      </li>
                      @endforeach
                      <!-- /.item -->
                  </ul>
              </div>
              <!-- /.card-body -->
              {{-- <div class="card-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Products</a>
              </div> --}}
              <!-- /.card-footer -->
          </div>
          <!--/.card -->
      </div>
      <!--/.col -->
  </div>
  <!--/.row -->
  
  </div><!--/. container-fluid -->
</section>
  @endsection