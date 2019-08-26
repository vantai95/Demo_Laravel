<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class Category extends Model
{
    use Sluggable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

       /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title_en', 'title_vi', 'slug', 'jumbotron_image', 'banner_image', 'homepage_image'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title_en'
            ]
        ];
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id');
    }

    public function jumbotronUrl()
    {
        if (!empty($this->jumbotron_image) && File::exists(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $this->jumbotron_image)) {
            return asset(config('constants.UPLOAD.CATEGORY') . '/' . $this->jumbotron_image);
        }
        return asset(config('constants.DEFAULT.CATEGORY'));
    }

    public function bannerUrl()
    {
        if (!empty($this->banner_image) && File::exists(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $this->banner_image)) {
            return asset(config('constants.UPLOAD.CATEGORY') . '/' . $this->banner_image);
        }
        return asset(config('constants.DEFAULT.CATEGORY'));
    }

    public function homepageUrl()
    {
        if (!empty($this->homepage_image) && File::exists(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $this->homepage_image)) {
            return asset(config('constants.UPLOAD.CATEGORY') . '/' . $this->homepage_image);
        }
        return asset(config('constants.DEFAULT.CATEGORY'));
    }

    public static function getCategoryForMenu()
    {
        $language = Session::get('locale');
        $categories = Session::get('header_menu');
        if (empty($categories)) {
            $categories = Category::orderBy('categories.created_at', 'desc')
                ->get(['id', 'slug', "title_$language as title"]);
            Session::put('header_menu', $categories);
        }
        return $categories;
    }
}
