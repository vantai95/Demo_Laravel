<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configurations = [
            [
                'config_key' => 'HOMEPAGE_BANNER',
                'config_value' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'config_key' => 'ABOUT_US_BANNER',
                'config_value' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'config_key' => 'PRODUCT_BANNER',
                'config_value' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'config_key' => 'AGENT_BANNER',
                'config_value' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'config_key' => 'CONTACT_BANNER',
                'config_value' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];

        if(DB::table('configurations')->count() == 0){
            DB::table('configurations')->insert($configurations);
        }
    }
}
