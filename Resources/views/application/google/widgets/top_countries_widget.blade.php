<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Origine de vos visiteurs
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
                        <span class="flag-icon flag-icon-{{$iso}}" style="font-size: 25px"></span>
                    </div>
                    <div class="kt-widget4__info">
                        <a href="#" class="kt-widget4__title">
                            {{$top_country['name']}}
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