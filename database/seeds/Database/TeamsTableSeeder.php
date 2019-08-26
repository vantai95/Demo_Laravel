<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                'company_id' => '1',
                'full_name' => 'Billy Ray',
                'title' => 'Lãnh đạo',
                'avatar_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'company_id' => '1',
                'full_name' => 'Danielle Reed',
                'title' => 'Nông dân',
                'avatar_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'company_id' => '1',
                'full_name' => 'Peter Castro',
                'title' => 'Nông dân',
                'avatar_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'company_id' => '1',
                'full_name' => 'Adam Carter',
                'title' => 'Lãnh đạo',
                'avatar_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        if (DB::table('teams')->count() == 0) {
            DB::table('teams')->insert($teams);
        }
    }
}
