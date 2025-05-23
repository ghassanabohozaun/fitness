<!DOCTYPE html>
<html <?php if(Lang() == 'ar'): ?> lang="ar" dir="rtl" <?php else: ?> lang="en" dir="ltr" <?php endif; ?>>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- title -->
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->yieldContent('metaTags'); ?>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="<?php echo asset('site/assets/img/favicon.png'); ?>">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="<?php echo asset('site/assets/css/all.min.css'); ?>">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?php echo asset('site/assets/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?php echo asset('site/assets/css/owl.carousel.css'); ?>">
    <!-- magnific popup -->
    <link rel="stylesheet" href="<?php echo asset('site/assets/css/magnific-popup.css'); ?>">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo asset('site/assets/css/animate.css'); ?>">
    <!-- mean menu css -->
    <link rel="stylesheet" href="<?php echo asset('site/assets/css/meanmenu.min.css'); ?>">
    <!-- main style -->
    <link rel="stylesheet" href="<?php echo asset('site/assets/css/main.css'); ?>">
    <!-- responsive -->
    <link rel="stylesheet" href="<?php echo asset('site/assets/css/responsive.css'); ?>">

    <?php echo $__env->yieldPushContent('style'); ?>

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <?php echo $__env->yieldContent('content'); ?>



    <!-- jquery -->
    <script src="<?php echo asset('site/assets/js/jquery-1.11.3.min.js'); ?>"></script>
    <!-- bootstrap -->
    <script src="<?php echo asset('site/assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- count down -->
    <script src="<?php echo asset('site/assets/js/jquery.countdown.js'); ?>"></script>
    <!-- isotope -->
    <script src="<?php echo asset('site/assets/js/jquery.isotope-3.0.6.min.js'); ?>"></script>
    <!-- waypoints -->
    <script src="<?php echo asset('site/assets/js/waypoints.js'); ?>"></script>
    <!-- owl carousel -->
    <script src="<?php echo asset('site/assets/js/owl.carousel.min.js'); ?>"></script>
    <!-- magnific popup -->
    <script src="<?php echo asset('site/assets/js/jquery.magnific-popup.min.js'); ?>"></script>
    <!-- mean menu -->
    <script src="<?php echo asset('site/assets/js/jquery.meanmenu.min.js'); ?>"></script>
    <!-- sticker js -->
    <script src="<?php echo asset('site/assets/js/sticker.js'); ?>"></script>
    <!-- main js -->
    <script src="<?php echo asset('site/assets/js/main.js'); ?>"></script>

    <?php echo $__env->yieldPushContent('script'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\fitness\resources\views/layouts/site.blade.php ENDPATH**/ ?>