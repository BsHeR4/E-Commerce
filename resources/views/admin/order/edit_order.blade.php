@extends('admin.layouts.admin')
@section('title','Edit Order')
@section('admincontent')

<form action="{{route('orders.update', $order)}}" method="POST">
@csrf
@method('PUT')

<div class="card-body">
    <h4>Change Status</h4>

<div class="form-group">
    <label>Status</label>
    <select required name="status" class="form-control">
        @foreach ($statuses as $status)
            <option  value="{{$status->id}}" {{$order->status_id == $status->id ? 'selected' : ''}}>{{$status->name}}</option>
        @endforeach
    </select>
  </div>
</div>
<input type="submit" class="btn btn-outline-primary btn-lg ms-4" value="Change">
</form>
@endsection