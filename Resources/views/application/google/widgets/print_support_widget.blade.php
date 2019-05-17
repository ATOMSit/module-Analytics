@push('scripts')
    <script type="text/javascript">
        window.addEventListener("load", function () {
            var devices = @json($devices);
            var config = {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            devices['desktop'],
                            devices['mobile'],
                            devices['tablet'],
                        ],
                        backgroundColor: [
                            "#5dade2",
                            "#FEEF29",
                            "#6C033A"
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        "@lang('analytics::google_translation.widgets.print_support.views.desktop')",
                        "@lang('analytics::google_translation.widgets.print_support.views.mobile')",
                        "@lang('analytics::google_translation.widgets.print_support.views.tablet')"
                    ]
                },
                options: {
                    responsive: true
                }
            };
            var devices_chart = document.getElementById('devices_chart').getContext('2d');
            window.myPied = new Chart(devices_chart, config);
        }, false);
    </script>
@endpush

<div class="kt-portlet kt-portlet--bordered-semi kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                @lang('analytics::google_translation.widgets.print_support.views.title')
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget4">
            <canvas id="devices_chart"></canvas>
        </div>
    </div>
</div>