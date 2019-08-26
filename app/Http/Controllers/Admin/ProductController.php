<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Session, File;
use App\Services\CommonService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lang = Session::get('locale');
        $categories = Category::orderBy("title_$lang", 'asc')->pluck("title_$lang", 'id');

        $keyword = $request->get('q');
        $categoryId = $request->get('category_id');
        $perPage = Session::get('perPage') > 0 ? Session::get('perPage') : config('constants.PAGE_SIZE');

        $breadcrumbs = [
            'title' => __('admin.products.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/products'),
                    'text' => __('admin.products.breadcrumbs.title')
                ]
            ]
        ];

        $products = Product::select('products.*')
        ->orderBy('created_at', 'desc');

        if (!empty($keyword)) {
            $keyword = CommonService::correctSearchKeyword($keyword);
            $products = $products->where(function ($query) use ($keyword) {
                $query->orWhere('products.title_vi', 'LIKE', $keyword);
                $query->orWhere('products.title_en', 'LIKE', $keyword);
            });
        }

        if (!empty($categoryId)) {
            $products = $products->where('products.category_id', '=', $categoryId);
        }

        $products = $products->paginate($perPage);

        return view('admin.products.index', compact('breadcrumbs', 'products', 'categories', 'categoryId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $lang = Session::get('locale');
        $categories = Category::orderBy("title_$lang", 'asc')->pluck("title_$lang", 'id');
        $categoryId = $request->get('category_id');
        $breadcrumbs = [
            'title' => __('admin.products.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/products'),
                    'text' => __('admin.products.breadcrumbs.title')
                ]
            ]
        ];
        return view('admin.products.create', compact('breadcrumbs', 'categoryId', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'homepage_image' => 'required',
            'image_0' => 'required',
            'title_en' => 'required',
            'title_vi' => 'required',
            'category_id' => 'required',
            'content_en' => 'required',
            'content_vi' => 'required',
        ]);

        $requestData = $request->all();

        $requestData['image'] = '';
        foreach ($requestData as $key => $value) {
            if (strpos($key, 'image_') !== false) {
                if($key == 'image_0') {
                    $photoName = $key.'_'.time() . '.jpg';
                    $base64 = str_replace('data:image/png;base64,', '', $value);
                    $base64 = str_replace(' ', '+', $base64);
                    File::put(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . $photoName, base64_decode($base64));

                    $requestData['image'] .= $photoName;
                }
                else {
                    $photoName = $key.'_'.time() . '.jpg';
                    $base64 = str_replace('data:image/png;base64,', '', $value);
                    $base64 = str_replace(' ', '+', $base64);
                    File::put(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . $photoName, base64_decode($base64));

                    $requestData['image'] .=", ".$photoName;
                }
            }
        }

        if (isset($requestData['homepage_image'])) {
            $base64_str = substr($requestData['homepage_image'], strpos($requestData['homepage_image'], ",") + 1);
            if (CommonService::isBase64Encoded($base64_str)) {
                $thumbnailName = 'homepage_'.time() . '.jpg';
                $thumbnail = base64_decode($base64_str);
                file_put_contents(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . $thumbnailName, $thumbnail);
                $requestData['homepage_image'] = $thumbnailName;
            }
        }

        Product::create($requestData);

        Session::flash('flash_message', __('admin.products.flash_messages.create'));
        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrfail($id);
        $lang = Session::get('locale');
        $categories = Category::orderBy("title_$lang", 'asc')->pluck("title_$lang", 'id');
        $categoryId = $product->category_id;
        $images = explode(', ', $product->image);

        $breadcrumbs = [
            'title' => __('admin.products.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/products'),
                    'text' => __('admin.products.breadcrumbs.title')
                ]
            ]
        ];

        return view('admin.products.edit', compact('breadcrumbs','product', 'categories', 'categoryId', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image_0' => 'required',
            'homepage_image' => 'required',
            'title_en' => 'required',
            'title_vi' => 'required',
            'category_id' => 'required',
            'content_en' => 'required',
            'content_vi' => 'required',
        ]);

        $product = Product::findOrfail($id);

        $requestData = $request->all();

        $homepage_image = empty($product->homepage_image) ? '' : $product->homepage_image;
        $flag_homepage = false;

        $requestData['image'] = '';
        foreach ($requestData as $key => $value) {
            if (strpos($key, 'image_') !== false) {
                if($key == 'image_0'){
                    if(strpos($value, 'data:image/png;base64,') !== false){
                        $photoName = $key.'_'.time() . '.jpg';
                        $base64 = str_replace('data:image/png;base64,', '', $value);
                        $base64 = str_replace(' ', '+', $base64);
                        File::put(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . $photoName, base64_decode($base64));

                        $requestData['image'] .= $photoName;
                    }
                    else{
                        $photoName = explode('/', $value )[count(explode('/', $value ))-1];
                        $requestData['image'] .= $photoName;
                    }
                }
                else {
                    if(strpos($value, 'data:image/png;base64,') !== false){
                        $photoName = $key.'_'.time() . '.jpg';
                        $base64 = str_replace('data:image/png;base64,', '', $value);
                        $base64 = str_replace(' ', '+', $base64);
                        File::put(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . $photoName, base64_decode($base64));

                        $requestData['image'] .=", ".$photoName;
                    }
                    else{
                        $photoName = explode('/', $value )[count(explode('/', $value ))-1];
                        $requestData['image'] .=", ".$photoName;
                    }
                }
            }

            if (strpos($key, 'homepage_image') !== false) {
                if($homepage_image != '')//trong db co anh
                {
                    if (strpos($value,  $product->homepage_image ) === false) {
                        $photoName = 'homepage_'.time() . '.jpg';
                        $homepage_image = str_replace('data:image/png;base64,', '', $value);
                        $homepage_image = str_replace(' ', '+', $homepage_image);
                        File::delete(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . $product->homepage_image);
                        File::put(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . $photoName, base64_decode($homepage_image));

                        $homepage_image = $photoName;
                    }
                }
                else {
                    $photoName = 'homepage_'.time() . '.jpg';
                    $homepage_image = str_replace('data:image/png;base64,', '', $value);
                    $homepage_image = str_replace(' ', '+', $homepage_image);
                    File::put(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . $photoName, base64_decode($homepage_image));
                    $homepage_image = $photoName;
                }
                $flag_homepage = true;
            }
        }

        if (!$flag_homepage) {
            $homepage_image = '';
            File::delete(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . $product->homepage_image);
        }

        $requestData['homepage_image'] = $homepage_image;

        //xóa ảnh nếu chọn ảnh khác
        $images = explode(', ', $product->image );
        foreach($images as $item){
            if(strpos($requestData['image'], $item) === false){
                File::delete(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . $item);
            }
        }

        $product->update($requestData);

        Session::flash('flash_message', __('admin.products.flash_messages.update'));

        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (!empty($product->homepage_image) && File::exists(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . $product->homepage_image)) {
            unlink(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . $product->homepage_image);
        }

        $images = explode(',', $product->image);
        foreach ( $images as $item)
        {
            if (!empty(trim($item)) && File::exists(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . trim($item))) {
                unlink(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . trim($item));
            }
        }

        $product->delete();

        Session::flash('flash_message', __('admin.products.flash_messages.delete'));

        return redirect("admin/products");
    }

    public function upload()
    {
        return;
    }
}
