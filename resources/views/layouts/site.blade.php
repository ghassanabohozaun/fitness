<!DOCTYPE html>
<html @if (Lang() == 'ar') lang="ar" dir="rtl" @else lang="en" dir="ltr" @endif>

<head>

    <!-- title -->
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('metaTags')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{!! asset('adminBoard/uploadedImages/logos/' . setting()->site_icon) !!}">
    <!-- google font -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> --}}
    <!-- fontawesome -->
    <link rel="stylesheet" href="{!! asset('site/assets/css/all.min.css') !!}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{!! asset('site/assets/bootstrap/css/bootstrap.min.css') !!}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{!! asset('site/assets/css/owl.carousel.css') !!}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{!! asset('site/assets/css/magnific-popup.css') !!}">
    <!-- animate css -->
    <link rel="stylesheet" href="{!! asset('site/assets/css/animate.css') !!}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{!! asset('site/assets/css/meanmenu.min.css') !!}">
    <!-- main style -->
    <link rel="stylesheet" href="{!! asset('site/assets/css/main.css') !!}">
    <!-- responsive -->
    <link rel="stylesheet" href="{!! asset('site/assets/css/responsive.css') !!}">

    @stack('style')

</head>

<body>

    <!--start preLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--end preLoader-->

    <!--content-->
    @yield('content')
    <!--content -->


    <!-- jquery -->
    <script src="{!! asset('site/assets/js/jquery-1.11.3.min.js') !!}"></script>
    <!-- bootstrap -->
    <script src="{!! asset('site/assets/bootstrap/js/bootstrap.min.js') !!}"></script>
    <!-- count down -->
    <script src="{!! asset('site/assets/js/jquery.countdown.js') !!}"></script>
    <!-- isotope -->
    <script src="{!! asset('site/assets/js/jquery.isotope-3.0.6.min.js') !!}"></script>
    <!-- waypoints -->
    <script src="{!! asset('site/assets/js/waypoints.js') !!}"></script>
    <!-- owl carousel -->
    <script src="{!! asset('site/assets/js/owl.carousel.min.js') !!}"></script>
    <!-- magnific popup -->
    <script src="{!! asset('site/assets/js/jquery.magnific-popup.min.js') !!}"></script>
    <!-- mean menu -->
    <script src="{!! asset('site/assets/js/jquery.meanmenu.min.js') !!}"></script>
    <!-- sticker js -->
    <script src="{!! asset('site/assets/js/sticker.js') !!}"></script>
    <!-- main js -->
    <script src="{!! asset('site/assets/js/main.js') !!}"></script>

    @stack('script')
</body>

</html>
