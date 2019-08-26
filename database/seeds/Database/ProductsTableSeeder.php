<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'slug' => 'only-three-US-beef-slices-usda-choice-standard',
                'category_id' => '1',
                'title_en' => 'Only three US beef slices USDA CHOICE standard',
                'title_vi' => 'Ba chỉ bò Mỹ cắt lát tiêu chuẩn USDA CHOICE',
                'content_en' => 'Only three cows are the meat taken from the abdomen of the cow, with strips of lean and fat meat alternating, so it has softness, sweetness, but not completely at all. Only three American cows are thinned according to the standard of 1.5mm thickness, ensuring the thinness for the processing of grilled dishes, BBQ, fried pan or served with hot pot. </br> American cows are easy to process. The dishes made from American bacon are also as simple as sautéing, hotpot, grilled mustard, grilled mushroom mushroom, dipping vinegar or making salad.',
                'content_vi' => 'Ba chỉ bò là phần thịt được lấy từ phần bụng của con bò, với những dải thịt nạc và mỡ xen kẽ nhau nên có độ mềm, ngậy, ngọt nhưng hoàn toàn không ngấy. Ba chỉ bò Mỹ được bào mỏng theo tiêu chuẩn độ dày 1,5mm, đảm bảo độ mỏng cho việc chế biến món nướng, BBQ, chiên áp chảo hoặc dung với lẩu.</br>Bò Mỹ rất dễ chế biến. Những món ăn nấu từ thịt ba chỉ bò Mỹ cũng rất đơn giản như xào, lẩu, cuốn cải nướng, cuốn nấm kim châm nướng, nhúng giấm hay làm salad.',
                'image' => '1.jpg',
                'homepage_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => 'american-beef-flower-cut-into-usda-choice-standard',
                'category_id' => '1',
                'title_en' => 'American beef flower cut into USDA CHOICE standard',
                'title_vi' => 'Bắp hoa bò Mỹ cắt lát tiêu chuẩn USDA CHOICE',
                'content_en' => 'Beef flower corn is a small piece of muscle, filtered out from the front leg of the cow, they have a lot of tendons and connective tissue, small smooth muscle fibers so relatively tough. <br> Corn core core is the motor of many cows, small fibers are smooth, firm, there are many near lines, connective tissue should be relatively tough, need to choose suitable processing to be delicious food and bold.',
                'content_vi' => 'Bắp hoa bò là phần cơ thịt nhỏ, được lọc ra từ chân trước của con bò, chúng có rất nhiều đường gân và mô nối, thớ thịt săn chắc nhỏ mịn nên tương đối dai. <br> Lõi bắp hoa là phần cơ vận động nhiều của con bò, thớ thịt nhỏ mịn, săn chắc, lại có nhiều đường gần, mô nối nên tương đối dai, cần phải chọn cách chế biến phù hợp để món ăn được ngon và đậm đà.',
                'image' => '1.jpg',
                'homepage_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => 'haccp-australian-beef-tenderloin',
                'category_id' => '1',
                'title_en' => 'HACCP Australian beef tenderloin',
                'title_vi' => 'Thăn nội bò Úc tiêu chuẩn HACCP',
                'content_en' => 'Tenderloin, also known as tenderloin or fillet, is the best and softest part of a cow cut from the inner back, especially at the end of the waist. The back is the place that provides the best beef, which is popular because it is the most tender and lean meat. Therefore, it is also the most expensive. A cow has only one piece of beef tenderloin, ranging in size from 1.8 to 2.5 kg.',
                'content_vi' => 'Thịt thăn nội (tenderloin), còn gọi là thịt thăn hay fillet là phần mềm và ngon nhất của con bò được cắt ra từ phần lưng phía trong, đặc biệt là ở phần cuối thắt lưng. Phần lưng là nơi cung cấp những miếng thịt bò ngon nhất, được ưa chuộng vì đây là loại thịt mềm và nhiều nạc nhất. Chính vì vậy, nó cũng có giá đắt nhất. Một con bò chỉ có một miếng thăn nội bò, có trong lượng khoảng 1,8 đến 2,5 kg.',
                'image' => '1.jpg',
                'homepage_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => 'vegetable-1',
                'category_id' => '2',
                'title_en' => 'Vegetable 1',
                'title_vi' => 'Rau 1',
                'content_en' => 'Vegetable Description 1',
                'content_vi' => 'Miêu tả Rau 1',
                'image' => '1.jpg',
                'homepage_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => 'vegetable-2',
                'category_id' => '2',
                'title_en' => 'Vegetable 2',
                'title_vi' => 'Rau 2',
                'content_en' => 'Vegetable Description 2',
                'content_vi' => 'Miêu tả Rau 2',
                'image' => '1.jpg',
                'homepage_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => 'vegetable-3',
                'category_id' => '2',
                'title_en' => 'Vegetable 3',
                'title_vi' => 'Rau 3',
                'content_en' => 'Vegetable Description 3',
                'content_vi' => 'Miêu tả Rau 3',
                'image' => '1.jpg',
                'homepage_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => 'food-technology-1',
                'category_id' => '3',
                'title_en' => 'Food Technology 1',
                'title_vi' => 'Thực phẩm công nghệ 1',
                'content_en' => 'Food Technology Description 1',
                'content_vi' => 'Miêu tả thực phẩm công nghệ 1',
                'image' => '1.jpg',
                'homepage_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => 'food-technology-2',
                'category_id' => '3',
                'title_en' => 'Food Technology 2',
                'title_vi' => 'Thực phẩm công nghệ 2',
                'content_en' => 'Food Technology Description 2',
                'content_vi' => 'Miêu tả thực phẩm công nghệ 2',
                'image' => '1.jpg',
                'homepage_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => 'food-technology-3',
                'category_id' => '3',
                'title_en' => 'Food Technology 3',
                'title_vi' => 'Thực phẩm công nghệ 3',
                'content_en' => 'Food Technology Description 3',
                'content_vi' => 'Miêu tả thực phẩm công nghệ 3',
                'image' => '1.jpg',
                'homepage_image' => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        if (DB::table('products')->count() == 0) {
            DB::table('products')->insert($products);
        }
    }
}
