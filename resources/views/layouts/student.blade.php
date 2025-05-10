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

    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/jpg" href="{!! asset('adminBoard/uploadedImages/logos/' . setting()->site_icon) !!}">
    <link rel="shortcut icon" href="{!! asset('adminBoard/uploadedImages/logos/' . setting()->site_icon) !!}">
    <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('adminBoard/uploadedImages/logos/' . setting()->site_icon) !!}">
    <meta name="application-name" content="" />
    <meta name="author" content="" />

    <link href="{!! asset('site/css/select2.min.css') !!}" rel="stylesheet">
    @if (Lang() == 'ar')
        <link href="{!! asset('site/css/style-ar.css') !!}" rel="stylesheet">
    @else
        <link href="{!! asset('site/css/style-en.css') !!}" rel="stylesheet">
    @endif
    <link href="{!! asset('site/css/my-style.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/css/pagination.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/player/css/audioplayer.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/css/my-sweet-alert-style.css') !!}" rel="stylesheet">

    @stack('css')
</head>

<body>

    @include('student.includes.orange-header')

    <section class="py-3 min_height_700">
        <div class=" container">
            <div class="row">
                @include('student.includes.sidebar')
                @yield('content')
            </div>
        </div>
    </section>

    @include('student.includes.footer')

    <script src="{!! asset('site/js/jquery.min.js') !!}"></script>
    <script src="{!! asset('site/js/uikit.min.js') !!}"></script>
    <script src="{!! asset('site/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('site/js/aos.js') !!}"></script>
    <script src="{!! asset('site/js/slick.min.js') !!}"></script>
    <script src="{!! asset('site/js/select2.min.js') !!}"></script>
    <script src="{!! asset('site/js/js.js') !!}"></script>
    <script src="{!! asset('site/js/sweetalert2@11.js') !!}"></script>
    @stack('js')

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        var bar = document.getElementById('js-progressbar');

        UIkit.upload('.js-upload', {

            url: '/img',
            multiple: true,

            beforeSend: function() {
                console.log('beforeSend', arguments);
            },
            beforeAll: function() {
                console.log('beforeAll', arguments);
            },
            load: function() {
                console.log('load', arguments);
            },
            error: function() {
                console.log('error', arguments);
            },
            complete: function() {
                console.log('complete', arguments);
            },

            loadStart: function(e) {
                console.log('loadStart', arguments);

                bar.removeAttribute('hidden');
                bar.max = e.total;
                bar.value = e.loaded;
            },

            progress: function(e) {
                console.log('progress', arguments);

                bar.max = e.total;
                bar.value = e.loaded;
            },

            loadEnd: function(e) {
                console.log('loadEnd', arguments);

                bar.max = e.total;
                bar.value = e.loaded;
            },

            completeAll: function() {
                console.log('completeAll', arguments);

                setTimeout(function() {
                    bar.setAttribute('hidden', 'hidden');
                }, 1000);

                alert('Upload Completed');
            }

        });
    </script>

</body>

</html>
