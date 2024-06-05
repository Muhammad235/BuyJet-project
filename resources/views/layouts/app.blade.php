<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>{{ env('APP_NAME') }} - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Flashpay User Panel" name="description" />
        <meta content="Flashpay" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('home/assets/images/logo/favicon.png') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}"  rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}"  rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"  rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"  rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"  rel="stylesheet" type="text/css" />
   

        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/libs/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>

        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        <script src="{{ asset('assets/js/pages/sweet-alerts.init.js')}}"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    </head>
    
    <body class="dashboard-body">

        {{-- begin page --}}
        @include('layouts.navigation')

        <!-- Page Content -->
        @yield('content')

        {{-- end page --}}

        
        {{-- @include('layouts.appearance') --}}


    <!-- JAVASCRIPT -->

    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    {{-- <script defer src="{{ asset('assets/js/app.js')}}"></script> --}}
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/js/form.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    
    <script src="{{ asset('assets/js/pages/dashboard.init.js')}}"></script>
    <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>

    </body>
</html>

