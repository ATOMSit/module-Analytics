<?php

namespace Modules\Analytics\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Carbon\Carbon;
use Spatie\Analytics\Period;
use Analytics;
use Illuminate\Support\Collection;

class UserTypesWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [

    ];

    /**
     * Returns the type of users visiting the website.
     *
     * @param Period $period
     * @return Collection
     */
    protected function userTypes(Period $period): Collection
    {
        $responses = Analytics::performQuery(
            $period,
            'ga:sessions',
            [
                'dimensions' => 'ga:userType',
            ]
        );
        $results = array('new_visitor' => array(), 'returning_visitor' => array());
        foreach ($responses as $respons) {
            if ($respons[0] === 'New Visitor') {
                $results['new_visitor'] = $respons[1];
            } elseif ($respons[0] === 'Returning Visitor') {
                $results['returning_visitor'] = $respons[1];
            }
        }
        return Collection::make($results);
    }

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $period = Period::create(Carbon::today()->subWeek(), Carbon::today());
        $result = $this->userTypes($period);
        return view('analytics::application.google.widgets.user_types_widget', [
            'userType' => $result,
            'config' => $this->config,
        ]);
    }
}