<!-- begin add student certification Modal -->
<div class="modal fade" id="modal_add_student_certification" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('courses.add_certification') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            <form action="{!! route('admin.student.certifications.store') !!}" method="POST" enctype="multipart/form-data"
                id="form_add_student_certification">
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
                                            course student id
                                        </label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input type="hidden" class="form-control" id="id" name="id">
                                        </div>
                                    </div>
                                    <!--end::Group-->

                                    <br />
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            {{ __('courses.file') }}
                                        </label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="custom-file">

                                                <input type="file" class="custom-file-input" class="add_file"
                                                    id="add_file" name="file">
                                                <label class="custom-file-label" choose="" file="">
                                                </label>
                                            </div>
                                            <span class="form-text text-muted">
                                                {{ __('general.certification_format_allow') }}
                                            </span>
                                            <span class="form-text text-danger" id="add_file_error"></span>
                                        </div>
                                    </div>
                                    <!--end::Group-->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="" id="cancel_add_student_certification_btn"
                        class="btn btn-light-primary font-weight-bold">
                        {{ __('general.cancel') }}
                    </button>

                    <button type="submit" id="save_add_student_certification_btn"
                        class="btn btn-primary font-weight-bold">
                        {{ __('general.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- enda dd student certification Modal -->

@push('js')
    <script type="text/javascript">
        // add student certification
        $('body').on('click', '.add_student_cetification', function(e) {
            e.preventDefault();
            $('#modal_add_student_certification').modal('show');
            var id = $(this).data('id');
            $('#form_add_student_certification').find('#id').val(id);
        });

        // close add nstudent certification modal by cancel
        $('body').on('click', '#cancel_add_student_certification_btn', function(e) {
            e.preventDefault();
            $('#modal_add_student_certification').modal('hide');
            $('#form_add_student_certification')[0].reset();
            $('.add_file').val('');
            $('#add_file').val('');
            $('#add_file').css('border-color', '');
            $('#add_file_error').text('');
        });


        // Close add student certification modal By event
        $('#modal_add_student_certification').on('hidden.bs.modal',
            function(e) {
                e.preventDefault();
                $('#modal_add_student_certification').modal('hide');
                $('#form_add_student_certification')[0].reset();
                $('.add_file').val('');
                $('#add_file').val('');
                $('#add_file').css('border-color', '');
                $('#add_file_error').text('');
            });



        // add student certification
        $('#form_add_student_certification').on('submit', function(e) {
            e.preventDefault();
            //////////////////////////////////////////////////////////////
            $('#add_file').css('border-color', '');
            $('#add_file_error').text('');
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
                                confirmButton: 'add_student_certification_button'
                            }
                        });
                        $('.add_student_certification_button').click(function() {
                            $('#myTable').load(location.href + (' #myTable'));
                            $('#modal_add_student_certification').modal('hide');
                            $('#form_add_student_certification')[0].reset();
                            $("#add_file").val('');
                            $('#add_file').css('border-color', '');
                            $('#add_file_error').text('');
                        });
                    }
                }, //end success

                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        $('#add_' + key + '_error').text(value[0]);
                        $('#add_' + key).css('border-color', '#F64E60');
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
