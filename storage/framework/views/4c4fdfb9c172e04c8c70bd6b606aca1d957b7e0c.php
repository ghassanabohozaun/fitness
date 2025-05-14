<!DOCTYPE html>
<html <?php if(Lang() == 'ar'): ?> lang="ar" dir="rtl" <?php else: ?> lang="en" dir="ltr" <?php endif; ?>>

<head>
    <title>
        <?php echo e(!empty($title) ? $title : __('patient.dashboard')); ?>

    </title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->yieldContent('metaTags'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo asset('adminBoard/uploadedImages/logos/' . setting()->site_icon); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo asset('adminBoard/uploadedImages/logos/' . setting()->site_icon); ?>">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?php echo asset('patient/assets/css/nucleo-icons.css'); ?>" rel="stylesheet" />
    <link href="<?php echo asset('patient/assets/css/nucleo-svg.css'); ?>" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?php echo asset('patient/assets/css/nucleo-svg.css'); ?>" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?php echo asset('patient/assets/css/soft-ui-dashboard.css?v=1.0.3'); ?>" rel="stylesheet" />

</head>

<body class="g-sidenav-show <?php echo Lang() == 'ar' ? 'rtl' : ''; ?>  bg-gray-100">

    <?php echo $__env->make('patient.includes.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">


        <?php echo $__env->make('patient.includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid py-4">

            <?php echo $__env->yieldContent('content'); ?>

            <?php echo $__env->make('patient.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </main>

    <!--   Core JS Files   -->
    <script src="<?php echo asset('patient/assets/js/core/popper.min.js'); ?>"></script>
    <script src="<?php echo asset('patient/assets/js/core/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo asset('patient/assets/js/plugins/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?php echo asset('patient/assets/js/plugins/smooth-scrollbar.min.js'); ?>"></script>
    <script src="<?php echo asset('patient/assets/js/plugins/chartjs.min.js'); ?>"></script>

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
    <script src="<?php echo asset('patient/assets/js/soft-ui-dashboard.min.js?v=1.0.3'); ?>"></script>
</body>

</html>
<?php /**PATH C:\laragon\www\fitness\resources\views/layouts/patient.blade.php ENDPATH**/ ?>