<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} - @yield('title')</title>

	{{-- App favicon --}}
	<link rel="icon" href="{{ asset('assets/images/Logo.png') }}">

	<!-- Css -->
	<link rel="stylesheet" href="{{ asset('assets/custom-css/dashboard.css') }}">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <!-- Box icons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

	<!-- Bootstrap Css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="dashboard-body">

        {{-- begin page --}}
        <x-error-display></x-error-display>


        {{-- begin page --}}
        @include('layouts.navigation')

        <!-- Page Content -->
        @yield('content')

        {{-- end page --}}



    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/user/dashboard.js')}}"></script>
    <script src="{{ asset('assets/js/user/upload.js')}}"></script>

    @stack('script-lib')
    @stack('script')

</body>

</html>


