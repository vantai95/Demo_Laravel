<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\File;

class Product extends Model
{
    use Sluggable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = ['category_id', 'title_en', 'title_vi', 'slug', 'content_en', 'content_vi', 'image', 'homepage_image'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title_en'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function imageUrl()
    {
        $nameFirstImage = explode(',', $this->image);
        if (!empty($nameFirstImage[0]) && File::exists(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . $nameFirstImage[0])) {
            return asset(config('constants.UPLOAD.PRODUCT') . '/' . $nameFirstImage[0]);
        }
        return asset(config('constants.DEFAULT.PRODUCT'));
    }

    public function homepageUrl()
    {
        if (!empty($this->homepage_image) && File::exists(public_path(config('constants.UPLOAD.PRODUCT')) . '/' . $this->homepage_image)) {
            return asset(config('constants.UPLOAD.PRODUCT') . '/' . $this->homepage_image);
        }
        return asset(config('constants.DEFAULT.PRODUCT'));
    }
}
