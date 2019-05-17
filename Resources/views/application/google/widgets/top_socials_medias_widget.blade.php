<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                @lang('analytics::google_translation.widgets.top_socials_medias.views.title')
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget4">
            @foreach($top_socials as $top_social)
                <div class="kt-widget4__item">
                    <div class="kt-widget4__pic kt-widget4__pic--logo">
                        @php
                            $social = strtolower($top_social['name']);
                        @endphp
                        @if($social === 'others')
                            <img src="{{asset("application/media/browers/$social.png")}}" alt="">
                        @else
                            <img src="{{asset("application/media/socials/$social.png")}}" alt="">
                        @endif
                    </div>
                    <div class="kt-widget4__info">
                        <a href="#" class="kt-widget4__title">
                            @if($social === 'others')
                                @lang('analytics::google_translation.widgets.top_socials_medias.views.others')
                            @else
                                {{$top_social['name']}}
                            @endif
                        </a>
                    </div>
                    <span class="kt-widget4__number kt-font-brand">
                        {{$top_social['sessions']}}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
</div>