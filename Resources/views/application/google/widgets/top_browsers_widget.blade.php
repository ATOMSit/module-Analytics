<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Top des navigateurs WEB
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget4">
            @foreach($top_browers as $top_brower)
                <div class="kt-widget4__item">
                    <div class="kt-widget4__pic kt-widget4__pic--logo">
                        @php
                            $brower = $top_brower['browser']
                        @endphp
                        <img src="{{asset("application/media/browers/$brower.png")}}" alt="">
                    </div>
                    <div class="kt-widget4__info">
                        <a href="#" class="kt-widget4__title">
                            {{$top_brower['browser']}}
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