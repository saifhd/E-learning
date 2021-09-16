<!doctype html>
<html lang="en">
<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>Edubin - LMS Education HTML Template</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">

    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.nice-number.min.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('frontend/css/default.css') }}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">


</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>

    @include('layouts.header')


    @yield('content')


    @include('layouts.footer')


    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>



    <!--====== jquery js ======-->
    <script src="{{ asset('frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{ asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('frontend/js/slick.min.js')}}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>

    <!--====== Counter Up js ======-->
    <script src="{{ asset('frontend/js/waypoints.min.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.counterup.min.js')}}"></script>

    <!--====== Nice Select js ======-->
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js')}}"></script>

    <!--====== Nice Number js ======-->
    <script src="{{ asset('frontend/js/jquery.nice-number.min.js')}}"></script>

    <!--====== Count Down js ======-->
    <script src="{{ asset('frontend/js/jquery.countdown.min.js')}}"></script>

    <!--====== Validator js ======-->
    <script src="{{ asset('frontend/js/validator.min.js')}}"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{ asset('frontend/js/ajax-contact.js')}}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('frontend/js/main.js')}}"></script>

    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="{{ asset('frontend/js/map-script.js')}}"></script>
    @yield('scripts')

</body>
</html>
