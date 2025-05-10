<div id="kt_header" class="header header-fixed ">
    <!--begin::Container-->
    <div class=" container-fluid  d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default ">
                <ul class="menu-nav ">
                    <li
                        class="menu-item  menu-item-open menu-item-here
                     menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active">
                        <a href="<?php echo route('index'); ?>" class="menu-link ">
                            <span class="menu-text"><?php echo e(__('dashboard.website')); ?></span><i class="menu-arrow"></i></a>
                    </li>

                </ul>
                <!--end::Header Nav-->
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->

        <!--begin::Topbar-->
        <div class="topbar">


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notifications')): ?>
                <!--begin::notifications Panel-->
                <div class="topbar-item">
                    <div class="btn btn-icon btn-clean btn-lg mr-1 notifications_count" id="kt_quick_panel_toggle">
                        <?php if(App\Models\Notification::where('notify_for', 'admin')->where('notify_class', 'unread')->count() > 0): ?>
                            <span class="notification_alert_dot"></span>
                        <?php endif; ?>
                        <span class="svg-icon svg-icon-xl svg-icon-primary">
                            <i class="flaticon-bell text-info icon-2x"></i>
                        </span>
                    </div>
                </div>
                <div id="kt_quick_panel" class="offcanvas offcanvas-right pt-5 pb-10">
                    <!--begin::Header-->
                    <div
                        class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5">
                        <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary flex-grow-1 px-10"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_notifications">
                                    <?php echo __('notifications.notifications'); ?>

                                </a>
                            </li>
                        </ul>
                        <div class="offcanvas-close mt-n1 pr-5">
                            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary"
                                id="kt_quick_panel_close">
                                <i class="ki ki-close icon-xs text-muted"></i>
                            </a>
                        </div>
                    </div>
                    <!--end::Header-->

                    <!--begin::Content-->
                    <div class="offcanvas-content px-10">
                        <div class="tab-content">
                            <!--begin::Tabpane-->

                            <div class="tab-pane fade show pt-3 pr-5 mr-n5 active" id="kt_quick_panel_notifications"
                                role="tabpanel">

                                <!--begin::Section-->
                                <div class="mb-5">

                                    <span id="notify_section"></span>

                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Tabpane-->

                        </div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::notifications Panel-->
            <?php endif; ?>


            <!--begin::Languages-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                        <img class="h-20px w-20px rounded-sm"
                            <?php if(Lang() == 'ar'): ?> src="<?php echo e(asset('adminBoard/assets/media/svg/flags/العربية.svg')); ?>"
                             <?php else: ?>
                                 src="<?php echo e(asset('adminBoard/assets/media/svg/flags/English.svg')); ?>" <?php endif; ?>
                            alt="" />
                    </div>
                </div>
                <!--end::Toggle-->

                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Nav-->
                    <ul class="navi navi-hover py-4">
                        <!--begin::Item-->
                        <!--end::Item-->
                        <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="navi-item">
                                <a class="navi-link" rel="alternate" hreflang="<?php echo e($localeCode); ?>"
                                    href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                                    <span class="symbol symbol-20 mr-3">
                                        <img src="<?php echo e(asset('adminBoard/assets/media/svg/flags/' . $properties['native'] . '.svg')); ?>"
                                            alt="" />
                                    </span>
                                    <span class="navi-text"> <?php echo e($properties['native']); ?></span>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                    <!--end::Nav-->
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Languages-->

            <!--begin::User  -->
            <div class="topbar-item ">
                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2 admin_topbar_item"
                    id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1"></span>
                    <span
                        class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"><?php echo e(admin()->user()->name); ?></span>
                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                        <?php if(!empty(admin()->user()->photo)): ?>
                            <img src="<?php echo e(asset('adminBoard/uploadedImages/admin/' . admin()->user()->photo)); ?>" />
                        <?php else: ?>
                            <img src="<?php echo e(asset('adminBoard/images/user.jpg')); ?>">
                        <?php endif; ?>
                    </span>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>

<!-- begin:: Notifications modal -->
<div class="modal fade custom-modal" id="show_admin_notification_modal" tabindex="-1" role="dialog"
    aria-labelledby="show_admin_notification_modal" aria-hidden="true">
    <div class="modal-dialog  modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="modal-inner text-center">
                    <form>
                        <div class="account-wrapper register-first">
                            <span style="display:table;margin:0 auto;">
                                <i class="flaticon-bell text-info icon-xl-3x"></i>
                            </span>
                            <div style="padding-right: 20px">
                                <p class="notification_title"></p>
                                <br />
                                <p class="notification_details"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Notifications modal -->
<?php $__env->startPush('js'); ?>
    <script type="text/javascript">
        // Notifications
        $('#notify_section').load("<?php echo route('admin.get.notifications'); ?>");
        $(".notifications_count").load(location.href + " .notifications_count");

        setInterval(
            function() {
                $('#notify_section').load("<?php echo route('admin.get.notifications'); ?>");
                $(".notifications_count").load(location.href + " .notifications_count");
            }, 600000);
        ///50000



        // show notification
        $('body').on('click', '.show_notification_btn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.get("<?php echo route('admin.get.one.notification'); ?>", {
                id,
                id
            }, function(data) {
                console.log(data);
                if ("<?php echo Lang() == 'ar'; ?>") {
                    $('.notification_title').text(data.data.title_ar);
                    $('.notification_details').text(data.data.details_ar);
                } else {
                    $('.notification_title').text(data.data.title_en);
                    $('.notification_details').text(data.data.details_en);
                }
                $('#show_admin_notification_modal').modal('show');
                $('#notify_section').load("<?php echo route('admin.get.notifications'); ?>");
                $(".notifications_count").load(location.href + " .notifications_count");
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\fitness\resources\views/admin/includes/header.blade.php ENDPATH**/ ?>