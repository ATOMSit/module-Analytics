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
                        'Nouveaux visiteurs',
                        'Visiteur de retour'
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
                Type d'utilisateur
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget4">
            <canvas id="userType_chart"></canvas>
        </div>
    </div>
</div>