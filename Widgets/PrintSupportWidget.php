<?php

namespace Modules\Analytics\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Carbon\Carbon;
use Analytics;
use Illuminate\Support\Collection;
use Spatie\Analytics\Period;

class PrintSupportWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [

    ];

    /**
     * Returns the list of display devices.
     *
     * @param Period $period
     * @return Collection
     */
    protected function deviceCategory(Period $period): Collection
    {
        $response = Analytics::performQuery(
            $period,
            'ga:sessions', [
                'dimensions' => 'ga:deviceCategory'
            ]
        );
        $devices = ['desktop' => 0, 'mobile' => 0, 'tablet' => 0];
        foreach ($response as $item) {
            $devices[$item[0]] = $item[1];
        }
        $final = array($devices['desktop'], $devices['mobile'], $devices['tablet']);
        return Collection::make($final);
    }

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $period = Period::create(Carbon::today()->subWeek(), Carbon::today());
        $results = $this->deviceCategory($period);

        $labels = [trans('analytics::google_translation.widgets.print_support.views.desktop'), trans('analytics::google_translation.widgets.print_support.views.mobile'), trans('analytics::google_translation.widgets.print_support.views.tablet')];
        $colors = ['#0099CC', '#feff00', '#6a151e'];
        return view('analytics::application.google.widgets.chart_pie', [
            'widget' => (string)'print_support',
            'id' => (int)random_int(100, 999),
            'datas' => $results,
            'labels' => $labels,
            'colors' => $colors,
            'config' => $this->config,
        ]);
    }
}
