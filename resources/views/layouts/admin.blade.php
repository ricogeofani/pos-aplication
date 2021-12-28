
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplication Pos</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

  @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('sweetalert::alert')

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('cartPenjualan') }}" role="button">
          <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
        </a>
      </li>
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{ belum_lunas() }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><h4>{{ belum_lunas() }} Pelanggan</h4></span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            @foreach (pelanggan_kredit() as $data)
                <p class="font-weight-bold"><i class="fa fa-chevron-right"></i> {{ $data['pelanggan']['nama_pelanggan'] }} belum lunas</p>
                <br>
            @endforeach
            <span class="float-right text-muted text-sm">{{ now() }}</span>
          </a>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <a href="{{ url('penjualan') }}" class="dropdown-item dropdown-footer">See All Detail Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar elevation-4">
    <div class="header bg-warning mt-2">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold text-uppercase">Aplication Pos</span>
        </a>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-dark">Alexander Pierce</a>
            </div>
        </div>
        <div class="navigasi bg-secondary" style="padding-top: 10px">
            <p class="text-center fs-20 text-uppercase pb-2">navigasi</p>
        </div>
    </div>

      <!-- Sidebar -->
      <div class="sidebar">
      <!-- Sidebar Menu -->
           <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <a href="{{ url('dashboard') }}" class="nav-link text-dark {{ request()->is('dashboard') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link text-dark">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    Manajemen Barang
                  </p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ url('barang') }}" class="nav-link text-dark {{ request()->is('barang') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-barcode"></i>
                        <p>Barang</p>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('kategory') }}" class="nav-link text-dark {{ request()->is('kategory') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-book"></i>
                        <p>Kategory</p>
                      </a>
                    </li>
                </ul>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ url('pelanggan') }}" class="nav-link text-dark {{ request()->is('pelanggan') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Pelanggan
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ url('karyawan') }}" class="nav-link text-dark {{ request()->is('karyawan') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Karyawan
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ url('suplier') }}" class="nav-link text-dark {{ request()->is('suplier') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>
                    Suplier
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link text-dark">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    Manajemen Penjualan
                  </p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ url('penjualan') }}" class="nav-link text-dark {{ request()->is('penjualan') ? 'active' : '' }}">
                        <i class="fa fa-credit-card"></i>
                        <p>penjualan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('kasir') }}" class="nav-link text-dark {{ request()->is('kasir') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Kasir</p>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('pembelian') }}" class="nav-link text-dark {{ request()->is('pembelian') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>pembelian</p>
                      </a>
                    </li>
                </ul>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ url('laporan') }}" class="nav-link text-dark {{ request()->is('laporan') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-print"></i>
                  <p>
                    laporan
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ url('userSetting') }}" class="nav-link text-dark {{ request()->is('setting') ? 'active' : '' }}">
                  <i class="fa fa-cogs" aria-hidden="true"></i>
                  <p>
                    User Setting
                  </p>
                </a>
              </li>
            </ul>
          </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1 class="m-0 font-weight-light text-uppercase">@yield('header')</h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
                @if ($m_gagal = Session::get('m_gagal'))
                  <div class="alert alert-danger text-center" style="height: 45px;opacity: 0.8">
                    <button type="button" class="close" data-dismiss="alert"><strong>x</strong></button> 
                    <p class="text-bold">{{ $m_gagal }}</p>
                  </div>
                @endif
                @if ($m_berhasil = Session::get('m_berhasil'))
                  <div class="alert alert-success text-center" style="height: 45px;opacity: 0.8">
                    <button type="button" class="close" data-dismiss="alert"><strong>x</strong></button> 
                    <p class="text-bold">{{ $m_berhasil }}</p>
                  </div>
                @endif
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    <p class="text-danger btn btn-outline-secondary">Logout</p>
                </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container">
            @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

{{-- vue js --}}
<script src="{{ asset('js/vue.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@stack('js')
</body>
</html>
