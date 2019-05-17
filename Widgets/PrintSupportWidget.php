<?php

namespace Modules\Analytics\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Carbon\Carbon;
use Analytics;
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
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $period = Period::create(Carbon::today()->subWeek(), Carbon::today());
        $response = Analytics::performQuery(
            $period,
            'ga:sessions', [
                'dimensions' => 'ga:deviceCategory'
            ]
        );
        $devices = ['desktop' => "0", 'mobile' => "0", 'tablet' => "0"];
        foreach ($response as $item) {
            $devices[$item[0]] = $item[1];
        }
        return view('analytics::application.google.widgets.print_support_widget', [
            'devices' => $devices,
            'config' => $this->config,
        ]);
    }
}
