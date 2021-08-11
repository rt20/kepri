  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('img/logo_kepri.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">APBDes</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(Auth::user()->roles == 'ADMIN')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('desa.index') }}" class="nav-link">
                  <i class="fa fa-archive nav-icon"></i>
                  <p>Desa</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item has-treeview">
            <a href="{{ route('plan.index') }}" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Perencanaan
              </p>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="{{ route('schedules.create') }}" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                Tambah
              </p>
            </a>
           
          </li>
         
          <li class="nav-item has-treeview">
            <a href="{{ route('schedules.ubah') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Edit
              </p>
            </a>
          </li> -->
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 