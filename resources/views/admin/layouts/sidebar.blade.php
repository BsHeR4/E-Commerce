<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
      <span class="brand-text font-weight-light">E-Commerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

    <ul class="nav  ml-auto p-2">

    <li class="nav-item dropdown">
     
        <div data-toggle="dropdown" aria-expanded="false" class="nav-link dropdown-toggle user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
              <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
          </div>
          
        <div class="dropdown-menu" style="">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            <span class="dropdown-item">
                <i class="fas fa-arrow-left mx-2"></i> {{ __('Logout') }}
              </span>   
               
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form> 
        </div>
    </li>
</ul>
    
     

      <!-- Sidebar Menu -->
      <nav class="">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class

             with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('home')}}" class="nav-link active">
                  <i class="fas fa-server nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
             
         
         
      
            </ul>
         
          {{-- View Tables --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="fas fa-tag nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link">
                  <i class="fas fa-shopping-bag nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('orders.index')}}" class="nav-link">
                  <i class="fas fa-shopping-cart nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- End View Table --}}

        
         
          <li class="nav-header">Insert Data</li>
          <li class="nav-item">
            <a href="{{route('categories.create')}}" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>Add Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('products.create')}}" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>Add Product</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('users.create')}}" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>Add Admin/User</p>
            </a>
          </li>

          <li class="nav-header">Recycle Bin</li>
          <li class="nav-item">
            <a href="{{route('products.trashed')}}" class="nav-link">
              <i class="nav-icon fas fa-trash "></i>
              <p>Product Trashed</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>