<?php

namespace Modules\Analytics\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Carbon\Carbon;
use Spatie\Analytics\Period;
use Analytics;

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
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $period = Period::create(Carbon::today()->subWeek(), Carbon::today());
        $results = Analytics::performQuery(
            $period,
            'ga:sessions',
            [
                'dimensions' => 'ga:userType',
            ]
        );

        $response = array('new_visitor' => array(), 'returning_visitor' => array());
        foreach ($results as $result) {
            if ($result[0] === 'New Visitor') {
                $response['new_visitor'] = $result[1];
            } elseif ($result[0] === 'Returning Visitor') {
                $response['returning_visitor'] = $result[1];
            }
        }

        return view('analytics::application.google.widgets.user_types_widget', [
            'userType' => $response,
            'config' => $this->config,
        ]);
    }
}