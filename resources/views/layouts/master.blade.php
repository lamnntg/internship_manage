<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Internship Manage</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset("plugins/jqvmap/jqvmap.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("admin/css/adminlte.min.css")}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset("plugins/daterangepicker/daterangepicker.css")}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.css")}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- End Navbar-->

    <!-- Main Sidebar Container -->
    @include('layouts.sidebar')
    <!-- End Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.footer')
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
<!-- jQuery UI 1.11.4 -->
{{--<script src="{{asset("plugins/jquery-ui/jquery-ui.min.js")}}"></script>--}}
{{--<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->--}}
{{--<script>--}}
{{--    $.widget.bridge('uibutton', $.ui.button)--}}
{{--</script>--}}
<!-- Bootstrap 4 -->
<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- Sparkline -->
<script src="{{asset("plugins/sparklines/sparkline.js")}}"></script>
<!-- daterangepicker -->
<script src="{{asset("plugins/moment/moment.min.js")}}"></script>
<script src="{{asset("plugins/daterangepicker/daterangepicker.js")}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("admin/js/adminlte.js")}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{asset("admin/js/pages/dashboard.js")}}"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{asset("admin/js/demo.js")}}"></script>
@stack('scripts')
</body>
</html>
