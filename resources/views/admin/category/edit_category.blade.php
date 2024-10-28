@extends('admin.layouts.admin')
@section('title','Edit Category')
@section('admincontent')

<form action="{{route('categories.update', $category)}}" method="POST">
@csrf
@method('PUT')
    <div class="card-body">
        <h4>Edit Category</h4>
     
        <div class="form-group">
          <label>Category Name</label>
          <input required name="name" type="text" value="{{$category->name}}" class="form-control form-control-border border-width-2">
        </div>
      </div>
      <input type="submit" class="btn btn-outline-primary btn-lg ms-4" value="Edit">
</form>
@endsection