<?php $__env->startSection('title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form class="form" action="<?php echo e(route('store.admin.settings')); ?>" method="POST" id="form_settings_store"
        enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">


                    <!--begin::Actions-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="<?php echo e(route('get.admin.settings')); ?>" class="text-muted">
                                <?php echo e(__('menu.settings')); ?>

                            </a>
                        </li>

                    </ul>

                    <!--end::Actions-->
                </div>
                <!--end::Info-->

                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">

                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                        <i class="fa fa-save"></i>
                        <?php echo e(__('general.save')); ?>

                    </button>

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
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0" id="card_settings_store">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-12">
                                        <!--begin:: top cards-->
                                        <div class="row justify-content-center">

                                            <div class="col-xl-6">
                                                <div class="card my-2">
                                                    <div class="card-body p-5">
                                                        <h3><?php echo e(__('settings.logo_and_icon')); ?> </h3>
                                                        <hr />
                                                        <br />
                                                        <!--begin::Group-->
                                                        <div class="form-group row my-5">
                                                            <label
                                                                class="col-xl-3 col-lg-3 col-form-label text-left"><?php echo e(__('settings.site_icon')); ?></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div class="image-input image-input-outline"
                                                                    id="kt_site_icon">
                                                                    <div class="image-input-wrapper"
                                                                        style="background-image: url(<?php echo e(asset('adminBoard/uploadedImages/logos/' . setting()->site_icon)); ?>);">
                                                                    </div>
                                                                    <label
                                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                        data-action="change" data-toggle="tooltip"
                                                                        title=""
                                                                        data-original-title="<?php echo e(__('general.change_image')); ?>">
                                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                                        <input type="file" name="site_icon"
                                                                            id="site_icon" />
                                                                        <input type="hidden" name="site_site_remove" />
                                                                    </label>

                                                                    <span
                                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                        data-action="cancel" data-toggle="tooltip"
                                                                        title="Cancel avatar">
                                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                    </span>
                                                                </div>
                                                                <span
                                                                    class="form-text text-muted"><?php echo e(__('settings.image_format_allow')); ?></span>
                                                                <span class="form-text text-danger"
                                                                    id="site_icon_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--begin::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row my-15">
                                                            <label
                                                                class="col-xl-3 col-lg-3 col-form-label text-left"><?php echo e(__('settings.site_logo')); ?></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div class="image-input image-input-outline "
                                                                    id="kt_site_logo">
                                                                    <div class="image-input-wrapper"
                                                                        style="background-image: url(<?php echo e(asset('adminBoard/uploadedImages/logos/' . setting()->site_logo)); ?>)">
                                                                    </div>
                                                                    <label
                                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                        data-action="change" data-toggle="tooltip"
                                                                        title=""
                                                                        data-original-title="<?php echo e(__('general.change_image')); ?>">
                                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                                        <input type="file" name="site_logo"
                                                                            id="site_logo" />
                                                                        <input type="hidden" name="site_logo_remove" />
                                                                    </label>

                                                                    <span
                                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                        data-action="cancel" data-toggle="tooltip"
                                                                        title="Cancel avatar">
                                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                    </span>
                                                                </div>
                                                                <span class="form-text text-muted">
                                                                    <?php echo e(__('settings.image_format_allow')); ?>

                                                                    <span class="form-text text-danger"
                                                                        id="site_logo_error"></span>
                                                                </span>
                                                            </div>

                                                        </div>
                                                        <!--begin::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_name_en')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid  form-control-lg"
                                                                    name="site_name_en" id="site_name_en" type="text"
                                                                    placeholder=" <?php echo e(__('settings.enter_site_name_en')); ?>"
                                                                    autocomplete="off"
                                                                    value="<?php echo e(setting()->site_name_en); ?>" />
                                                                <span class="form-text text-danger"
                                                                    id="site_name_en_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_name_ar')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="site_name_ar" id="site_name_ar" type="text"
                                                                    placeholder=" <?php echo e(__('settings.enter_site_name_ar')); ?>"
                                                                    autocomplete="off"
                                                                    value="<?php echo e(setting()->site_name_ar); ?>" />
                                                                <span class="form-text text-danger"
                                                                    id="site_name_ar_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="card my-2 " style="padding-bottom: 10px">
                                                    <div class="card-body p-5">
                                                        <h3><?php echo e(__('settings.contact_us')); ?> </h3>
                                                        <hr />
                                                        <br />
                                                        <!--begin::Group-->
                                                        <div class="d-none form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_email')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="site_email" id="site_email" type="text"
                                                                    placeholder=" <?php echo e(__('settings.enter_site_email')); ?>"
                                                                    autocomplete="off"
                                                                    value="<?php echo e(setting()->site_email); ?>" />
                                                                <span class="form-text text-danger"
                                                                    id="site_email_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_gmail')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="site_gmail" id="site_gmail" type="text"
                                                                    placeholder=" <?php echo e(__('settings.enter_site_gmail')); ?>"
                                                                    autocomplete="off"
                                                                    value="<?php echo e(setting()->site_gmail); ?>" />
                                                                <span class="form-text text-danger"
                                                                    id="site_gmail_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->


                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_facebook')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="site_facebook" id="site_facebook"
                                                                    type="text"
                                                                    placeholder=" <?php echo e(__('settings.enter_site_facebook')); ?>"
                                                                    autocomplete="off"
                                                                    value="<?php echo e(setting()->site_facebook); ?>" />
                                                                <span class="form-text text-danger"
                                                                    id="site_facebook_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_twitter')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="site_twitter" id="site_twitter" type="text"
                                                                    placeholder=" <?php echo e(__('settings.enter_site_twitter')); ?>"
                                                                    autocomplete="off"
                                                                    value="<?php echo e(setting()->site_twitter); ?>" />
                                                                <span class="form-text text-danger"
                                                                    id="site_twitter_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_youtube')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid  form-control-lg"
                                                                    name="site_youtube" id="site_youtube" type="text"
                                                                    placeholder=" <?php echo e(__('settings.enter_site_youtube')); ?>"
                                                                    autocomplete="off"
                                                                    value="<?php echo e(setting()->site_youtube); ?>" />
                                                                <span class="form-text text-danger"
                                                                    id="site_youtube_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->


                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_instagram')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid  form-control-lg"
                                                                    name="site_instagram" id="site_instagram"
                                                                    type="text"
                                                                    placeholder=" <?php echo e(__('settings.enter_site_instagram')); ?>"
                                                                    autocomplete="off"
                                                                    value="<?php echo e(setting()->site_instagram); ?>" />
                                                                <span class="form-text text-danger"
                                                                    id="site_instagram_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->


                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_linkedin')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid  form-control-lg"
                                                                    name="site_linkedin" id="site_linkedin"
                                                                    type="text"
                                                                    placeholder=" <?php echo e(__('settings.enter_site_linkedin')); ?>"
                                                                    autocomplete="off"
                                                                    value="<?php echo e(setting()->site_linkedin); ?>" />
                                                                <span class="form-text text-danger"
                                                                    id="site_linkedin_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->


                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_phone')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid  form-control-lg"
                                                                    name="site_phone" id="site_phone" type="text"
                                                                    placeholder=" <?php echo e(__('settings.enter_site_phone')); ?>"
                                                                    autocomplete="off"
                                                                    value="<?php echo e(setting()->site_phone); ?>" />
                                                                <span class="form-text text-danger"
                                                                    id="site_phone_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->


                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_mobile')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid  form-control-lg"
                                                                    name="site_mobile" id="site_mobile" type="text"
                                                                    placeholder=" <?php echo e(__('settings.enter_site_mobile')); ?>"
                                                                    autocomplete="off"
                                                                    value="<?php echo e(setting()->site_mobile); ?>" />
                                                                <span class="form-text text-danger"
                                                                    id="site_mobile_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!--end:: top cards-->


                                        <!--begin:: bottom cards-->
                                        <div class="row justify-content-center">

                                            <div class="col-xl-9">

                                                <div class="card my-2">
                                                    <div class="card-body p-5">
                                                        <h3><?php echo e(__('settings.seo_section')); ?> </h3>
                                                        <hr />
                                                        <br />
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_description_en')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <textarea rows="7" class="form-control form-control-solid form-control-lg" name="site_description_en"
                                                                    id="site_description_en" type="text" placeholder=" <?php echo e(__('settings.enter_site_description_en')); ?>"
                                                                    autocomplete="off"><?php echo e(setting()->site_description_en); ?></textarea>

                                                                <span class="form-text text-danger"
                                                                    id="site_description_en_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_description_ar')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <textarea rows="7" class="form-control form-control-solid  form-control-lg" name="site_description_ar"
                                                                    id="site_description_ar" type="text" placeholder=" <?php echo e(__('settings.enter_site_description_ar')); ?>"
                                                                    autocomplete="off"><?php echo e(setting()->site_description_ar); ?></textarea>

                                                                <span class="form-text text-danger"
                                                                    id="site_description_ar_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_keywords_en')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <textarea rows="7" class="form-control form-control-solid form-control-lg" name="site_keywords_en"
                                                                    id="site_keywords_en" type="text" placeholder=" <?php echo e(__('settings.enter_site_keywords_en')); ?>"
                                                                    autocomplete="off"><?php echo e(setting()->site_keywords_en); ?></textarea>

                                                                <span class="form-text text-danger"
                                                                    id="site_keywords_en_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_keywords_ar')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <textarea rows="7" class="form-control form-control-solid form-control-lg" name="site_keywords_ar"
                                                                    id="site_keywords_ar" type="text" placeholder=" <?php echo e(__('settings.enter_site_keywords_ar')); ?>"
                                                                    autocomplete="off"><?php echo e(setting()->site_keywords_ar); ?></textarea>

                                                                <span class="form-text text-danger"
                                                                    id="site_keywords_ar_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_address_en')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <textarea rows="2" class="form-control form-control-solid form-control-lg" name="site_address_en"
                                                                    id="site_address_en" type="text" placeholder=" <?php echo e(__('settings.enter_site_address_en')); ?>"
                                                                    autocomplete="off"><?php echo e(setting()->site_address_en); ?></textarea>

                                                                <span class="form-text text-danger"
                                                                    id="site_address_en_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                <?php echo e(__('settings.site_address_ar')); ?>

                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <textarea rows="2" class="form-control form-control-solid form-control-lg" name="site_address_ar"
                                                                    id="site_address_ar" type="text" placeholder=" <?php echo e(__('settings.enter_site_address_ar')); ?>"
                                                                    autocomplete="off"><?php echo e(setting()->site_address_ar); ?></textarea>

                                                                <span class="form-text text-danger"
                                                                    id="site_address_ar_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">

                                                <div class="card my-2">
                                                    <div class="card-body p-5">
                                                        <h3><?php echo e(__('settings.language_section')); ?> </h3>
                                                        <hr />
                                                        <br />


                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-8 col-lg-8 col-form-label">
                                                                <?php echo e(__('general.ar')); ?>

                                                            </label>
                                                            <div class="col-lg-4 col-xl-4">
                                                                <div class="cst-switch switch-lg">
                                                                    <input class="site_lang_ar" checked type="checkbox"
                                                                        name="site_lang_ar" id="site_lang_ar">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!--end::Group-->


                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-8 col-lg-8 col-form-label">
                                                                <?php echo e(__('general.en')); ?>

                                                            </label>
                                                            <div class="col-lg-4 col-xl-4 " id="site_lang_en_section">
                                                                <div class="cst-switch switch-lg">
                                                                    <input class="site_lang_en" type="checkbox"
                                                                        <?php echo e(setting()->site_lang_en == 'on' ? 'checked' : ''); ?>

                                                                        title="<?php echo __('general.english_langauge_enabled_all_the_times'); ?>"
                                                                        name="site_lang_en" id="site_lang_en">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->





                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-8 col-lg-8 col-form-label">
                                                                <?php echo e(__('settings.lang_front_button_status')); ?>

                                                            </label>
                                                            <div class="col-lg-4 col-xl-4 "
                                                                id="lang_front_button_section">
                                                                <div class="cst-switch switch-lg">
                                                                    <input class="lang_front_button_status"
                                                                        type="checkbox"
                                                                        <?php echo e(setting()->lang_front_button_status == 'on' ? 'checked' : ''); ?>

                                                                        name="lang_front_button_status"
                                                                        id="lang_front_button_status">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-8 col-lg-8 col-form-label">
                                                                <?php echo e(__('settings.disabled_forms_button')); ?>

                                                            </label>
                                                            <div class="col-lg-4 col-xl-4 " id="disabled_forms_section">
                                                                <div class="cst-switch switch-lg">
                                                                    <input class="disabled_forms_button" type="checkbox"
                                                                        <?php echo e(setting()->disabled_forms_button == 'on' ? 'checked' : ''); ?>

                                                                        name="disabled_forms_button"
                                                                        id="disabled_forms_button">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end:: bottom cards-->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
        </div>

        </div>
        </div>
        <!--end::content-->

    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script type="text/javascript">
        $("#site_lang_ar").prop('disabled', function() {
            return !$(this).prop('disabled');
        });


        var site_icon = new KTImageInput('kt_site_icon');
        var site_logo = new KTImageInput('kt_site_logo');

        $('#form_settings_store').on('submit', function(e) {
            e.preventDefault();

            ///////////////////////////////////////////////////////////////////////////
            $('#site_name_ar_error').text('')
            $('#site_name_en_error').text('')
            $('#site_email_error').text('')
            $('#site_gmail_error').text('')
            $('#site_facebook_error').text('')
            $('#site_twitter_error').text('')
            $('#site_youtube_error').text('')
            $('#site_instagram_error').text('')
            $('#site_linkedin_error').text('')

            $('#site_phone_error').text('')
            $('#site_mobile_error').text('')
            $('#site_status_error').text('')
            $('#site_description_ar_error').text('')
            $('#site_description_en_error').text('')
            $('#site_keywords_ar_error').text('')
            $('#site_keywords_en_error').text('')
            $('#site_address_ar_error').text('')
            $('#site_address_en_error').text('')
            $('#site_icon_error').text('')
            $('#site_logo_error').text('')


            $('#site_name_ar').css('border-color', '');
            $('#site_name_en').css('border-color', '');
            $('#site_email').css('border-color', '');
            $('#site_gmail').css('border-color', '');
            $('#site_facebook').css('border-color', '');
            $('#site_twitter').css('border-color', '');
            $('#site_youtube').css('border-color', '');
            $('#site_instagram').css('border-color', '');
            $('#site_linkedin').css('border-color', '');

            $('#site_phone').css('border-color', '');
            $('#site_mobile').css('border-color', '');
            $('#site_status').css('border-color', '');
            $('#site_description_ar').css('border-color', '');
            $('#site_description_en').css('border-color', '');
            $('#site_keywords_ar').css('border-color', '');
            $('#site_keywords_en').css('border-color', '');
            $('#site_address_ar').css('border-color', '');
            $('#site_address_en').css('border-color', '');
            $('#site_icon').css('border-color', '');
            $('#site_logo').css('border-color', '');
            ///////////////////////////////////////////////////////////////////////////

            var data = new FormData(this);
            var url = $(this).attr('action');
            var type = $(this).attr('method');

            $.ajax({
                url: url,
                data: data,
                dataType: 'json',
                type: type,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "<?php echo e(__('general.please_wait')); ?>",
                    });
                }, // end beforeSend

                success: function(data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: 'update_settings_button'
                            }
                        });
                        $('.update_settings_button').click(function() {
                            $('.site_logo_div').load(location.href + ' .site_logo_div');
                            $('html, body').animate({
                                scrollTop: 5
                            }, 300);
                        });
                    }

                }, // end success

                error: function(reject) {
                    KTApp.unblockPage();
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        $('#' + key).css('border-color', '#F64E60');
                        $('#' + key + '_error').text(value[0]);
                        $('html, body').animate({
                            scrollTop: 5
                        }, 300);
                    }); //end each


                }, // end error
                complete: function() {
                    KTApp.unblockPage();
                }, // end complete

            }); //end ajax
        }); //end submit

        ////////////////////////////////////////////////////
        // switch english language
        var switchStatus = false;
        $("#site_lang_en").on('change', function(e) {
            e.preventDefault();

            if ($(this).is(':checked')) {
                switchStatus = $(this).is(':checked');
            } else {
                switchStatus = $(this).is(':checked');
            }


            $.ajax({
                url: "<?php echo e(route('switch.english.lang')); ?>",
                data: {
                    switchStatus: switchStatus
                },
                type: 'post',
                dataType: 'JSON',
                beforeSend: function() {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "<?php echo e(__('general.please_wait')); ?>",
                    });
                }, //end beforeSend
                success: function(data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: 'switch_english_lang_button'
                            }
                        });
                        $('.switch_english_lang_button').click(function() {});
                    }
                }, //end success
            })
        });

        ////////////////////////////////////////////////////
        // switch language frontend button status
        var switchFrontendLanguageStatus = false;
        $("#lang_front_button_status").on('change', function(e) {
            e.preventDefault();

            if ($(this).is(':checked')) {
                switchFrontendLanguageStatus = $(this).is(':checked');
            } else {
                switchFrontendLanguageStatus = $(this).is(':checked');
            }

            $.ajax({
                url: "<?php echo e(route('switch.frontend.lang')); ?>",
                data: {
                    switchFrontendLanguageStatus: switchFrontendLanguageStatus
                },
                type: 'post',
                dataType: 'JSON',
                beforeSend: function() {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "<?php echo e(__('general.please_wait')); ?>",
                    });
                }, //end beforeSend
                success: function(data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: 'switch_frontend_lang_button'
                            }
                        });
                        $('.switch_frontend_lang_button').click(function() {});
                    }
                }, //end success
            })
        });

        ////////////////////////////////////////////////////
        // disabled form button
        var switchDisabledFromsButton = false;
        $("#disabled_forms_button").on('change', function(e) {
            e.preventDefault();

            if ($(this).is(':checked')) {
                switchDisabledFromsButton = $(this).is(':checked');
            } else {
                switchDisabledFromsButton = $(this).is(':checked');
            }

            $.ajax({
                url: "<?php echo e(route('switch.disabled.forms')); ?>",
                data: {
                    switchDisabledFromsButton: switchDisabledFromsButton
                },
                type: 'post',
                dataType: 'JSON',
                beforeSend: function() {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "<?php echo e(__('general.please_wait')); ?>",
                    });
                }, //end beforeSend
                success: function(data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: 'switch_disabled_forms_button'
                            }
                        });
                        $('.switch_disabled_forms_button').click(function() {});
                    }
                }, //end success
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fitness\resources\views/admin/home/settings.blade.php ENDPATH**/ ?>