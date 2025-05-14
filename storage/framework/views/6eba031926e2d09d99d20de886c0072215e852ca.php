<!DOCTYPE html>
<html <?php if(Lang() == 'ar'): ?> lang="ar" dir="rtl" <?php else: ?> lang="en" dir="ltr" <?php endif; ?>>

<head>
    <title>
        <?php echo __('login.login'); ?>

    </title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo Lang() == 'ar' ? setting()->site_description_ar : setting()->site_description_en; ?>">
    <meta name="keywords" content="<?php echo Lang() == 'ar' ? setting()->site_keywords_ar : setting()->site_keywords_en; ?>">
    <meta name="application-name" content="<?php echo Lang() == 'ar' ? setting()->site_name_ar : setting()->site_name_en; ?>" />
    <meta name="author" content="<?php echo Lang() == 'ar' ? setting()->site_name_ar : setting()->site_name_en; ?>" />
    <link rel="shortcut icon" href="<?php echo asset('adminBoard/uploadedImages/logos/' . setting()->site_icon); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo asset('adminBoard/uploadedImages/logos/' . setting()->site_icon); ?>">

    <!-- Nucleo Icons -->
    <link href="<?php echo asset('patient/assets/css/nucleo-icons.css'); ?>" rel="stylesheet" />
    <link href="<?php echo asset('patient/assets/css/nucleo-svg.css'); ?>" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo asset('patient/assets/css/nucleo-svg.css'); ?>" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?php echo asset('patient/assets/css/soft-ui-dashboard.css?v=1.0.3'); ?>" rel="stylesheet" />

</head>

<body class="">
    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav
                    class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="<?php echo route('index'); ?>">
                            <?php echo setting()->{'site_name_' . Lang()}; ?>

                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="#">
                                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                        <?php echo __('login.sign_in'); ?>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="#">
                                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                        <?php echo __('login.sign_up'); ?>

                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav d-lg-block d-none">

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar -->

    <!-- -------- START Login From  -------->

    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-85">
                <div class="container">
                    <div class="row">

                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient"><?php echo __('login.welcome_back'); ?></h3>
                                    <p class="mb-0"> <?php echo __('login.enter_your_email_and_password_to_sign_in'); ?></p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="post" action="<?php echo route('patient.login'); ?>"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <?php if(\Illuminate\Support\Facades\Session::has('error')): ?>
                                            <div class="alert alert-danger text-white font-weight-bold" role="alert">
                                                <?php echo e(\Illuminate\Support\Facades\Session::get('error')); ?>

                                            </div>
                                        <?php endif; ?>

                                        <label><?php echo __('login.email'); ?></label>
                                        <div class="mb-3">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="<?php echo __('login.enter_email'); ?>" aria-label="Email"
                                                aria-describedby="email-addon">
                                        </div>
                                        <label><?php echo __('login.password'); ?></label>
                                        <div class="mb-3">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="<?php echo __('login.enter_password'); ?>" aria-label="Password"
                                                aria-describedby="password-addon">
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="rememberMe"
                                                id="rememberMe" checked="">
                                            <label class="form-check-label"
                                                for="rememberMe"><?php echo __('login.remember_me'); ?></label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn bg-gradient-info w-100 mt-4 mb-0"><?php echo __('login.sign_in'); ?></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        <?php echo __('login.dont_have_account'); ?>

                                        <a href="javascript:;"
                                            class="text-info text-gradient font-weight-bold"><?php echo __('login.sign_up'); ?></a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        

                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- -------- End Login From  -------->


    <!-- -------- START FOOTER  -------->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        <?php echo __('login.copyright'); ?> ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> <b> <?php echo setting()->{'site_name_' . Lang()}; ?></b>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- -------- END FOOTER --------->

    <!--   Core JS Files   -->
    <script src="<?php echo asset('patient/assets/js/core/popper.min.js'); ?>"></script>
    <script src="<?php echo asset('patient/assets/js/core/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo asset('patient/assets/js/plugins/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?php echo asset('patient/assets/js/plugins/smooth-scrollbar.min.js'); ?>"></script>
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
<?php /**PATH C:\laragon\www\fitness\resources\views/patient/auth/login.blade.php ENDPATH**/ ?>