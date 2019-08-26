<?php

namespace App\Http\Controllers;

use App;
use Session;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use App\Models\Category;
use App\Models\Configuration;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function changeLocalization($language)
    {
        App::setLocale($language);
        Session::put('locale', $language);
        return redirect()->back();
    }

    public function index()
    {
        $language = Session::get('locale');
        $homepage_banner = Configuration::where('config_key', Configuration::CONFIG_KEYS['HOMEPAGE_BANNER'])->select('configurations.config_value')->first();

        $categories = Category::select("title_$language as title", 'homepage_image', 'slug')
        ->orderBy('created_at', 'desc')->take(3)
        ->get();

        $products = Product::join('categories', 'categories.id', 'products.category_id')
        ->select("categories.title_$language as category_title", "products.title_$language as product_title", "products.content_$language as product_content", "products.image", "products.id", "products.homepage_image")
        ->take(5)->get();

        if(App::getLocale() == "vi"){
            $data1 = [
                [
                    'title' => 'An toàn cho sức khoẻ',
                    'content' => '
                                    <span> Bạn có thể đã từng nghe, “ Thực phẩm organic không có nhiều dưỡng chất hơn thực phẩm vô cơ”. Tuy nhiên theo tổ chức Soil Association, thực phẩm organic giúp cơ thể tang khả năng hấp thu các dưỡng chất, khoáng chất và các vitamin thiết yếu. </span>
                                    <p></p><span>Thực phẩm vô cơ thường chứa các hóc môn tăng trưởng và chất kích thích gây hại cho sức khoẻ mang đến nguy cơ tiềm ẩn về phát triển sinh lý, bệnh đường tiêu hoá, nguy hiểm hơn nữa là chất xúc tác bệnh ung thư.</span>
                                ',
                ],
                [
                    'title' => 'Bảo vệ môi trường',
                    'content' => '<span>Thực phẩm organic với các phương pháp nuôi trồng, thu hoạch chế biến không sử dụng hoá chất, phụ gia và hoocmon tăng trưởng đồng thời cũng mang lại sự cân bằng tự nhiên cho hệ sinh thái. Góp phần bảo vệ môi trường, giảm thiểu các chất hoá học có hại cho trái đất. </span>'
                ],
                [
                    'title' => 'Bảo vệ cho thế hệ tương lai',
                    'content' => '
                                    <span>Như đã được phân tích ở trên. Thế hệ con cháu chúng ta xứng đáng được bảo vệ sức khoẻ với nguồn thực phẩm organic không chất kích thích và hóc môn tăng  trưởng, sống trong môi trường trong lành không ô nhiễm bởi các hoá chất độc hại. </span>
                                    <p></p><span>Bắt đầu với việc điều chỉnh những việc nhỏ như thói quen ăn uống và mua thức ăn hang ngày, chúng ta sẽ góp phần định hình cho ngành công nghiệp thực phẩm theo xu hướng sạch và thân thiện với môi trường.</span>
                                ',
                ],
            ];
        }
        else{
            $data1 = [
                [
                    'title' => 'Safe for health',
                    'content' => '
                                    <span>You may have heard, "Organic food has no more nutrients than inorganic food." However, according to Soil Association, organic foods help the body to absorb essential nutrients, minerals and vitamins. </span>
                                    <p></p><span>Inorganic foods often contain growth hormones and stimulants that are harmful to health, bringing a potential risk of physiological development, gastrointestinal disease, and more dangerous cancer catalysts.</span>
                                ',
                ],
                [
                    'title' => 'Environmental Protection',
                    'content' => '<span>Organic food with farming methods, processing and processing does not use chemicals, additives and hormones to grow and also bring a natural balance to the ecosystem. Contributing to environmental protection, minimizing harmful chemicals for the earth. </span>'
                ],
                [
                    'title' => 'Protected for future generations',
                    'content' => '
                                    <span>As analyzed above. Our children and grandchildren deserve to be protected with growth-promoting non-stimulant organic and hormonal food sources, living in a clean environment free from harmful chemicals .</span>
                                    <p></p><span>Starting with adjusting small things like eating habits and buying food every day, we will contribute to shaping the clean and environmentally friendly food industry .</span>
                                ',
                ],
            ];
        }
        return view("user.home.index", compact('products','data1', 'homepage_banner', 'categories'));
    }

    public function contactUs()
    {
        return view("static.contact_us");
    }

    public function submitContactUs(Request $request)
    {
        $input = $request->all();
        $data = array('message' => $input["message"],'name'=>$input["name"],'email'=>$input["email"], 'phone'=>$input['phone']);
        $res = \Mail::to(env('MAIL_FROM_ADDRESS'))->send(new SendMail($data));
        return view("static.contact_us");
    }


}
