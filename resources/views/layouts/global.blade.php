<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>

  
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  @include('sweet::alert')
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">


  <!-- Google Font -->
  <link rel="stylesheet"
        href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')}}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Ps</b>Ytm</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Posko</b>Yatim</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      @php
       $foto = Auth::user()->foto;
      @endphp
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('storage/' . $foto)}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('storage/' . $foto)}}" class="img-circle" alt="User Image">
                <p>
                <!--user-->{{ Auth::user()->name }}<br>
              <!-- <button class="btn btn-default"> -->
                  <a class="btn btn-default" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                  <!-- </button> -->
                </p>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('storage/' . $foto)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> {{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="Header {{Request::path() == 'admin' ? 'active' : ''}}">
          <a href="/admin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
       
         <li class="treeview {{Request::path() == 'admin/manage-donasi-donatur' ? 'active' : '' || Request::path() == 'admin/manage-donasi-user' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-dollar"></i> <span>Terima Donasi</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{Request::path() == 'admin/manage-donasi-user' ? 'active' : ''}}"><a href="{{route('manage-donasi-user.index')}}"><i class="fa fa-circle-o"></i>Donasi user</a></li>
            <li class="{{Request::path() == 'admin/manage-donasi-donatur' ? 'active' : ''}}"><a href="{{route('manage-donasi-donatur.index')}}"><i class="fa fa-circle-o"></i>Donasi donatur</a></li>
          </ul>
        </li>
        
        <li class="treeview {{Request::path() == 'admin/manage-infak' ? 'active' : '' || Request::path() == 'admin/manage-program-kerja' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-google-wallet"></i> <span>Manage Infak & Proker</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{Request::path() == 'admin/manage-infak' ? 'active' : '' }}"><a href="{{route('manage-infak.index')}}"><i class="fa fa-circle-o"></i>manage kegiatan infak</a></li>
            <li class="{{Request::path() == 'admin/manage-program-kerja' ? 'active' : ''}}"><a href="{{route('manage-program-kerja.index')}}"><i class="fa fa-circle-o"></i>manage program kerja</a></li>
          </ul>
        </li>
       <!--  <li class="treeview ">
          <li class="{{Request::path() == 'admin/manage-infak' ? 'active' : ''}}"><a href="{{route('manage-infak.index')}}">
            <i class="fa fa-google-wallet"></i> <span>Manage Kegiatan Infak</span>
          </a></li>
        </li> -->

        <li class="treeview">
          <li class="{{Request::path() == 'admin/manage-beasiswa' ? 'active' : ''}}"><a href="{{route('manage-beasiswa.index')}}">
            <i class="fa fa-graduation-cap"></i> <span>Manage Beasiswa</span>
          </a></li>
        </li>
        <li class="treeview">
          <li class="{{Request::path() == 'admin/ukm' ? 'active' : ''}}"><a href="{{route('ukm.index')}}">
            <i class="fa fa-user-md"></i> <span>Manage UKM</span>
          </a></li>
        </li>
        <li class="treeview">
          <li class="{{Request::path() == 'admin/manage-mitra' ? 'active' : ''}}"><a href="{{route('manage-mitra.index')}}">
            <i class="fa fa-table"></i> <span>Manage Mitra</span>
          </a></li>
        </li>
         <li class="treeview {{Request::path() == 'admin/manageuser'  ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-user"></i> <span>Manage Users</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{Request::path() == 'admin/manageuser' ? 'active' : ''}}"><a href="{{route('manageuser.index')}}"><i class="fa fa-circle-o"></i>All Users</a></li>
          </ul>
        </li>
        <li class="treeview {{Request::path() == 'admin/manageadmin' ? 'active' : '' || Request::path() == 'admin/manageadmin/create' ? 'active' : '' }} ">
          <a href="#">
            <i class="fa fa-users"></i> <span>Manage Admin</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{Request::path() == 'admin/manageadmin' ? 'active' : ''}}"><a href="{{route('manageadmin.index')}}"><i class="fa fa-circle-o"></i>All admin</a></li>
            <li class="{{Request::path() == 'admin/manageadmin/create' ? 'active' : ''}}"><a href="{{route('manageadmin.create')}}"><i class="fa fa-circle-o"></i>Add admin</a></li>
          </ul>
        </li>
        <li class="treeview ">
          <li class="{{Request::path() == 'admin/laporan' ? 'active' : ''}}"><a href="{{route('laporan.index')}}">
            <i class="fa fa-google-wallet"></i> <span>Laporan</span>
          </a></li>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  

    <!-- Main content -->
    <section class="content">
    @yield('content')
  </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; </strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebars background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>

<script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
<script src="{{url('bower_components/ckeditor/ckeditor.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }

        function isDecimalKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 46 || charCode > 57))
                return false;

            return true;
        }

        function isUpperKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 65 || charCode > 90))
                return false;

            return true;
        }

  $(function() {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'scrollX'     : true
    })
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>
</body>
</html>
