<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('navbar.nav')
  <!-- Main Sidebar Container -->
  
  @include('includes.sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    Design & Developed by NM. Nashath Nasik ICTA
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('includes/toast')

@include('includes/script')
</body>
</html>