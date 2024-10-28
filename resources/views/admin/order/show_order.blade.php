@extends('admin.layouts.admin')
@section('title','Show Order')
@section('admincontent')
<div class="container">
    <div class="row">
        {{-- User Info --}}
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        User Info
                    </h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">User Name:</dt>
                        <dd class="col-sm-8">{{$order->user->name}}</dd>
                        <dt class="col-sm-4">Email:</dt>
                        <dd class="col-sm-8">{{$order->user->email}}</dd>
                    </dl>
                </div>
            </div>
            {{-- Order Info --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        Order Info
                    </h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Order Status:</dt>
                        <dd class="col-sm-8">  @if ($order->status->name == 'Pending')
                            <span class="badge badge-warning">{{$order->status->name}}</span>
                            @elseif ($order->status->name == 'Processing')
                            <span class="badge badge-info">{{$order->status->name}}</span>
                            @elseif ($order->status->name == 'Shipped')
                            <span class="badge badge-success">{{$order->status->name}}</span>
                            @else
                            <span class="badge badge-danger">{{$order->status->name}}</span>
                            @endif</dd>
                        <dt class="col-sm-4">Total Price:</dt>
                        <dd class="col-sm-8">{{$order->total_price}}$</dd>
                    </dl>
                </div>
            </div>
        </div>
        {{-- Product Info --}}
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        Product Info
                    </h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Product Name:</dt>
                        <dd class="col-sm-8">{{$order->product->name}}</dd>
                        <dt class="col-sm-4">Brand:</dt>
                        <dd class="col-sm-8">{{$order->product->brand}}</dd>
                        <dt class="col-sm-4">Description:</dt>
                        <dd class="col-sm-8">{{$order->product->description}}</dd>
                        <dt class="col-sm-4">Price:</dt>
                        <dd class="col-sm-8">{{$order->product->price}}$</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
        
     
  @endsection