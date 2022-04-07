<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    @yield('header-scripts')
    <!---Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />
    <!---Font Flat-Icon-->
    <link href="{{ asset('LandingPage/font/flaticon.css')}}" rel="stylesheet">
    <!-- Plugin CSS -->
    <link href="{{ asset('LandingPage/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('LandingPage/css/slick.css')}}" rel="stylesheet">
    <link href="{{ asset('LandingPage/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('LandingPage/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{ asset('LandingPage/css/YouTubePopUp.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('LandingPage/css/menu.css')}}">
    <!-- / -->
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('LandingPage/images/header-logo.png')}}" />
    <!-- / -->
    <!-- Theme Style -->
    <link href="{{ asset('LandingPage/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('LandingPage/css/responsive.css') }}" rel="stylesheet">
</head>

<body>
    <!-- back to top start -->
    @include('LandingPage.partials.BackToTop')
    <!-- back to top end -->
    <!-- Preloader Start -->
    @include('LandingPage.partials.PreLoader')
    <!-- Preloader end -->
    <!-- Header Start-->
    @include('LandingPage.partials.Header')
    <!-- Header End -->
    <!-- Content Start -->
    @yield('content')
    <!-- Content Ends -->
    <!-- Footer Start -->
    @include('LandingPage.partials.Footer')
    <!-- Footer End -->
    <!-- jQuery -->
    <script src="{{ asset('LandingPage/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('LandingPage/js/jquery-migrate-3.0.0.min.js')}}"></script>
    <!-- Plugins -->
    <script src="{{ asset('LandingPage/js/popper.min.js')}}"></script>
    <script src="{{ asset('LandingPage/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('LandingPage/js/slick.min.js')}}"></script>
    <script src="{{ asset('LandingPage/js/counter.js')}}"></script>
    <script src="{{ asset('LandingPage/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('LandingPage/js/menu-opener.js')}}"></script>
    <script src="{{ asset('LandingPage/js/waypoints.js')}}"></script>
    <script src="{{ asset('LandingPage/js/YouTubePopUp.jquery.js')}}"></script>
    <script src="{{ asset('LandingPage/js/jquery.event.move.js')}}"></script>
    <script src="{{ asset('LandingPage/js/SmoothScroll.js')}}"></script>
    <!-- custom 10:13 PM -->
    <script src="{{ asset('LandingPage/js/custom.js')}}"></script>
    <script src="{{ asset('LandingPage/js/menu.js')}}"></script>
</body>

</html>
