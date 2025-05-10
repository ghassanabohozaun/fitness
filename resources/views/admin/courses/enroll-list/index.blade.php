@extends('layouts.admin')
@section('title')
@endsection
@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                    <li class="breadcrumb-item">
                        <a href="{!! route('admin.courses') !!}" class="text-muted">
                            {{ __('menu.courses') }}
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);" class="text-muted">
                            {{ __('courses.enrolled_list') }}
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);" class="text-muted"> {!! $course->{'title_' . Lang()} !!}</a>
                    </li>
                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <a href="#" class="btn btn-primary btn-sm font-weight-bold font-size-base mr-1 add_new_course_student"
                    id='add_new_course_student' data-id="{!! $course->id !!}">
                    <i class="fa fa-plus-square"></i>
                    {{ __('courses.enroll_student') }}
                </a>
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
                                                            <th>{!! __('courses.student_name') !!}</th>
                                                            <th>{!! __('courses.email') !!}</th>
                                                            <th>{!! __('courses.mobile') !!}</th>
                                                            <th>{!! __('courses.enrolled_date') !!}</th>
                                                            <th>{!! __('courses.has_certitfication') !!}</th>
                                                            <th>{!! __('courses.enroll_agreement') !!}</th>
                                                            <th class="text-center" style="width: 100px;">
                                                                {!! __('general.actions') !!}
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($courseStudents as $courseStudent)
                                                            <tr>
                                                                <td>{!! $loop->iteration !!}</td>
                                                                <td>{{ $courseStudent->{'name_' . Lang()} }} </td>
                                                                <td>{{ $courseStudent->email }}</td>
                                                                <td>{{ $courseStudent->mobile }}</td>
                                                                <td>{{ $courseStudent->pivot->enrolled_date }} </td>
                                                                <td>@include('admin.courses.enroll-list.parts.certification')</td>
                                                                <td>
                                                                    <div class="cst-switch switch-sm">
                                                                        <input type="checkbox" id="enroll_agreement_status"
                                                                            {{ $courseStudent->pivot->enroll_agreement == 'on' ? 'checked' : '' }}
                                                                            data-id="{{ $courseStudent->pivot->id }}"
                                                                            class="enroll_agreement_status">
                                                                    </div>

                                                                </td>

                                                                <td> @include('admin.courses.enroll-list.parts.options')</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="8" class="text-center">
                                                                    {!! __('courses.no_students_found') !!}
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="8">
                                                                <div class="float-right">
                                                                    {!! $courseStudents->appends(request()->all())->links() !!}
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

                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>

    @include('admin.courses.enroll-list.modals.add-new-student')
    @include ('admin.courses.enroll-list.modals.add-student-certification')
    @include ('admin.courses.enroll-list.modals.update-student-certification')

    <!--end::content-->
@endsection
@push('js')
    <script type="text/javascript">
        ///  change enroll agreement status
        var enrollAgreementStatusSwitch = false;
        $(document).on('click', '.enroll_agreement_status', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            if ($(this).is(':checked')) {
                enrollAgreementStatusSwitch = $(this).is(':checked');
                var messageText = "{{ __('courses.do_you_want_to_enroll_agreement') }}";
                var iconValue = "warning";
            } else {
                enrollAgreementStatusSwitch = false;
                var messageText = "{{ __('courses.do_you_want_to_cancel_enroll_agreement') }}";
                var iconValue = "error";
            }

            Swal.fire({
                title: messageText,
                icon: iconValue,
                showCancelButton: true,
                confirmButtonText: "{{ __('general.yes') }}",
                cancelButtonText: "{{ __('general.no') }}",
                reverseButtons: false,
                allowOutsideClick: false,
            }).then(function(result) {
                if (result.value) {

                    $.ajax({
                        url: '{!! route('admin.course.enroll.agreement.status') !!}',
                        data: {
                            enrollAgreementStatusSwitch: enrollAgreementStatusSwitch,
                            id: id
                        },
                        type: 'post',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            if (data.status == true) {
                                Swal.fire({
                                    title: "{!! __('courses.enroll_agreement') !!}",
                                    text: data.msg,
                                    icon: "success",
                                    allowOutsideClick: false,
                                    customClass: {
                                        confirmButton: 'enroll_agreement_button'
                                    }
                                });
                                $('.enroll_agreement_button').click(function() {
                                    $('#myTable').load(location.href + (' #myTable'));
                                });
                            } else if (data.status == false) {
                                Swal.fire({
                                    title: "{!! __('courses.cancel_enroll_agreement') !!}",
                                    text: data.msg,
                                    icon: "warning",
                                    allowOutsideClick: false,
                                    customClass: {
                                        confirmButton: 'cancel_enroll_agreement_button'
                                    }
                                });
                                $('.cancel_enroll_agreement_button').click(function() {
                                    $('#myTable').load(location.href + (' #myTable'));
                                });
                            }
                        }, //end success
                    });

                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        title: "{!! __('general.cancelled') !!}",
                        text: "{!! __('general.cancelled_message') !!}",
                        icon: "error",
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: 'cancel_enroll_agreement_button'
                        }
                    })
                }
            });

        })


        //delete enrolled student
        $(document).on('click', '.delete_enrolled_student', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: "{{ __('general.ask_delete_record') }}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "{{ __('general.yes') }}",
                cancelButtonText: "{{ __('general.no') }}",
                reverseButtons: false,
                allowOutsideClick: false,
            }).then(function(result) {
                if (result.value) {
                    //////////////////////////////////////
                    // delete enrolled student
                    $.ajax({
                        url: '{!! route('admin.course.enroll.student.delete') !!}',
                        data: {
                            id,
                            id
                        },
                        type: 'post',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            if (data.status == true) {
                                Swal.fire({
                                    title: "{!! __('general.deleted') !!}",
                                    text: data.msg,
                                    icon: "success",
                                    allowOutsideClick: false,
                                    customClass: {
                                        confirmButton: 'delete_enrolled_student_button'
                                    }
                                });
                                $('.delete_enrolled_student_button').click(function() {
                                    $('#myTable').load(location.href + (' #myTable'));
                                });
                            }
                        }, //end success
                    });

                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        title: "{!! __('general.cancelled') !!}",
                        text: "{!! __('general.cancelled_message') !!}",
                        icon: "error",
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: 'cancel_delete_enrolled_student_button'
                        }
                    })
                }
            });

        })
    </script>
@endpush
