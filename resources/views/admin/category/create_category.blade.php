@extends('admin.layouts.admin')
@section('title','Add Category')
@section('admincontent')

<form action="{{route('categories.store')}}" method="POST">
@csrf
    <div class="card-body">
        <h4>Add Category</h4>
     
        <div class="form-group">
          <label>Category Name</label>
          <input required name="name" type="text" class="form-control form-control-border border-width-2">
        </div>
      </div>
      <input type="submit" class="btn btn-outline-primary btn-lg ms-4" value="Add">
</form>
@endsection