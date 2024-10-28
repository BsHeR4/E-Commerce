@extends('admin.layouts.admin')
@section('title','Show User')
@section('admincontent')
<div class="col-md-4">
    <!-- Widget: user widget style 2 -->
    <div class="card card-widget widget-user-2">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-info">
        <div class="widget-user-image">
          <img class="img-circle elevation-2" src="{{asset('storage/' . $user->image_path)}}" alt="User Avatar">
        </div>
        <!-- /.widget-user-image -->
        <h3 class="widget-user-username">{{$user->name}}</h3>
      </div>
      <div class="card-footer p-0">
        <ul class="nav flex-column">
          <li class="nav-item nav-link" style="color: black">
            E-mail: {{$user->email}}
          </li>
          <li class="nav-item nav-link" style="color: black">
            Admin: {{$user->is_admin ? 'Yes' : 'No'}}
          </li>
          <li class="nav-item nav-link" style="color: black">
            Created At: {{$user->created_at}}
          </li>
        </ul>
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
        
     
  @endsection