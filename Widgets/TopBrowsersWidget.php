<?php

namespace Modules\Analytics\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\Analytics\Period;
use Analytics;

class TopBrowsersWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [

    ];

    /**
     * Returns the list of countries of origin of visitors
     *
     * @param Period $period
     * @param int $maxResults
     * @return Collection
     */
    protected function fetchTopBrowsers(Period $period, int $maxResults = 10): Collection
    {
        $response = Analytics::performQuery(
            $period,
            'ga:sessions',
            [
                'dimensions' => 'ga:browser',
                'sort' => '-ga:sessions',
            ]
        );
        $topBrowsers = collect($response['rows'] ?? [])->map(function (array $browserRow) {
            return [
                'name' => $browserRow[0],
                'type' => 'browser',
                'sessions' => (int)$browserRow[1],
            ];
        });
        if ($topBrowsers->count() <= $maxResults) {
            return $topBrowsers;
        }
        return $this->summarizeTopBrowsers($topBrowsers, $maxResults);
    }

    /**
     * Add "Other" to the list if too much result.
     *
     * @param Collection $topBrowsers
     * @param int $maxResults
     * @return Collection
     */
    protected function summarizeTopBrowsers(Collection $topBrowsers, int $maxResults): Collection
    {
        return $topBrowsers
            ->take($maxResults - 1)
            ->push([
                'name' => 'Others',
                'type' => 'browser',
                'sessions' => $topBrowsers->splice($maxResults - 1)->sum('sessions')
            ]);
    }

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $period = Period::create(Carbon::today()->subWeek(), Carbon::today());
        $results = $this->fetchTopBrowsers($period, 3);
        return view('analytics::application.google.widgets.table_widget', [
            'widget' => (string)'browser',
            'datas' => $results,
            'config' => $this->config,
        ]);
    }
}
