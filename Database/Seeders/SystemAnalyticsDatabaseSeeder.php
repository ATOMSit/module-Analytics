<?php

namespace Modules\Analytics\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Analytics\Database\Seeders\SystemDatabaseSeeder\AdvicesAnalyticsTableSeeder;
use Modules\Analytics\Database\Seeders\SystemDatabaseSeeder\PluginsAnalyticsTableSeeder;

class SystemAnalyticsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PluginsAnalyticsTableSeeder::class);

        $this->call(AdvicesAnalyticsTableSeeder::class);
    }
}
