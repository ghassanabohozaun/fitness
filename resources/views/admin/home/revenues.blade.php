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
                                                            <th> {!! __('revenues.student_id') !!}</th>
                                                            <th> {!! __('revenues.details') !!}</th>
                                                            <th> {!! __('revenues.revenue_for') !!}</th>
                                                            <th> {!! __('revenues.value') !!}</th>
                                                            <th> {!! __('revenues.payment_id') !!}</th>
                                                            <th> {!! __('revenues.payment_method') !!}</th>
                                                            <th> {!! __('revenues.date') !!}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($revenues as $revenue)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $revenue->student->{'name_' . Lang()} }}</td>
                                                                <td>{{ $revenue->details }}</td>
                                                                <td>{{ App\Models\Course::find($revenue->revenue_for)->{'title_' . Lang()} }}
                                                                </td>
                                                                <td>{{ $revenue->value }}</td>
                                                                <td>{{ $revenue->payment_id }}</td>
                                                                <td>{{ $revenue->payment_method }}</td>

                                                                <td>{{ $revenue->created_at }}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="8" class="text-center">
                                                                    {!! __('revenues.no_revenues_found') !!}
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="8">
                                                                <div class="float-right">
                                                                    {!! $revenues->appends(request()->all())->links() !!}
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

        <!--begin::Form-->
    </div>
    <!--end::content-->
@endsection
@push('js')
    <script type="text/javascript"></script>
@endpush
