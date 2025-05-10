@extends('layouts.admin')
@section('content')
    <style>
        .card_name_span {
            font-size: 18px
        }
    </style>

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                <!--begin::Page Title-->
                <span class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    {{ __('menu.dashboard') }}
                </span>
                <!--end::Page Title-->

                <!--begin::Actions-->

            </div>
            <!--end::Info-->

        </div>
    </div>
    <!--end::Subheader-->



    <!--begin::content-->
    <div class="d-flex flex-column-fluid" style="margin-bottom: 5px">


        <!--begin::Container-->
        <div class=" container-fluid ">

            <!--begin::Counters-->
            {{-- <div class="row">

                <!------------------------- start courses count ---------->
                <div class="col-xl-2">
                    <!--begin::Stats Widget 32-->
                    <div class="card card-custom bg-danger-o-50 card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">

                            <!--begin::Svg Icon-->
                            <span>
                                <span
                                    class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                        version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5" />
                                            <rect fill="#000000" opacity="0.3"
                                                transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) "
                                                x="3" y="3" width="18" height="7" rx="1" />
                                            <path
                                                d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                            </span>
                            <!--end::Svg Icon-->

                            <span class="card-title font-weight-bolder font-size-h2 mb-0 mt-6 text-hover-primary d-block">
                                {{ App\Models\Course::withoutTrashed()->count() }}
                            </span>
                            <span class="font-weight-bold card_name_span">
                                {{ __('dashboard.courses_counter') }}
                            </span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 32-->
                </div>
                <!------------------------- end courses count ----------->

                <!------------------------- start students count ---------->
                <div class="col-xl-2">
                    <!--begin::Stats Widget 32-->
                    <div class="card card-custom bg-info-o-50 card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">

                            <!--begin::Svg Icon-->
                            <span>
                                <span
                                    class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                        version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5" />
                                            <rect fill="#000000" opacity="0.3"
                                                transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) "
                                                x="3" y="3" width="18" height="7" rx="1" />
                                            <path
                                                d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                            </span>
                            <!--end::Svg Icon-->

                            <span class="card-title font-weight-bolder font-size-h2 mb-0 mt-6 text-hover-primary d-block">

                            </span>
                            <span class="font-weight-bold card_name_span">
                                {{ __('dashboard.students_counter') }}
                            </span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 32-->
                </div>
                <!------------------------- end students count ----------->

                <!------------------------- start articles count ---------->
                <div class="col-xl-2">
                    <!--begin::Stats Widget 32-->
                    <div class="card card-custom bg-warning-o-50 card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">

                            <!--begin::Svg Icon-->
                            <span>
                                <span
                                    class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                        version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5" />
                                            <rect fill="#000000" opacity="0.3"
                                                transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) "
                                                x="3" y="3" width="18" height="7" rx="1" />
                                            <path
                                                d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                            </span>
                            <!--end::Svg Icon-->

                            <span class="card-title font-weight-bolder font-size-h2 mb-0 mt-6 text-hover-primary d-block">
                                {{ App\Models\Article::withoutTrashed()->count() }}
                            </span>
                            <span class="font-weight-bold card_name_span">
                                {{ __('dashboard.article_counter') }}
                            </span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 32-->
                </div>
                <!------------------------- end article count ----------->

                <!------------------------- start testimonials count ---------->
                <div class="col-xl-2">
                    <!--begin::Stats Widget 32-->
                    <div class="card card-custom bg-primary-o-50 card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">

                            <!--begin::Svg Icon-->
                            <span>
                                <span
                                    class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5"
                                                r="1.5" />
                                            <rect fill="#000000" opacity="0.3"
                                                transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) "
                                                x="3" y="3" width="18" height="7" rx="1" />
                                            <path
                                                d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                            </span>
                            <!--end::Svg Icon-->

                            <span class="card-title font-weight-bolder font-size-h2 mb-0 mt-6 text-hover-primary d-block">
                                {{ App\Models\Testimonial::withoutTrashed()->count() }}
                            </span>
                            <span class="font-weight-bold card_name_span">
                                {{ __('dashboard.testimonials_counter') }}
                            </span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 32-->
                </div>
                <!------------------------- end testimonials count ----------->

                <!------------------------- start videos count ---------->
                <div class="col-xl-2">
                    <!--begin::Stats Widget 32-->
                    <div class="card card-custom bg-dark-o-50 card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">

                            <!--begin::Svg Icon-->
                            <span>
                                <span
                                    class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5"
                                                r="1.5" />
                                            <rect fill="#000000" opacity="0.3"
                                                transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) "
                                                x="3" y="3" width="18" height="7" rx="1" />
                                            <path
                                                d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                            </span>
                            <!--end::Svg Icon-->

                            <span class="card-title font-weight-bolder font-size-h2 mb-0 mt-6 text-hover-primary d-block">
                                {{ App\Models\Video::withoutTrashed()->count() }}
                            </span>
                            <span class="font-weight-bold card_name_span">
                                {{ __('dashboard.videos_counter') }}
                            </span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 32-->
                </div>
                <!------------------------- end videos count ----------->

                <!------------------------- start albums count ---------->
                <div class="col-xl-2">
                    <!--begin::Stats Widget 32-->
                    <div class="card card-custom bg-success-o-50 card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">

                            <!--begin::Svg Icon-->
                            <span>
                                <span
                                    class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5"
                                                r="1.5" />
                                            <rect fill="#000000" opacity="0.3"
                                                transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) "
                                                x="3" y="3" width="18" height="7" rx="1" />
                                            <path
                                                d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                            </span>
                            <!--end::Svg Icon-->

                            <span class="card-title font-weight-bolder font-size-h2 mb-0 mt-6 text-hover-primary d-block">
                                {{ App\Models\PhotoAlbum::withoutTrashed()->count() }}
                            </span>
                            <span class="font-weight-bold card_name_span">
                                {{ __('dashboard.albums_counter') }}
                            </span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 32-->
                </div>
                <!------------------------- end albums count ----------->

            </div> --}}
            <!--end::Counters-->

            <!--begin::chart-->
            {{-- <div class="card card-custom gutter-b">

                <div class="card-body py-2" style="">
                    <div class="container-fluid">
                        <div class="row">

                            <!--begin::students enroll chart-->
                            <div class="col-lg-6">
                                <div class="col-12">
                                    <div style="width: 100% ; margin: auto">
                                        <canvas id="barChart" width="1100" height="600"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!--end::students enroll chart-->

                            <!--begin::article charts -->
                            <div class="col-lg-6">
                                <div class="col-12">
                                    <div style="width: 100% ; margin: auto">
                                        <canvas id="barChart2" width="1100" height="600"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!--end::article chart-->

                        </div>
                    </div>
                </div>

                <!--end::Body-->
            </div> --}}
            <!--end::chart-->


            <!--begin::Last articles and courses-->
            <div class="card card-custom gutter-b ">

                <!--begin::Body-->
                {{-- <div class="card-body py-2" style="">
                    <div class="container-fluid">
                        <div class="row">
                            <!--begin::courses-->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label font-weight-bolder text-dark">
                                            {{ __('dashboard.latest_courses') }}
                                        </span>
                                    </h3>
                                </div>
                                <!--end::Header-->

                                @if ($latest_courses->isEmpty())
                                    <img src="{!! asset('adminBoard/images/noRecordFound.svg') !!}" class="img-fluid" id="no_data_img">
                                @else
                                    <!--begin::Body-->
                                    <div class="table-responsive ">
                                        <table class="table" style="text-align: center;vertical-align: middle;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{!! __('courses.photo') !!}</th>
                                                    <th scope="col">{!! __('courses.title_ar') !!}</th>
                                                    <th scope="col">{!! __('courses.title_en') !!}</th>
                                                    <th scope="col">{!! __('courses.hours') !!}</th>
                                                    <th scope="col">{!! __('courses.start_at') !!}</th>
                                                    <th scope="col">{!! __('courses.end_at') !!}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($latest_courses as $key => $course)
                                                    <tr>
                                                        <td>{!! $loop->iteration !!}</td>
                                                        <td>
                                                            @if ($course->photo)
                                                                <img src="{{ asset('adminBoard/uploadedImages/courses/' . $course->photo) }}"
                                                                    class="img-fluid img-thumbnail table-image " />
                                                            @else
                                                                <img src="{{ asset('adminBoard/images/images-empty.png/') }}"
                                                                    class="img-fluid img-thumbnail table-image " />
                                                            @endif
                                                        </td>
                                                        <td>{!! $course->title_ar !!} </td>
                                                        <td>{!! $course->title_en !!}</td>
                                                        <td>{!! $course->hours !!}</td>
                                                        <td>{!! $course->start_at !!}</td>
                                                        <td>{!! $course->end_at !!}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                <!--end::Body-->
                            </div>
                            <!--end::courses-->


                            <!--begin::articles-->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label font-weight-bolder text-dark">
                                            {{ __('dashboard.latest_articles') }}
                                        </span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                @if ($latest_articles->isEmpty())
                                    <img src="{!! asset('adminBoard/images/noRecordFound.svg') !!}" class="img-fluid" id="no_data_img">
                                @else
                                    <div class="table-responsive ">
                                        <table class="table" style="text-align: center;vertical-align: middle;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{!! __('articles.photo') !!}</th>
                                                    <th scope="col">{!! __('articles.title_ar') !!}</th>
                                                    <th scope="col">{!! __('articles.title_en') !!}</th>
                                                    <th scope="col">{!! __('index.views_count') !!}</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($latest_articles as $key => $article)
                                                    <tr>
                                                        <td>{!! $key + 1 !!}</td>
                                                        <td>
                                                            @if ($article->photo)
                                                                <img src="{{ asset('adminBoard/uploadedImages/articles/' . $article->photo) }}"
                                                                    class="img-fluid img-thumbnail table-image " />
                                                            @else
                                                                <img src="{{ asset('adminBoard/images/images-empty.png/') }}"
                                                                    class="img-fluid img-thumbnail table-image " />
                                                            @endif
                                                        </td>
                                                        <td>{!! $article->title_ar !!}</td>
                                                        <td>{!! $article->title_en !!}</td>
                                                        <td>{!! $article->views !!}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                            <!--end::articles-->



                        </div>
                    </div>
                </div> --}}
                <!--end::Body-->

            </div>
            <!--end::Last articles and courses-->

        </div>
        <!--end::Container-->

    </div>
    <!--end::content-->
@endsection


@push('js')
    <script type="text/javascript" src="{!! asset('adminBoard/assets/js/Chart.bundle.min.js') !!}"></script>
    <script type="text/javascript">
        $(function() {
            var datas = <?php echo json_encode($revenueData); ?>;
            var barCanvas = $("#barChart");
            var barChart = new Chart(barCanvas, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                    datasets: [{
                        label: '{!! trans('dashboard.chart_revenues') !!}',
                        data: datas,
                        backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'violet',
                            'purple', 'pink', 'indigo', 'silver', 'gold', 'brown'
                        ]
                    }]
                },
                options: {
                    scales: {
                        yAxis: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            })
        });


        $(function() {
            var articleData = <?php echo json_encode($articleData); ?>;
            var barCanvas = $("#barChart2");
            var barChart = new Chart(barCanvas, {
                type: 'line', //bar
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                    datasets: [{
                        label: '{!! __('dashboard.chart_article') !!}',
                        data: articleData,
                        backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'violet',
                            'purple', 'pink', 'indigo', 'silver', 'gold', 'brown'
                        ]
                    }]
                },
                options: {
                    scales: {
                        yAxis: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            })
        });
    </script>
@endpush
