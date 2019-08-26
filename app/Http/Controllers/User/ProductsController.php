<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Configuration;
use App\Models\Product;
use Session;

class ProductsController extends Controller
{
    public function index ()
    {
        $language = Session::get('locale');

        $categories = Category::select('categories.id', "categories.title_$language as title", 'categories.jumbotron_image')
        ->orderBy('created_at', 'desc')
        ->with(array('products' => function($query) {
            $language = Session::get('locale');
            $query->select('id', 'category_id',"title_$language as title","content_$language as content","image")
            ->orderBy('created_at', 'desc')->get();
        }))
        ->get();

        $product_banner = Configuration::where('config_key', Configuration::CONFIG_KEYS['PRODUCT_BANNER'])->select('configurations.config_value')->first();

        return view('user.products.index',compact('categories', 'product_banner'));
    }

    public function productDetail (Request $request, $category_slug)
    {
        $language = Session::get('locale');

        $products = Product::join('categories', 'categories.id', 'products.category_id')
        ->select("categories.title_$language as category_title", "products.title_$language as product_title", "products.content_$language as product_content", "products.image", "products.id")
        ->where('categories.slug', $category_slug)->get();

        $category = Category::select('banner_image', "title_$language as title")->where('slug', $category_slug)->first();

        return view('user.products.detail',compact('products', 'category'));
    }

    public function showProductDetail(Request $request, $id)
    {
        $language = Session::get('locale');
        $product = Product::join('categories', 'categories.id', 'products.category_id')
        ->select("categories.title_$language as category_title", "products.title_$language as product_title", "products.content_$language as product_content", "products.image", "categories.slug as category_slug")
        ->where('products.id', $id)->first();

        $images = explode(', ', $product->image);

        return (String) view('user.products.product_detail_modal', compact('product', 'images'));
    }
}
