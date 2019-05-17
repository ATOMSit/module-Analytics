<?php


namespace Modules\Analytics\Widgets;


use Arrilot\Widgets\AbstractWidget;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\Analytics\Period;
use Analytics;

class TopCountriesWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [

    ];

    protected function fetchTopBrowsers(Period $period, int $maxResults = 10): Collection
    {
        $response = Analytics::performQuery(
            $period,
            'ga:sessions',
            [
                'dimensions' => 'ga:country,ga:countryIsoCode',
                'sort' => '-ga:sessions',
            ]
        );

        $topBrowsers = collect($response['rows'] ?? [])->map(function (array $browserRow) {
            return [
                'name' => $browserRow[0],
                'iso' => (string)$browserRow[1],
                'sessions' => (int)$browserRow[2],
            ];
        });
        if ($topBrowsers->count() <= $maxResults) {
            return $topBrowsers;
        }

        return $this->summarizeTopBrowsers($topBrowsers, $maxResults);
    }

    protected function summarizeTopBrowsers(Collection $topBrowsers, int $maxResults): Collection
    {
        return $topBrowsers
            ->take($maxResults - 1)
            ->push([
                'name' => 'Others',
                'sessions' => $topBrowsers->splice($maxResults - 1)->sum('sessions'),
                'iso' => null
            ]);
    }

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $period = Period::create(Carbon::today()->subWeek(), Carbon::today());
        $results = $this->fetchTopBrowsers($period, 5);

        return view('analytics::application.google.widgets.top_countries_widget', [
            'top_countries' => $results,
            'config' => $this->config,
        ]);
    }
}
