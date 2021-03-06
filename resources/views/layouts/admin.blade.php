<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @yield('title')

    <!-- Font Awesome Icons -->
    <!-- <link rel="stylesheet" href="{{asset('admin_lte/plugins/fontawesome-free/css/all.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('frontend/dist/css/font-awesome.min.css')}}" />

    <!-- Theme style -->
    <link rel="stylesheet" href=" {{asset('admin_lte/dist/css/adminlte.min.css')}} ">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        @include('part.header')

        @include('part.sidebar')
        @yield('content')



        <!-- Main Footer -->
        @include('part.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src=" {{asset('admin_lte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src=" {{asset('admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin_lte/dist/js/adminlte.min.js')}}"></script>
    @yield('js')
</body>

</html>
