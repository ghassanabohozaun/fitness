@extends('layouts.admin')
@section('title')
@endsection
@section('content')
    <form class="form" action="{{ route('admin.courses.update') }}" method="POST" id="form_courses_update">
        @csrf
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">

                    <!--begin::Actions-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.courses') }}" class="text-muted">
                                {{ __('menu.courses') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="text-muted">
                                {{ __('courses.update_course') }}
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
                        {{ __('general.save') }}
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
                        <div class="card card-custom card-shadowless rounded-top-0" id="card_languages_add">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">

                                        <div class="row justify-content-center">
                                            <div class="col-xl-9">

                                                <!--begin::body-->
                                                <div class="my-5">

                                                    <!--begin::Group-->
                                                    <div class="form-group row d-none">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            ID
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input type="hidden" value="{{ $course->id }}"
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="id" id="id" autocomplete="off" />
                                                            <input type="hidden"
                                                                class="form-control form-control-solid form-control-lg"
                                                                id='site_lang_en' name="site_lang_en"
                                                                value="{!! setting()->site_lang_en !!}">

                                                            <input type="hidden"
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="hidden_update" value="hidden_update">
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('courses.photo') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="image-input image-input-outline"
                                                                id="kt_course_photo">
                                                                <!--  style="background-image: url({{-- asset(Storage::url(setting()->site_icon)) --}})"-->
                                                                <div class="image-input-wrapper"
                                                                    style="background-image: url({{ asset('adminBoard/uploadedImages/courses/' . $course->photo) }}">

                                                                </div>
                                                                <label
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="change" data-toggle="tooltip"
                                                                    title=""
                                                                    data-original-title="{{ __('general.change_image') }}">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="photo" id="photo"
                                                                        class="table-responsive-sm">
                                                                    <input type="hidden" name="photo_remove" />
                                                                </label>

                                                                <span
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="cancel" data-toggle="tooltip"
                                                                    title="Cancel avatar">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <span
                                                                class="form-text text-muted">{{ __('general.image_format_allow') }}
                                                            </span>
                                                            <span class="form-text text-danger" id="photo_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->



                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('courses.title_ar') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input value="{{ $course->title_ar }}"
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="title_ar" id="title_ar" type="text"
                                                                placeholder=" {{ __('courses.enter_title_ar') }}"
                                                                autocomplete="off" />

                                                            <span class="form-text text-danger" id="title_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('courses.title_en') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input value="{{ $course->title_en }}"
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="title_en" id="title_en" type="text"
                                                                placeholder=" {{ __('courses.enter_title_en') }}"
                                                                autocomplete="off" />

                                                            <span class="form-text text-danger"
                                                                id="title_en_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('courses.description_ar') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="5" class="form-control form-control-solid form-control-lg" name="description_ar"
                                                                id="description_ar" type="text" placeholder=" {{ __('courses.enter_description_ar') }}" autocomplete="off">{{ $course->description_ar }}</textarea>

                                                            <span class="form-text text-danger"
                                                                id="description_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('courses.description_en') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="5" class="form-control form-control-solid form-control-lg" name="description_en"
                                                                id="description_en" type="text" placeholder=" {{ __('courses.enter_description_en') }}" autocomplete="off">{{ $course->description_en }}</textarea>

                                                            <span class="form-text text-danger"
                                                                id="description_en_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->



                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('courses.hours') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input value="{!! $course->hours !!}"
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="hours" id="hours" type="text"
                                                                placeholder=" {{ __('courses.enter_hours') }}"
                                                                autocomplete="off" />
                                                            <span class="form-text text-danger" id="hours_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('courses.cost') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input value="{!! $course->cost !!}"
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="cost" id="cost" type="text"
                                                                placeholder=" {{ __('courses.enter_cost') }}"
                                                                autocomplete="off" />
                                                            <span class="form-text text-danger" id="cost_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('courses.discount') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input value="{!! $course->discount !!}"
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="discount" id="discount" type="text"
                                                                placeholder=" {{ __('courses.enter_discount') }}"
                                                                autocomplete="off" />
                                                            <span class="form-text text-danger"
                                                                id="discount_error"></span>
                                                            <span class="form-text text-muted">
                                                                {{ __('courses.discount_note') }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('courses.start_at') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="input-group start_at">
                                                                <input type="text" value="{!! $course->start_at !!}"
                                                                    class="form-control" id="start_at" name="start_at"
                                                                    readonly
                                                                    placeholder="{{ __('courses.enter_start_at') }}" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i
                                                                            class="la la-calendar-check-o"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <span class="form-text text-danger"
                                                                id="start_at_error"></span>
                                                        </div>
                                                        <!--end::Group-->
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('courses.end_at') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="input-group end_at">
                                                                <input type="text" value="{!! $course->end_at !!}"
                                                                    class="form-control" id="end_at" name="end_at"
                                                                    readonly
                                                                    placeholder="{{ __('courses.enter_end_at') }}" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i
                                                                            class="la la-calendar-check-o"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <span class="form-text text-danger" id="end_at_error"></span>
                                                        </div>
                                                        <!--end::Group-->
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('courses.zoom_link') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="3" class="form-control form-control-solid form-control-lg" name="zoom_link" id="zoom_link"
                                                                type="text" placeholder=" {{ __('courses.enter_zoom_link') }}" autocomplete="off">{!! $course->zoom_link !!}</textarea>
                                                            <span class="form-text text-danger"
                                                                id="zoom_link_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->



                                                </div>
                                                <!--begin::body-->

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
@endsection

@push('js')
    <script type="text/javascript">
        var course_photo = new KTImageInput('kt_course_photo');

        //////////////////////////////////////////////////////
        $('#start_at').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: true,
            clearBtn: false,
            orientation: "bottom auto",
            language: "{{ Lang() }}",
            autoclose: true,
            todayHighlight: true,
        });
        //////////////////////////////////////////////////////
        $('#end_at').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: true,
            clearBtn: false,
            orientation: "bottom auto",
            language: "{{ Lang() }}",
            autoclose: true,
            todayHighlight: true,
        });


        $('#form_courses_update').on('submit', function(e) {
            e.preventDefault();
            //////////////////////////////////////////////////////////////
            $('#photo').css('border-color', '');
            $('#title_ar').css('border-color', '');
            $('#title_en').css('border-color', '');
            $('#description_ar').css('border-color', '');
            $('#description_en').css('border-color', '');
            $('#hours').css('border-color', '');
            $('#cost').css('border-color', '');
            $('#discount').css('border-color', '');
            $('#start_at').css('border-color', '');
            $('#end_at').css('border-color', '');
            $('#zoom_link').css('border-color', '');

            $('#photo_error').text('');
            $('#title_ar_error').text('');
            $('#title_en_error').text('');
            $('#description_ar_error').text('');
            $('#description_en_error').text('');
            $('#hours_error').text('');
            $('#cost_error').text('');
            $('#discount_error').text('');
            $('#start_at_error').text('');
            $('#end_at_error').text('');
            $('#zoom_link_error').text('');

            /////////////////////////////////////////////////////////////
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{ __('general.please_wait') }}",
                    });
                }, //end beforeSend

                success: function(data) {
                    KTApp.unblockPage();
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: 'update_user_button'
                            }
                        });
                        $('.update_user_button').click(function() {
                            window.location.href = "{{ route('admin.courses') }}";
                        });
                    }
                }, //end success

                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                        $('html, body').animate({
                            scrollTop: 20
                        }, 300);

                    });

                }, //end error

                complete: function() {
                    KTApp.unblockPage();
                }, //end complete

            });

        }); //end submit
    </script>
@endpush
