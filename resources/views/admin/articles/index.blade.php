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
                        <a href="#" class="text-muted">
                            {{ __('menu.articles') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">
                            {{ __('menu.show_all') }}
                        </a>
                    </li>
                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <a href="{!! route('admin.articles.trashed') !!}" class="btn btn-light-danger trash_btn" title="{{ __('general.trash') }}">
                    <i class="fa fa-trash"></i>
                </a>
                &nbsp;

                <a href="{{ route('admin.articles.create') }}"
                    class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{ __('menu.add_new_article') }}
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
                                                            <th>{{ __('articles.photo') }}</th>
                                                            <th>{{ __('articles.title_en') }}</th>
                                                            @if (setting()->site_lang_ar == 'on')
                                                                <th>{{ __('articles.title_ar') }}</th>
                                                            @endif
                                                            <th>{{ __('articles.publisher_name') }}</th>
                                                            <th>{{ __('articles.publish_date') }}</th>
                                                            <th>{{ __('articles.status') }}</th>
                                                            <th class="text-center" style="width: 150px;">
                                                                {{ __('general.actions') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($articles as $article)
                                                            <tr>
                                                                <td>{!! $loop->iteration !!}</td>
                                                                <td>@include('admin.articles.parts.photo')</td>
                                                                <td>{{ $article->title_en }}</td>
                                                                @if (setting()->site_lang_ar == 'on')
                                                                    <td>{{ $article->title_ar }}</td>
                                                                @endif
                                                                <td>{{ $article->publisher_name }}</td>
                                                                <td>{{ $article->publish_date }}</td>
                                                                <td>@include('admin.articles.parts.status')</td>
                                                                <td>@include('admin.articles.parts.options')</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="8" class="text-center">
                                                                    {{ __('articles.no_articles_found') }}
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="8">
                                                                <div class="float-right">
                                                                    {!! $articles->appends(request()->all())->links() !!}
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

                        <form class="d-none" id="form_article_delete">
                            <input type="hidden" id="article_delete_id">
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
@endsection
@push('js')
    <script type="text/javascript">
        /////////////////////////////////////////////////////////////////
        ///  article Delete
        $(document).on('click', '.delete_article_btn', function(e) {
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
                    // Delete User
                    $.ajax({
                        url: '{!! route('admin.articles.destroy') !!}',
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
                                        confirmButton: 'delete_article_button'
                                    }
                                });
                                $('.delete_article_button').click(function() {
                                    $('#myTable').load(location.href + (' #myTable'));
                                });
                            } else if (data.status == false) {
                                Swal.fire({
                                    title: "{!! __('general.deleted') !!}",
                                    text: data.msg,
                                    icon: "warning",
                                    allowOutsideClick: false,
                                    customClass: {
                                        confirmButton: 'delete_article_button'
                                    }
                                });
                                $('.delete_article_button').click(function() {});
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
                            confirmButton: 'cancel_delete_article_button'
                        }
                    })
                }
            });

        })


        /////////////////////////////////////////////////////////////////
        // switch status
        var switchStatus = false;
        $('body').on('change', '.change_status', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            if ($(this).is(':checked')) {
                switchStatus = $(this).is(':checked');
            } else {
                switchStatus = $(this).is(':checked');
            }

            $.ajax({
                url: "{{ route('admin.articles.change.status') }}",
                data: {
                    switchStatus: switchStatus,
                    id: id
                },
                type: 'post',
                dataType: 'JSON',
                beforeSend: function() {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{ __('general.please_wait') }}",
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
                                confirmButton: 'switch_status_toggle'
                            }
                        });
                        $('.switch_status_toggle').click(function() {
                            $('#myTable').load(location.href + (' #myTable'));
                        });
                    }
                }, //end success
            })
        });
    </script>
@endpush
