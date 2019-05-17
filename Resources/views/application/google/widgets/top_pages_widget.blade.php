<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Bordered Table
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-section">
            <div class="kt-section__content">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            Page
                        </th>
                        <th>
                            Visiteurs
                        </th>
                        <th>
                            Nouveaux visiteurs
                        </th>
                        <th>
                            Temps moyen sur la page
                        </th>
                        <th>
                            Taux de rebond
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($top_pages as $page)
                        <tr>
                            <th scope="row">
                                <a href="{{url($page[1])}}">{{$page[0]}}</a>
                            </th>
                            <td>
                                {{$page[5]}}
                            </td>
                            <td>
                                {{$page[2]}}
                            </td>
                            <td>
                                {{$page[4]}}
                            </td>
                            <td>
                                {{$page[3]}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>