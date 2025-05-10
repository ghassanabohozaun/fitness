<?php if($notifications->isEmpty()): ?>
    <img src="<?php echo asset('site/images/noRecordFound.svg'); ?>" class="img-fluid" id="no_data_img" title="<?php echo __('site.no_date'); ?>">
<?php else: ?>
    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!--begin: Item-->
        <div class="d-flex align-items-center rounded p-5 mb-5
        <?php echo $notification->notify_class == 'unread' ? ' bg-light-info' : ' bg-light-primary'; ?>  ">
            <span class="svg-icon svg-icon-warning mr-5">
                <span class="svg-icon svg-icon-lg">
                    <i class="flaticon-bell <?php echo $notification->notify_class == 'unread' ? 'text-danger' : 'text-info'; ?>  icon-lg"></i>
                </span>
            </span>

            <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#" data-id="<?php echo $notification->id; ?>"
                    class="font-weight-normal text-dark-75 text-bold font-size-h5-sm mb-1 show_notification_btn">
                    <?php echo $notification->{'title_' . Lang()}; ?>

                    <span class=" text-warning font-size-sm font-weight-bold"><?php echo $notification->created_at; ?></span>
                </a>
            </div>

        </div>
        <!--end: Item-->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\fitness\resources\views/admin/includes/notifications.blade.php ENDPATH**/ ?>