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
     * Returns the most viewed pages with important information
     *
     * @param Period $period
     * @param int $maxResults
     * @return mixed
     */
    protected function topPagesWithInformations(Period $period, int $maxResults = 10)
    {
        $response = Analytics::performQuery(
            $period,
            'ga:users,ga:bounceRate,ga:avgTimeOnPage,ga:newUsers',
            [
                'dimensions' => 'ga:pageTitle,ga:pagePath',
                'sort' => '-ga:users',
                'max-results' => $maxResults
            ]
        );
        return $response['rows'];
    }

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $period = Period::create(Carbon::today()->subWeek(), Carbon::today());
        $result = $this->topPagesWithInformations($period, 10);
        return view('analytics::application.google.widgets.top_pages_widget', [
            'top_pages' => $result,
            'config' => $this->config,
        ]);
    }
}
