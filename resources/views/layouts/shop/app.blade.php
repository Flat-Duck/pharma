<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" viewport-fit="cover">
    <meta name="description" content="BookStore HTML5 Template" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pharma store</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/media/favicon.png" />

    @yield('meta_tags')

    

    @yield('styles')
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/media/favicon.png"/>

    <!-- All CSS files -->
    <link rel="stylesheet" href="{{asset("assets/css/vendor/bootstrap.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("assets/css/vendor/font-awesome.css")}}"/>
    <link rel="stylesheet" href="{{asset("assets/css/vendor/slick.css")}}"/>
    <link rel="stylesheet" href="{{asset("assets/css/vendor/slick-theme.css")}}"/>
    <link rel="stylesheet" href="{{asset("assets/css/vendor/aksVideoPlayer.html")}}"/>
    <link rel="stylesheet" href="{{asset("assets/css/vendor/ionrangeslider.css")}}"/>
    <link rel="stylesheet" href="{{asset("assets/css/app.css")}}"/>
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
    <div id="main-wrapper" class="main-wrapper overflow-hidden">
        @include('layouts.shop.nav')
        
        @yield('content')
        @if ($adsAva)
        <x-random-ad />
      @endif
    </div>
    @livewireScripts
<!-- Jquery Js -->
    <script src="{{asset("assets/js/vendor/jquery-3.6.3.min.js")}}"></script>
    <script src="{{asset("assets/js/vendor/bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/js/vendor/slick.min.js")}}"></script>
    <script src="{{asset("assets/js/vendor/jquery-appear.js")}}"></script>
    <script src="{{asset("assets/js/vendor/jquery-validator.js")}}"></script>
    <script src="{{asset("assets/js/vendor/ionrangeslider.js")}}"></script>
    
    

    <!-- Site Scripts -->
    <script src="{{asset("assets/js/app.js")}}"></script>
</body>


<!-- Mirrored from uiparadox.co.uk/templates/book_store/shop-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 May 2024 17:48:58 GMT -->
</html>