@if ($notifications->isEmpty())
    <img src="{!! asset('site/images/noRecordFound.svg') !!}" class="img-fluid" id="no_data_img" title="{!! __('site.no_date') !!}">
@else
    @foreach ($notifications as $notification)
        <!--begin: Item-->
        <div class="d-flex align-items-center rounded p-5 mb-5
        {!! $notification->notify_class == 'unread' ? ' bg-light-info' : ' bg-light-primary' !!}  ">
            <span class="svg-icon svg-icon-warning mr-5">
                <span class="svg-icon svg-icon-lg">
                    <i class="flaticon-bell {!! $notification->notify_class == 'unread' ? 'text-danger' : 'text-info' !!}  icon-lg"></i>
                </span>
            </span>

            <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#" data-id="{!! $notification->id !!}"
                    class="font-weight-normal text-dark-75 text-bold font-size-h5-sm mb-1 show_notification_btn">
                    {!! $notification->{'title_' . Lang()} !!}
                    <span class=" text-warning font-size-sm font-weight-bold">{!! $notification->created_at !!}</span>
                </a>
            </div>

        </div>
        <!--end: Item-->
    @endforeach
@endif
