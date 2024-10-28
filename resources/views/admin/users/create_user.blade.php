@extends('admin.layouts.admin')
@section('title','Add User')
@section('admincontent')

<form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="card-body">
        <h4>Add User</h4>
     
        <div class="form-group">
          <label>User Name</label>
          <input required name="name" type="text" class="form-control form-control-border border-width-2">
        </div>
    
        <div class="form-group">
          <label>E-mail</label>
          <input required name="email" type="email" class="form-control form-control-border border-width-2">
        </div>
    
        <div class="form-group">
            <label>Password</label>
            <input required name="password" type="password" class="form-control form-control-border border-width-2">
          </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input required name="password_confirmation" type="password" class="form-control form-control-border border-width-2">
          </div>
          

        <div class="form-group">
          <label >Image</label>
          <div class="custom-file">
            <input required name="image_path" type="file" class="custom-file-input">
            <label class="custom-file-label">Choose file</label>
          </div>
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
              <input name="is_admin" value="true" type="checkbox"  class="custom-control-input" id="customSwitch3">
              <label class="custom-control-label" for="customSwitch3">Admin</label>
            </div>
          </div>

        </div>

        <input type="submit" class="btn btn-outline-primary btn-lg ms-4 mb-5" value="Add">
</form>

  @endsection