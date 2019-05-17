<div class="kt-portlet kt-portlet--bordered-semi kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Navigateurs internet favoris
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget4">
            @foreach($top_referrers as $top_referrer)
                <div class="kt-widget4__item">
                    <div class="kt-widget4__pic kt-widget4__pic--logo">
                        @php
                            $brower = $top_referrer['url']
                        @endphp
                        <img src="{{asset("application/media/browers/$brower.png")}}" alt="">
                    </div>
                    <div class="kt-widget4__info">
                        <a href="#" class="kt-widget4__title">
                            {{$top_referrer['url']}}
                        </a>
                    </div>
                    <span class="kt-widget4__number kt-font-brand">
                {{$top_referrer['pageViews']}}
            </span>
                </div>
            @endforeach
        </div>
    </div>
</div>