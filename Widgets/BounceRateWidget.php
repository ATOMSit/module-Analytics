<?php

namespace Modules\Analytics\Widgets;

use App\Plugin;
use Arrilot\Widgets\AbstractWidget;
use Carbon\Carbon;
use Spatie\Analytics\Period;
use Analytics;

class BounceRateWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [

    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $period = Period::create(Carbon::today()->subWeek(), Carbon::today());
        $bounce_rate = Analytics::performQuery(
            $period,
            'ga:sessions',
            [
                'metrics' => 'ga:bounces',
            ]
        );
        return view('analytics::application.google.widgets.bounce_rate_widget', [
            'bounce_rate' => $bounce_rate,
            'config' => $this->config,
        ]);
    }
}
