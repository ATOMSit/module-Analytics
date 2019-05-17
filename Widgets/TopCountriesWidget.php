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

    /**
     * Returns the list of countries of origin of visitors
     *
     * @param Period $period
     * @param int $maxResults
     * @return Collection
     */
    protected function fetchTopCountries(Period $period, int $maxResults = 10): Collection
    {
        $response = Analytics::performQuery(
            $period,
            'ga:sessions',
            [
                'dimensions' => 'ga:country,ga:countryIsoCode',
                'sort' => '-ga:sessions',
            ]
        );
        $topCountries = collect($response['rows'] ?? [])->map(function (array $browserRow) {
            return [
                'name' => $browserRow[0],
                'iso' => (string)$browserRow[1],
                'sessions' => (int)$browserRow[2],
            ];
        });
        if ($topCountries->count() <= $maxResults) {
            return $topCountries;
        }
        return $this->summarizeTopCountries($topCountries, $maxResults);
    }

    /**
     * Add "Other" to the list if too much result.
     *
     * @param Collection $topCountries
     * @param int $maxResults
     * @return Collection
     */
    protected function summarizeTopCountries(Collection $topCountries, int $maxResults): Collection
    {
        return $topCountries
            ->take($maxResults - 1)
            ->push([
                'name' => 'Others',
                'sessions' => $topCountries->splice($maxResults - 1)->sum('sessions'),
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
        $results = $this->fetchTopCountries($period, 5);
        return view('analytics::application.google.widgets.top_countries_widget', [
            'top_countries' => $results,
            'config' => $this->config,
        ]);
    }
}
