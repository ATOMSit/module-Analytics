<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                @lang('analytics::google_translation.widgets.top_countries.views.title')
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget4">
            @foreach($top_countries as $top_country)
                <div class="kt-widget4__item">
                    <div class="kt-widget4__pic kt-widget4__pic--logo">
                        @php
                            $iso = strtolower($top_country['iso']);
                        @endphp
                        @if($iso == null)
                            <img src="{{asset("application/media/browers/others.png")}}" alt="">
                        @else
                            <span class="flag-icon flag-icon-{{$iso}}" style="font-size: 25px"></span>
                        @endif
                    </div>
                    <div class="kt-widget4__info">
                        <a href="#" class="kt-widget4__title">
                            @if($iso == null)
                                @lang('analytics::google_translation.widgets.top_countries.views.others')
                            @else
                                {{$top_country['name']}}
                            @endif
                        </a>
                    </div>
                    <span class="kt-widget4__number kt-font-brand">
                        {{$top_country['sessions']}}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
</div>