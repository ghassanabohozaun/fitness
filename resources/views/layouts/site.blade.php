<!doctype html>
<html @if (Lang() == 'ar') lang="ar" dir="rtl" @else lang="en" dir="ltr" @endif
    xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('metaTags')
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <link rel="icon" type="image/jpg" href="{!! asset('adminBoard/uploadedImages/logos/' . setting()->site_icon) !!}">
    <link rel="shortcut icon" href="{!! asset('adminBoard/uploadedImages/logos/' . setting()->site_icon) !!}">
    <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('adminBoard/uploadedImages/logos/' . setting()->site_icon) !!}">
    @if (Lang() == 'ar')
        <link href="{!! asset('site/css/style-ar.css') !!}" rel="stylesheet">
        <link href="{!! asset('site/css/whatsapp-rtl.css') !!}" rel="stylesheet">
    @else
        <link href="{!! asset('site/css/style-en.css') !!}" rel="stylesheet">
        <link href="{!! asset('site/css/whatsapp-ltr.css') !!}" rel="stylesheet">
    @endif
    <link href="{!! asset('site/css/pagination.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('site/css/bootstrap-datepicker.min.css') !!}" />
    <link href="{!! asset('site/css/my-style.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/player/css/audioplayer.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/css/my-sweet-alert-style.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/css/testimonials.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/css/faqs.css') !!}" rel="stylesheet">
    @stack('css')

</head>

<body>
    @include('site.includes.header')
    @yield('content')
    @include('site.includes.footer')

    <script src="{!! asset('site/js/jquery.min.js') !!}"></script>
    <script src="{!! asset('site/js/slick.min.js') !!}"></script>
    <script src="{!! asset('site/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('site/js/aos.js') !!}"></script>
    <script src="{!! asset('site/js/uikit.min.js') !!}"></script>
    <script src="{!! asset('site/js/jquery.countTo.js') !!}"></script>
    <script src="{!! asset('site/js/js.js') !!}"></script>
    <script src="{!! asset('site/js/sweetalert2@11.js') !!}"></script>
    <script src="{!! asset('site/js/bootstrap-datepicker.min.js') !!}"></script>
    <script src="{!! asset('site/js/testimonials.js') !!}"></script>
    <script src="{!! asset('site/js/faqs.js') !!}"></script>
    <script src="{!! asset('site/js/whatsapp.js') !!}"></script>


    @stack('js')
    <script>
        AOS.init();
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</body>

</html>
