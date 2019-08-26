<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'introduction_en' => 'P.M Quynh Lam was established with the aim of providing Vietnamese people with clean food with the highest quality. We want to bring about a positive change in Vietnamese eating habits and contribute to building a healthy, environmentally friendly lifestyle.',
                'introduction_vi' => 'P.M Quỳnh Lâm được thành lập với mục đích cung cấp cho người Việt nguồn thực phẩm sạch với chất lượng cao nhất. Chúng tôi mong muốn mang lại sự thay đổi tích cực về thói quen ăn uống của người Việt và góp phần xây dựng lối sống lành mạnh, thân thiện với môi trường.',
                'introduction_image' => '',
                'goal_en' => 'P.M Quynh Lam is tasked with creating a closed cycle from production, sales and distribution of clean and top quality organic food. With the range of products being gradually developed, starting with USDA and HACCP imported beef. We are gradually implementing and applying the most advanced technologies in agriculture as well as animal husbandry for the supply chain. Ensure fresh food sources and meet the highest quality standards today.',
                'goal_vi' => 'P.M Quỳnh Lâm đặt nhiệm vụ tạo nên một chu trình khép kín từ sản xuất, kinh doanh và phân phối thực phẩm sạch cũng như hữu cơ quy chuẩn hàng đầu. Với dãy sản phẩm đang từng bước được phát triển, bắt đầu từ thịt bò nhập khẩu chuẩn USDA và HACCP. Chúng tôi đang từng bước triển khai và áp dụng những công nghệ tiên tiến nhất trong nông nghiệp cũng như chăn nuôi cho chuỗi cung ứng. Đảm bảo nguồn thực phẩm tươi ngon và đạt chuẩn chất lượng cao cấp nhất hiện nay.',
                'goal_image' => '1.jpg',
                'total_happy_customers' => '154',
                'total_stores' => '234',
                'total_experience_years' => '32',
                'total_active_projects' => '126',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        if (DB::table('companies')->count() == 0) {
            DB::table('companies')->insert($companies);
        }
    }
}
