<!-- begin add new mawhob Modal -->
<div class="modal fade" id="modal_add_new_course_student" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('courses.add_new_student') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            <form action="{!! route('admin.course.enroll.student.store') !!}" method="POST" enctype="multipart/form-data"
                id="form_add_new_course_student">
                @csrf
                <div class="modal-body">

                    <!--begin::Card-->
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <div class="row justify-content-center">
                                <div class="col-xl-12">

                                    <!--begin::Group-->
                                    <div class=" form-group row d-none">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            ID
                                        </label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input type="hidden" class="form-control" id="id" name="id">
                                        </div>
                                    </div>
                                    <!--end::Group-->

                                    <br />
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-xl-4 col-lg-4 col-form-label">
                                            {{ __('courses.student_name') }}
                                        </label>
                                        <div class="col-lg-4 col-xl-8">
                                            <select class="form-control" id="student_id_select2" style="width: 100%"
                                                name="student_id">
                                                <option></option>
                                            </select>
                                            <span class="form-text text-danger" id="student_id_error"></span>
                                        </div>
                                    </div>
                                    <!--end::Group-->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="" id="cancel_add_new_course_student_btn"
                        class="btn btn-light-primary font-weight-bold">
                        {{ __('general.cancel') }}
                    </button>

                    <button type="submit" id="save_add_new_course_student_btn"
                        class="btn btn-primary font-weight-bold">
                        {{ __('general.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Renew course  Modal-->

@push('js')
    <script type="text/javascript">
        // student select2
        $('#student_id_select2').select2({
            minimumInputLength: 1,
            maximumInputLength: 20,
            placeholder: '{!! __('general.select_from_list') !!}',
            allowClear: true,
            escapeMarkup: function(markup) {
                return markup;
            },
            language: {
                inputTooShort: function() {
                    return "{!! __('general.inputTooShort') !!}";
                },
                inputTooLong: function() {
                    return "{!! __('general.inputTooLong') !!}";
                },
                errorLoading: function() {
                    return "{!! __('general.errorLoading') !!}";
                },
                noResults: function() {
                    return "<span>{!! __('general.noResults2') !!}";
                },
                searching: function() {
                    return " {!! __('general.searching') !!}";
                }
            },
            ajax: {
                url: "{!! route('admin.get.all.students.name') !!}",
                dataType: 'json',
                delay: 10,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {

                            if ("{!! Lang() == 'ar' !!}") {
                                return {
                                    text: item.name_ar,
                                    id: item.id,
                                }
                            } else {
                                return {
                                    text: item.name_en,
                                    id: item.id,
                                }
                            }
                        })
                    };
                },
                cache: true
            }
        });

        // add new course mawhob
        $('body').on('click', '.add_new_course_student', function(e) {
            e.preventDefault();
            $('#modal_add_new_course_student').modal('show');
            var id = $(this).data('id');
            $('#form_add_new_course_student').find('#id').val(id);
        });

        // close add new course mawhob  modal by cancel
        $('body').on('click', '#cancel_add_new_course_student_btn', function(e) {
            e.preventDefault();
            $('#modal_add_new_course_student').modal('hide');
            $('#form_add_new_course_student')[0].reset();
            $("#student_id_select2").val('').trigger('change');
            $('#student_id').css('border-color', '');
            $('#student_id_error').text('');
        });

        // Close add new course mawhob modal By event
        $('#modal_add_new_course_student').on('hidden.bs.modal',
            function(e) {
                e.preventDefault();
                $('#modal_add_new_course_student').modal('hide');
                $('#form_add_new_course_student')[0].reset();
                $("#student_id_select2").val('').trigger('change');
                $('#student_id').css('border-color', '');
                $('#student_id_error').text('');
            });

        // enroll student
        $('#form_add_new_course_student').on('submit', function(e) {
            e.preventDefault();
            //////////////////////////////////////////////////////////////
            $('#student_id').css('border-color', '');
            $('#student_id_error').text('');
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
                        // refresh notifications
                        $('#notify_section').load("{!! route('admin.get.notifications') !!}");
                        $(".notifications_count").load(location.href +
                            " .notifications_count");

                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: 'enroll_new_student_button'
                            }
                        });
                        $('.enroll_new_student_button').click(function() {

                            $('#myTable').load(location.href + (' #myTable'));
                            $('#modal_add_new_course_student').modal('hide');
                            $('#form_add_new_course_student')[0].reset();
                            $("#student_id_select2").val('').trigger('change');
                            $('#student_id').css('border-color', '');
                            $('#student_id_error').text('');

                        });
                    } else {
                        // refresh notifications
                        $('#notify_section').load("{!! route('admin.get.notifications') !!}");
                        $(".notifications_count").load(location.href +
                            " .notifications_count");
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "error",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: 'enroll_new_student_button_faild'
                            }
                        });
                        $('.enroll_new_student_button_faild').click(function() {
                            $('#myTable').load(location.href + (' #myTable'));
                            $('#modal_add_new_course_student').modal('hide');
                            $('#form_add_new_course_student')[0].reset();
                            $("#student_id_select2").val('').trigger('change');
                            $('#student_id').css('border-color', '');
                            $('#student_id_error').text('');
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
