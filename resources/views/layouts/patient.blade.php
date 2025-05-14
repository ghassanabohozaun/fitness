<!DOCTYPE html>
<html @if (Lang() == 'ar') lang="ar" dir="rtl" @else lang="en" dir="ltr" @endif>

<head>
    <title>
        {{ !empty($title) ? $title : __('patient.dashboard') }}
    </title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('metaTags')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{!! asset('adminBoard/uploadedImages/logos/' . setting()->site_icon) !!}">
    <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('adminBoard/uploadedImages/logos/' . setting()->site_icon) !!}">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{!! asset('patient/assets/css/nucleo-icons.css') !!}" rel="stylesheet" />
    <link href="{!! asset('patient/assets/css/nucleo-svg.css') !!}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{!! asset('patient/assets/css/nucleo-svg.css') !!}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{!! asset('patient/assets/css/soft-ui-dashboard.css?v=1.0.3') !!}" rel="stylesheet" />

</head>

<body class="g-sidenav-show {!! Lang() == 'ar' ? 'rtl' : '' !!}  bg-gray-100">

    @include('patient.includes.menu')

    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">


        @include('patient.includes.navbar')

        <div class="container-fluid py-4">

            @yield('content')

            @include('patient.includes.footer')
        </div>
    </main>

    <!--   Core JS Files   -->
    <script src="{!! asset('patient/assets/js/core/popper.min.js') !!}"></script>
    <script src="{!! asset('patient/assets/js/core/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('patient/assets/js/plugins/perfect-scrollbar.min.js') !!}"></script>
    <script src="{!! asset('patient/assets/js/plugins/smooth-scrollbar.min.js') !!}"></script>
    <script src="{!! asset('patient/assets/js/plugins/chartjs.min.js') !!}"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{!! asset('patient/assets/js/soft-ui-dashboard.min.js?v=1.0.3') !!}"></script>
</body>

</html>
