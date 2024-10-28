@extends('admin.layouts.admin')
@section('title','List Orders')
@section('admincontent')
    <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Categories</h3>

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
            
            <th>Order ID</th>
            <th>User</th>
            <th>Product</th>
            <th>Status</th>
            <th>Total Price</th>
            <th></th>
             
          </thead>

          <tbody>
            @foreach ($orders as $order)
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
                 
                  <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="{{route('orders.show', $order)}}">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a>
                      <a class="btn btn-info btn-sm" href="{{route('orders.edit', $order)}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Change Status
                      </a>
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


