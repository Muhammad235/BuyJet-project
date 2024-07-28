<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} - @yield('title')</title>

    {{-- App favicon --}}
    <link rel="icon" href="{{ asset('assets/images/Logo.png') }}">

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('assets/custom-css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/custom-css/otp.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/custom-css/register.css') }}"> --}}

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <!-- Bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>
    .side-image{
    background-image: url("{{ asset('assets/images/sideimg.png') }}");
    background-position: center;
    }
</style>
<body>

    {{-- Error component --}}
    <x-error-display></x-error-display>


    <section class="login-section">
        <div class="container-fluid">
            <div class="row">
                {{ $slot }}
            </div>
        </div>
    </section>


    <script src="{{ asset('assets/js/user/otp.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
