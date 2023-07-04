<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
<a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('assets/img/sepang.png')}}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light"><strong>KELURAHAN SEPANG</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/img/avatar-default.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->username }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('home')}}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('criteriaweights')}}" class="nav-link">
                <i class="nav-icon fas fa-cube"></i>
                <p>Kriteria</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('criteriaratings')}}" class="nav-link">
                <i class="nav-icon fas fa-cubes"></i>
                <p>Rating Kriteria</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('alternatives')}}" class="nav-link">
                <i class="nav-icon fas fa-database"></i>
                <p>Warga (Alternatif)</p>
            </a>
          </li>
          <li class="nav-header">Hasil</li>
          <li class="nav-item">
            <a href="{{url('decision')}}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Matrix</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('normalization')}}" class="nav-link">
                <i class="nav-icon far fa-chart-bar"></i>
                <p>Normalisasi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('rank')}}" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>Peringkat</p>
            </a>
          </li>
          <li class="nav-header">Setting</li>
          <li class="nav-item">
            <a href="{{url('user')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('logout')}}" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>Logout</p>
            </a>
          </li>


          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
