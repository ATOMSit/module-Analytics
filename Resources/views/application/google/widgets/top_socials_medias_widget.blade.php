<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Top des réseaux sociaux
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
                        <img src="{{asset("application/media/socials/$social.png")}}" alt="">
                    </div>
                    <div class="kt-widget4__info">
                        <a href="#" class="kt-widget4__title">
                            {{$top_social['name']}}
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