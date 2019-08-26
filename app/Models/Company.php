<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use File;

class Company extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

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
        'introduction_en', 'introduction_vi', 'introduction_image', 'goal_en', 'goal_vi', 'goal_image', 'total_happy_customers', 'total_stores', 'total_experience_years', 'total_active_projects'
    ];

    public function goalUrl()
    {
        if (!empty($this->goal_image) && File::exists(public_path(config('constants.UPLOAD.COMPANY')) . '/' . $this->goal_image)) {
            return asset(config('constants.UPLOAD.COMPANY') . '/' . $this->goal_image);
        }
        return asset(config('constants.DEFAULT.COMPANY'));
    }

    public function introductionUrl()
    {
        if (!empty($this->introduction_image) && File::exists(public_path(config('constants.UPLOAD.COMPANY')) . '/' . $this->introduction_image)) {
            return asset(config('constants.UPLOAD.COMPANY') . '/' . $this->introduction_image);
        }
        return asset(config('constants.DEFAULT.COMPANY'));
    }
}
