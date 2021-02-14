<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("assets/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset("assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset("assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset("assets/plugins/jqvmap/jqvmap.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("assets/css/adminlte.min.css")}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset("assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset("assets/plugins/daterangepicker/daterangepicker.css")}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset("assets/plugins/summernote/summernote-bs4.css")}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Portal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset("assets/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url("/") }}" class="nav-link">
                    <p>Home</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url("/informasi-latest") }}" class="nav-link">
                    <p>Informasi terbaru</p>
                </a>
            </li>

            {{-- @if (Auth::user()->role != 1) --}}
              <li class="nav-item">
                <a href="{{ url("/data-petani") }}" class="nav-link">
                    <p>Data Petani</p>
                </a>
              </li>
            {{-- @endif --}}

            <li class="nav-item">
                <a href="{{ url("/pemesanan-kebutuhan") }}" class="nav-link">
                    <p>Kebutuhan Petani</p>
                </a>
            </li>
            <li class="nav-item">
              <a href="{{ url("/pesanan-saya") }}" class="nav-link">
                  <p>Pesanan Saya</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ url("/semua-pesanan") }}" class="nav-link">
                  <p>Semua Pesanan Saya</p>
              </a>
            </li> 

            {{-- @if (Auth::user()->role == 3 || Auth::user()->role == 5) --}}
              <li class="nav-item">
                <a href="{{ url("/product") }}" class="nav-link">
                    <p>Produk</p>
                </a>
              </li>                 
            {{-- @endif --}}

            {{-- @if (Auth::user()->role == 3 || Auth::user()->role == 5) --}}
              <li class="nav-item">
                <a href="{{ url("/greate") }}" class="nav-link">
                    <p>great</p>
                </a>
              </li>                 
            {{-- @endif --}}

            
            <li class="nav-item">
              <a href="{{ url("/daftar-penjualan") }}" class="nav-link">
                  <p>Daftar Penjualan </p>
              </a>
            </li> 

            <li class="nav-item">
              <a href="{{ url("/semua-penjualan") }}" class="nav-link">
                  <p>Hasil Penjualan</p>
              </a>
            </li> 

            <li class="nav-item">
              <a href="{{ url("/riwayat-penjualan") }}" class="nav-link">
                  <p>Riwayat Penjualan</p>
              </a>
            </li> 

            {{-- @if (Auth::user()->role == 2) --}}
              <li class="nav-item">
                <a href="{{ url("/informasi") }}" class="nav-link">
                    <p>Informasi</p>
                </a>
              </li>                 
            {{-- @endif --}}

            {{-- @if (Auth::user()->role == 5) --}}
              <li class="nav-item">
                <a href="{{ url("/user") }}" class="nav-link">
                    <p>Admin</p>
                </a>
              </li> 
            {{-- @endif --}}

            {{-- @if (Auth::user()->role == 1) --}}

              <li class="nav-item">
                <a href="{{ url("/pengaturan") }}" class="nav-link">
                    <p>Pengaturan</p>
                </a>
              </li>                 
            {{-- @endif --}}


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset("assets/plugins/jquery/jquery.min.js")}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset("assets/plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- ChartJS -->
<script src="{{ asset("assets/plugins/chart.js/Chart.min.js")}}"></script>
<!-- Sparkline -->
<script src="{{ asset("assets/plugins/sparklines/sparkline.js")}}"></script>
<!-- JQVMap -->
<script src="{{ asset("assets/plugins/jqvmap/jquery.vmap.min.js")}}"></script>
<script src="{{ asset("assets/plugins/jqvmap/maps/jquery.vmap.usa.js")}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset("assets/plugins/jquery-knob/jquery.knob.min.js")}}"></script>
<!-- daterangepicker -->
<script src="{{ asset("assets/plugins/moment/moment.min.js")}}"></script>
<script src="{{ asset("assets/plugins/daterangepicker/daterangepicker.js")}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset("assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>
<!-- Summernote -->
<script src="{{ asset("assets/plugins/summernote/summernote-bs4.min.js")}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset("assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("assets/js/adminlte.js")}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset("assets/js/pages/dashboard.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("assets/js/demo.js")}}"></script>

@yield('script')
</body>
</html>
