@extends('admin.layouts.admin')
@section('title','List Categories')
@section('admincontent')
    <!-- Default box -->

    <div class="col-md-8 offset-md-2 mb-3">
      <form action="{{route('categories.index')}}" method="GET">
          <div class="input-group">
              <input name="category_name" type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
              <div class="input-group-append">
                  <button type="submit" class="btn btn-lg btn-default">
                      <i class="fa fa-search"></i>
                  </button>
              </div>
          </div>
      </form>
  </div>

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
            
              <tr>
                  <th style="width: 1%">
                      Id
                  </th>
                  <th style="width: 20%">
                      Category Name
                  </th>
                  <th style="width: 30%">
                      Created At
                  </th>
                 
                  <th style="width: 20%">
                  </th>
              </tr>
             
          </thead>

          <tbody>
            @foreach ($categories as $category)
              <tr>
                  <td>
                      {{$category->id}}
                  </td>
                  <td>
                    {{$category->name}}                     
                  </td>
                  <td>
                     {{$category->created_at}}
                  </td>
                 
                  <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="{{route('categories.show', $category)}}">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a>
                      <a class="btn btn-info btn-sm" href="{{route('categories.edit', $category)}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      <a href="javascript:{}" onclick="document.getElementById('delete_category_{{$category->id}}').submit();">
                      <form id="delete_category_{{$category->id}}" class="btn btn-danger btn-sm" action="{{route('categories.destroy', $category)}}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <i class="fas fa-trash">
                          </i>
                          Delete
                          
                        </form>
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
