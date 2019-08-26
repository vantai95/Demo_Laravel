<?php

namespace App\Models;
use File;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    const CONFIG_KEYS = [
        'AGENT_BANNER' => 'AGENT_BANNER',
        'ABOUT_US_BANNER' => 'ABOUT_US_BANNER',
        'PRODUCT_BANNER' => 'PRODUCT_BANNER',
        'HOMEPAGE_BANNER' => 'HOMEPAGE_BANNER',
        'CONTACT_BANNER' => 'CONTACT_BANNER',
    ];

   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'configurations';

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
        'config_key',
        'config_value',
    ];

    public function imageUrl()
    {
        if (!empty($this->config_value) && File::exists(public_path(config('constants.UPLOAD.CONFIGURATION')) . '/' . $this->config_value)) {
            return url(config('constants.UPLOAD.CONFIGURATION') . '/' . $this->config_value);
        }
        return url(config('constants.DEFAULT.CONFIGURATION'));
    }
}
