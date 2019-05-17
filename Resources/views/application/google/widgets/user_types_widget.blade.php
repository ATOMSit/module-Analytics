@push('scripts')
    <script type="text/javascript">
        window.addEventListener("load", function () {
            var userType = @json($userType);
            var config = {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            userType['new_visitor'],
                            userType['returning_visitor'],
                        ],
                        backgroundColor: [
                            "#50b431",
                            "#058DC7"
                        ],
                        label: 'Dataset'
                    }],
                    labels: [
                        "@lang('analytics::google_translation.widgets.user_types.views.new_visitor')",
                        "@lang('analytics::google_translation.widgets.user_types.views.returning_visitor')"
                    ]
                },
                options: {
                    responsive: true
                }
            };
            var userType_chart = document.getElementById('userType_chart').getContext('2d');
            window.myPies = new Chart(userType_chart, config);
        }, false);
    </script>
@endpush

<div class="kt-portlet kt-portlet--bordered-semi kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                @lang('analytics::google_translation.widgets.user_types.views.title')
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget4">
            <canvas id="userType_chart"></canvas>
        </div>
    </div>
</div>