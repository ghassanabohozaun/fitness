@extends('layouts.admin')
@section('title')
@endsection
@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <!--begin::Actions-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{!! route('admin.notifications') !!}" class="text-muted">
                            {{ __('menu.notifications') }}
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
                                                            <th> {!! __('notifications.title_ar') !!}</th>
                                                            <th> {!! __('notifications.title_en') !!}</th>
                                                            <th> {!! __('notifications.details_ar') !!}</th>
                                                            <th> {!! __('notifications.details_en') !!}</th>
                                                            <th> {!! __('notifications.date') !!}</th>

                                                            <th class="text-center" style="width: 100px;">
                                                                {!! __('general.actions') !!}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($notifications as $notification)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $notification->title_ar }}</td>
                                                                <td>{{ $notification->title_en }}</td>
                                                                <td>{{ $notification->details_ar }}</td>
                                                                <td>{{ $notification->details_en }}</td>
                                                                <td>{{ $notification->created_at }}</td>
                                                                <td>
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-icon btn-pill  btn-sm mr-3  read_admin_notification_btn"
                                                                        data-id="{{ $notification->id }}"
                                                                        title="{{ __('general.show') }}">
                                                                        <i
                                                                            class="flaticon-bell {!! $notification->notify_class == 'read' ? 'text-info' : 'text-danger' !!}  icon-lg">
                                                                        </i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="7" class="text-center">
                                                                    {!! __('notifications.no_notifications_found') !!}
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="7">
                                                                <div class="float-right">
                                                                    {!! $notifications->appends(request()->all())->links() !!}
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
                            <!--end: DataTable-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->

    </div>
    <!--end::content-->
@endsection
@push('js')
    <script type="text/javascript">
        // read Notification
        $('body').on('click', '.read_admin_notification_btn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: "{!! route('admin.notification.make.read') !!}",
                type: "post",
                data: {
                    id,
                    id
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    $('#myTable').load(location.href + (' #myTable'));
                    $('#notify_section').load("{!! route('admin.get.notifications') !!}");
                    $(".notifications_count").load(location.href + " .notifications_count");
                }
            })
        });
    </script>
@endpush
