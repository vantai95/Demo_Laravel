<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@mailinator.com',
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        if (DB::table('users')->count() == 0) {
            DB::table('users')->insert($users);
        }
    }
}
