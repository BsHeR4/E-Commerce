@extends('admin.layouts.admin')
@section('title','List Users')
@section('admincontent')
    <!-- Default box -->

    <div class="col-md-8 offset-md-2 mb-3">
        <form action="{{route('users.index')}}" method="GET">
            <div class="input-group">
                <input name="user_name" type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
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
      <h3 class="card-title">Users</h3>

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
                      User Name
                  </th>
                  <th style="width: 8%">
                      E-mail
                  </th>
                  {{-- <th style="width: 7%" >
                      categories
                  </th> --}}
                  <th style="width: 7%" >
                      Admin
                  </th>
                  <th style="width: 8%" >
                      Created At
                  </th>
        
                  <th style="width: 20%">
                  </th>
              </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
                
           
              <tr>
                  <td>
                    {{$user->id}}
                </td>
                  <td>
                    {{$user->name}}
                  </td>
                  <td>
                    {{$user->email}}
                  </td>
               
                  {{-- <td>
                    <ul>
                    @foreach ($product->categories as $category)
                     <li>{{$category->name}}</li>   
                    @endforeach
                </ul>
                </td> --}}
                  <td>
                    @if ($user->is_admin == 0)
                    <span class="badge badge-danger">No</span>
                    @elseif ($user->is_admin == 1)
                    <span class="badge badge-success">Yes</span>
                    @endif
                  </td>
                  <td >
                    {{$user->created_at}}
                  </td> 
                  <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{route('users.show', $user)}}">
                        <i class="fas fa-folder">
                        </i>
                        View
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
