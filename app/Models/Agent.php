<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Agent extends Model
{
    use Sluggable;
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'agents';

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
    protected $fillable = [
        'name_en',
        'name_vi',
        'address_en',
        'address_vi',
        'slug',
        'phone',
        'email',
        'is_contact',
        'iframe',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name_en',
            ]
        ];
    }
}
