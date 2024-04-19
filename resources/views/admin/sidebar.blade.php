<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      {{-- <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">BOOKSTORE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">       
        <div class="image">
          <img src="/template/admin/dist/img/hong.jpg" class="img-circle elevation-2 " alt="User Image">
        </div>        
        <div class="info d-flex">
          @if (Auth::check())
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>    
              <a href="{{ route('sign-out') }}" class="d-block " style="margin-left: 10px">Đăng xuất</a>
          @else
        
          @endif
          
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Tìm kiếm" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Danh mục 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách danh mục </p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-swatchbook"></i>
              <p>
                Sản phẩm  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add-products') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('list-products') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sản phẩm </p>
                </a>
              </li>
            </ul>
          </li>


          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-regular fa-images"></i>
              <p>
                Sliders 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add-sliders') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm slider </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('list-sliders') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách slider </p>
                </a>
              </li>
            </ul>
          </li> --}}
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-cart-plus"></i>
              <p style="margin-left: 7px">
                Giỏ Hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/customers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách đơn hàng </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/approve" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Đơn hàng đã duyệt</p>
                </a>
              </li>
            </ul>
          </li>
      
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-users"></i>
              <p style="margin-left: 7px">
                Tài Khoản
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/account" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tài khoản </p>
                </a>
              </li>
            </ul>
          </li>
              
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-chart-simple"></i>
              <p style="margin-left: 7px">
                Thống Kê
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/thongke" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thống kê doanh thu</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>