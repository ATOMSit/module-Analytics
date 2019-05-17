<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                @lang('analytics::google_translation.widgets.top_browsers.views.title')
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget4">
            @foreach($top_browers as $top_brower)
                <div class="kt-widget4__item">
                    <div class="kt-widget4__pic kt-widget4__pic--logo">
                        @php
                            $brower = strtolower($top_brower['browser']);
                        @endphp
                        @if($brower === 'others')
                            <img src="{{asset("application/media/browers/$brower.png")}}" alt="">
                        @else
                            <img src="{{asset("application/media/browers/$brower.png")}}" alt="">
                        @endif
                    </div>
                    <div class="kt-widget4__info">
                        <a href="#" class="kt-widget4__title">
                            @if($brower === 'others')
                                @lang('analytics::google_translation.widgets.top_browsers.views.others')
                            @else
                                {{$top_brower['browser']}}
                            @endif
                        </a>
                    </div>
                    <span class="kt-widget4__number kt-font-brand">
                {{$top_brower['sessions']}}
            </span>
                </div>
            @endforeach
        </div>
    </div>
</div>