<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Team;
use App\Models\Configuration;
use Session;

class AboutUsController extends Controller
{
    public function index ()
    {
        $language = Session::get('locale');
        $company = Company::select('id', "companies.introduction_$language as introduction", "companies.goal_$language as goal", "companies.total_happy_customers", "companies.total_stores", "companies.total_experience_years", "companies.total_active_projects", "companies.goal_image", "companies.introduction_image")->first();
        $teams = Team::select('avatar_image', 'full_name', 'title', 'company_id')->where('company_id', '=', $company->id)->get();
        $about_us_banner = Configuration::where('config_key', Configuration::CONFIG_KEYS['ABOUT_US_BANNER'])->select('configurations.config_value')->first();

        return view('user.about-us.index',compact('company', 'teams', 'about_us_banner'));
    }
}
