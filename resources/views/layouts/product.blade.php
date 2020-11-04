<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @yield('title')

    <link rel="stylesheet" href="{{asset('frontend/dist/css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/dist/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    @yield('css')
</head>

<body>
    @include('components.header')

    @yield('content')



    @include('components.footer')



    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset('frontend/dist/js/jquery-3.5.1.min.js')}}"> </script>
    <script src="{{asset('frontend/dist/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/dist/js/bootstrap.min.js')}}"></script>
    @yield('js')
</body>

</html>
