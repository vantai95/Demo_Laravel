<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'slug' => 'meat',
                'title_en' => 'Meat',
                'title_vi' => 'Thịt',
                'jumbotron_image' => '1.jpg',
                'banner_image' => '1.jpg',
                'homepage_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => 'vegetable',
                'title_en' => 'Vegetable',
                'title_vi' => 'Rau',
                'jumbotron_image' => '1.jpg',
                'banner_image' => '1.jpg',
                'homepage_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => 'food-technology',
                'title_en' => 'Food Technology',
                'title_vi' => 'Thực phẩm công nghệ',
                'jumbotron_image' => '1.jpg',
                'banner_image' => '1.jpg',
                'homepage_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        if (DB::table('categories')->count() == 0) {
            DB::table('categories')->insert($categories);
        }
    }
}
