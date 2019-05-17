<?php

namespace Modules\Analytics\Database\Seeders\SystemDatabaseSeeder;

use App\Advice;
use App\Plugin;
use Illuminate\Database\Seeder;

class AdvicesAnalyticsTableSeeder extends Seeder
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    protected $plugin;

    /**
     * AdvicesBlogTableSeeder constructor.
     */
    public function __construct()
    {
        $this->plugin = Plugin::query()
            ->where('name', 'analytics')
            ->first();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advices = array(
            array("name" => "analytics_1", "body" => "Dans le domaine de l'analyse des données WEB, le taux de rebond est un indicateur marketing qui vous permet de mesurer le pourcentage de visiteur ayant visité une page WEB de votre site sans poursuivre la navigation. Ils n'ont donc vu qu'une seule page du site internet."),
            array("name" => "analytics_2", "body" => "La durée moyenne par visite correspond au temps moyen que vos visiteurs vont passer sur l'ensemble de votre site internet, plus ce temps est grand, plus le visiteurs est intéréssé par votre site. En moyenne la durée moyenne d'une visite d'un internaute est de 2 à 3 minutes."),
            array("name" => "analytics_3", "body" => ""),
            array("name" => "analytics_4", "body" => ""),
            array("name" => "analytics_5", "body" => "")
        );
        $option = Plugin::query()
            ->where('name', 'Analytics')
            ->first();
        foreach ($advices as $advice) {
            $db = Advice::query()
                ->where("name", $advice)
                ->first();
            if ($db === null) {
                $db = new Advice([
                    "name" => $advice['name'],
                    "body" => $advice['body']
                ]);
                $option->advices()->save($db);
            } elseif ($db !== null) {
                $db->update([
                    "name" => $advice['name'],
                    "body" => $advice['body']
                ]);
                $db->save();
            }
        }
    }
}