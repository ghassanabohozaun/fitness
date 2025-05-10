<?php $__env->startSection('title'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div
            class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <!--begin::Actions-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);" class="text-muted">
                            <?php echo e(__('menu.permissions')); ?>

                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">
                            <?php echo e(__('menu.show_all')); ?>

                        </a>
                    </li>
                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <a href="<?php echo route('admin.role.create'); ?>"
                   class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                    <i class="fa fa-plus-square"></i>
                    <?php echo e(__('menu.add_new_permission')); ?>

                </a>
                &nbsp;
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::content-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom" id="card_posts">
                        <div class="card-body">


                            <!--begin: Datatable-->
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="scroll">
                                            <div class="table-responsive">
                                                <table class="table myTable table-hover" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="col-lg-1"> <?php echo __('roles.role_name_ar'); ?></th>
                                                        <th class="col-lg-1"> <?php echo __('roles.role_name_en'); ?></th>
                                                        <th class="col-lg-9"> <?php echo __('roles.permissions'); ?></th>
                                                        <th class="text-center" style="width: 100px;"><?php echo __('general.actions'); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <tr>
                                                            <td><?php echo e($loop->iteration); ?></td>
                                                            <td><?php echo e($role->role_name_ar); ?></td>
                                                            <td><?php echo e($role->role_name_en); ?></td>
                                                            <td><?php $__currentLoopData = config('global.permissions'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php echo e(in_array($name,$role->permissions) ? __(config('global.permissions.',$value)).' | ' :''); ?>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo route('admin.role.edit',$role->id); ?>"
                                                                   class="btn btn-hover-primary btn-icon btn-pill "
                                                                   title="<?php echo e(__('general.edit')); ?>">
                                                                    <i class="fa fa-edit fa-1x"></i>
                                                                </a>


                                                                <a href="#"
                                                                   class="btn btn-hover-danger btn-icon btn-pill role_delete_btn"
                                                                   data-id="<?php echo e($role->id); ?>"
                                                                   title="<?php echo e(__('general.delete')); ?>">
                                                                    <i class="fa fa-trash fa-1x"></i>
                                                                </a>


                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <tr>
                                                            <td colspan="6" class="text-center">
                                                                <?php echo __('roles.no_permissions_found'); ?>

                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="6">
                                                            <div class="float-right">
                                                                <?php echo $roles->appends(request()->all())->links(); ?>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Datatable-->


                        </div>

                        <form class="d-none" id="form_role_delete">
                            <input type="hidden" id="role_delete_id">
                        </form>
                        <!--end::Form-->

                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->

        <!--begin::Form-->
    </div>
    <!--end::content-->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

    <script type="text/javascript">
        ///////////////////////////////////////////////////////////////////////
        //  delete role notify
        $(document).on('click', '.role_delete_btn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: "<?php echo e(__('general.ask_delete_record')); ?>",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "<?php echo e(__('general.yes')); ?>",
                cancelButtonText: "<?php echo e(__('general.no')); ?>",
                reverseButtons: false,
                allowOutsideClick: false,
            }).then(function (result) {
                if (result.value) {
                    //////////////////////////////////////
                    // Delete role
                    $.ajax({
                        url: '<?php echo route('admin.role.destroy'); ?>',
                        data: {id, id},
                        type: 'post',
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            if (data.status == true) {
                                Swal.fire({
                                    title: "<?php echo __('general.deleted'); ?>",
                                    text: "<?php echo __('general.delete_success_message'); ?>",
                                    icon: "success",
                                    allowOutsideClick: false,
                                    customClass: {confirmButton: 'delete_role_button'}
                                });
                                $('.delete_role_button').click(function () {
                                    $('#myTable').load(location.href + (' #myTable'));
                                });
                            }

                            if (data.status == false) {
                                Swal.fire({
                                    title: "<?php echo __('general.cancelled'); ?>",
                                    text: data.msg,
                                    icon: "warning",
                                    allowOutsideClick: false,
                                });

                            }
                        },//end success
                    });

                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        title: "<?php echo __('general.cancelled'); ?>",
                        text: "<?php echo __('general.cancelled_message'); ?>",
                        icon: "error",
                        allowOutsideClick: false,
                        customClass: {confirmButton: 'cancel_delete_role_button'}
                    })
                }
            });


        });

    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fitness\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>