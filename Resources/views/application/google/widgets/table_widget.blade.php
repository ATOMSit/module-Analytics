<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                @lang("analytics::google_translation.widgets.$widget.views.title")
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget4">
            @foreach($datas as $data)
                <div class="kt-widget4__item">
                    <div class="kt-widget4__pic kt-widget4__pic--logo">


                        @php
                            $type = strtolower($data['type']);
                        @endphp
                        @if($type === 'country')
                            @php
                                $name = strtolower($data['iso'])
                            @endphp
                            @if($name == null)
                                <img src="{{asset("application/media/browers/others.png")}}" alt="">
                            @else
                                <span class="flag-icon flag-icon-{{$name}}" style="font-size: 25px"></span>
                            @endif
                        @elseif($type === 'browser')
                            @php
                                $name = strtolower($top_brower['browser']);
                            @endphp
                            @if($name === 'others')
                                <img src="{{asset("application/media/browers/$name.png")}}" alt="">
                            @else
                                <img src="{{asset("application/media/browers/$name.png")}}" alt="">
                            @endif
                        @endif


                    </div>


                    <div class="kt-widget4__info">
                        <a href="#" class="kt-widget4__title">
                            @if($name === 'others')
                                @lang('analytics::google_translation.widgets.top_browsers.views.others')
                            @else
                                {{$data['name']}}
                            @endif
                        </a>
                    </div>
                    <span class="kt-widget4__number kt-font-brand">
                        {{$data['sessions']}}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
</div>