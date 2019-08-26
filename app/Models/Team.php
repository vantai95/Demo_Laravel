<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use File;

class Team extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teams';

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
        'company_id',
        'full_name',
        'phone',
        'title',
        'avatar_image',
    ];

    public function avatarUrl()
    {
        if (!empty($this->avatar_image) && File::exists(public_path(config('constants.UPLOAD.TEAM')) . '/' . $this->avatar_image)) {
            return asset(config('constants.UPLOAD.TEAM') . '/' . $this->avatar_image);
        }
        return asset(config('constants.DEFAULT.TEAM'));
    }
}
