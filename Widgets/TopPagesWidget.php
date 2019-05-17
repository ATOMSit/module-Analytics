<?php

namespace Modules\Analytics\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\Analytics\Period;
use Analytics;

class TopPagesWidget extends AbstractWidget
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
        $results = Analytics::performQuery(
            $period,
            'ga:users,ga:bounceRate,ga:avgTimeOnPage,ga:newUsers',
            [
                'dimensions' => 'ga:pageTitle,ga:pagePath',
                'sort' => '-ga:users',
                'max-results' => 10
            ]
        );

        return view('analytics::application.google.widgets.top_pages_widget', [
            'top_pages' => $results['rows'],
            'config' => $this->config,
        ]);
    }
}
