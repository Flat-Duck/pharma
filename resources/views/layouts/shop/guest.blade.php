<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" viewport-fit="cover">
    <meta name="description" content="Pharma Store" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pharma store</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/media/favicon.png" />

    @yield('meta_tags')

    @vite('resources/js/app.js')

    @yield('styles')

    <!-- All CSS files -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/ionrangeslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
    @livewireStyles
</head>

<body  dir="rtl">
    <!-- Preloader-->
    <div id="preloader">
        <div class="loader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Back To Top Start -->
    <a href="#main-wrapper" id="backto-top" class="back-to-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Main Wrapper Start -->
    <div id="main-wrapper" class="main-wrapper overflow-hidden">

        <!-- Header Start-->
        <header class="header st-2">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img alt="" src="assets/media/brand-logo.png" />
                </a>
            </div>
        </header>
        <!-- Header End-->

        <!-- signup area Start -->
        @yield('content')
    </div>

    @stack('modals')
    @livewireScripts
    <!-- Jquery Js -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-appear.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-validator.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/ionrangeslider.js') }}"></script>

    <!-- Site Scripts -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    @if (session()->has('success'))
        <script>
            var notyf = new Notyf({
                dismissible: true
            })
            notyf.success('{{ session('success') }}')
        </script>
    @endif
    <script>
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</body>
</html>
