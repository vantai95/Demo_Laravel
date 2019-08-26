<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Team;
use Session, File;
use App\Services\CommonService;

class CompanyController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('q');
        $perPage = Session::get('perPage') > 0 ? Session::get('perPage') : config('constants.PAGE_SIZE');
        !empty($request->get('activeTeamTab')) ? $activeTeamTab = true : $activeTeamTab = false;

        $breadcrumbs = [
            'title' => __('admin.companies.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/companies'),
                    'text' => __('admin.companies.breadcrumbs.title')
                ]
            ]
        ];

        $company = Company::select('companies.*')->first();

        $teams = Team::select('teams.*')
        ->orderBy('created_at', 'desc');

        if (!empty($keyword)) {
            $keyword = CommonService::correctSearchKeyword($keyword);
            $teams = $teams->where(function ($query) use ($keyword) {
                $query->orWhere('teams.full_name', 'LIKE', $keyword);
            });
            $activeTeamTab = true;
        }

        $teams = $teams->paginate($perPage);

        return view('admin.companies.index', compact('breadcrumbs', 'company', 'teams', 'activeTeamTab'));
    }

    public function updateAboutUs(Request $request)
    {
        $this->validate($request, [
            'introduction_image' => 'required',
            'introduction_en' => 'required',
            'introduction_vi' => 'required',
            'goal_image' => 'required',
            'goal_en' => 'required',
            'goal_vi' => 'required',
            'total_happy_customers' => 'required',
            'total_stores' => 'required',
            'total_experience_years' => 'required',
            'total_active_projects' => 'required',
        ]);
        $company = Company::select('companies.*')->first();
        $requestData = $request->all();

        $introduction_image = empty($company->introduction_image) ? '' : $company->introduction_image;
        $flag_introduction_image = false;

        $goal_image = empty($company->goal_image) ? '' : $company->goal_image;
        $flag_goal_image = false;

        foreach ($requestData as $key => $value) {
            if(strpos($key, 'introduction_image') !== false){
                if($introduction_image != '')//trong db co anh
                {
                    if (strpos($value,  $company->introduction_image ) === false) {
                        $photoName = 'introduction_image_'.time() . '.jpg';
                        $introduction_image = str_replace('data:image/png;base64,', '', $value);
                        $introduction_image = str_replace(' ', '+', $introduction_image);
                        File::delete(public_path(config('constants.UPLOAD.COMPANY')) . '/' . $company->introduction_image);
                        File::put(public_path(config('constants.UPLOAD.COMPANY')) . '/' . $photoName, base64_decode($introduction_image));

                        $introduction_image = $photoName;
                    }
                }
                else {
                    $photoName = 'introduction_image_'.time() . '.jpg';
                    $introduction_image = str_replace('data:image/png;base64,', '', $value);
                    $introduction_image = str_replace(' ', '+', $introduction_image);
                    File::put(public_path(config('constants.UPLOAD.COMPANY')) . '/' . $photoName, base64_decode($introduction_image));
                    $introduction_image = $photoName;
                }
                $flag_introduction_image = true;
            }
            if(strpos($key, 'goal_image') !== false){
                if($goal_image != '')//trong db co anh
                {
                    if (strpos($value,  $company->goal_image ) === false) {
                        $photoName = 'goal_image_'.time() . '.jpg';
                        $goal_image = str_replace('data:image/png;base64,', '', $value);
                        $goal_image = str_replace(' ', '+', $goal_image);
                        File::delete(public_path(config('constants.UPLOAD.COMPANY')) . '/' . $company->goal_image);
                        File::put(public_path(config('constants.UPLOAD.COMPANY')) . '/' . $photoName, base64_decode($goal_image));

                        $goal_image = $photoName;
                    }
                }
                else {
                    $photoName = 'goal_image_'.time() . '.jpg';
                    $goal_image = str_replace('data:image/png;base64,', '', $value);
                    $goal_image = str_replace(' ', '+', $goal_image);
                    File::put(public_path(config('constants.UPLOAD.COMPANY')) . '/' . $photoName, base64_decode($goal_image));
                    $goal_image = $photoName;
                }
                $flag_goal_image = true;
            }
        }
        if (!$flag_introduction_image) {
            $introduction_image = '';
            File::delete(public_path(config('constants.UPLOAD.COMPANY')) . '/' . $company->introduction_image);
        }
        if (!$flag_goal_image) {
            $goal_image = '';
            File::delete(public_path(config('constants.UPLOAD.COMPANY')) . '/' . $company->goal_image);
        }

        $requestData['introduction_image'] = $introduction_image;
        $requestData['goal_image'] = $goal_image;

        $company->update($requestData);

        Session::flash('flash_message', trans('admin.companies.flash_messages.update'));
        return redirect('admin/companies');
    }

    public function createTeam()
    {
        $company = Company::select('companies.*')->first();
        $activeTeamTab = true;

        $breadcrumbs = [
            'title' => __('admin.companies.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/companies'),
                    'text' => __('admin.companies.breadcrumbs.title')
                ]
            ]
        ];
        return view('admin.companies.create_team', compact('breadcrumbs', 'company', 'activeTeamTab'));
    }

    public function storeTeam(Request $request)
    {
        $this->validate($request, [
            'avatar_image' => 'required',
            'full_name' => 'required',
            'title' => 'required',
        ]);
        $requestData = $request->all();

        if (isset($requestData['avatar_image'])) {
            $base64_str = substr($requestData['avatar_image'], strpos($requestData['avatar_image'], ",") + 1);
            if (CommonService::isBase64Encoded($base64_str)) {
                $thumbnailName = 'avatar_'.time() . '.jpg';
                $thumbnail = base64_decode($base64_str);
                file_put_contents(public_path(config('constants.UPLOAD.TEAM')) . '/' . $thumbnailName, $thumbnail);
                $requestData['avatar_image'] = $thumbnailName;
            }
        }

        $requestData['company_id'] = Company::first()->id;

        Team::create($requestData);

        Session::flash('flash_message', __('admin.companies.flash_messages.createTeam'));
        return redirect()->route("companies", ['activeTeamTab' => true]);
    }

    public function editTeam($id)
    {
        $company = Company::select('companies.*')->first();
        $team = Team::findOrFail($id);
        $activeTeamTab = true;

        $breadcrumbs = [
            'title' => __('admin.companies.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/companies'),
                    'text' => __('admin.companies.breadcrumbs.title')
                ]
            ]
        ];

        return view('admin.companies.edit_team', compact('breadcrumbs','activeTeamTab', 'team', 'company'));
    }

    public function updateTeam(Request $request, $id)
    {
        $this->validate($request, [
            'avatar_image' => 'required',
            'full_name' => 'required',
            'title' => 'required',
        ]);
        $requestData = $request->all();
        $team = Team::findOrFail($id);

        //retrieve image from database
        $avatar_image = empty($team->avatar_image) ? '' : $team->avatar_image;
        $flag = false;


         //choose image  co anh
        foreach ($requestData as $key => $value) {
            if (strpos($key, 'avatar_image') !== false) {
                if($avatar_image != '')//trong db co anh
                {
                    if (strpos($value,  $team->avatar_image ) === false) {
                        $photoName = 'avatar_'.time() . '.jpg';
                        $avatar_image = str_replace('data:image/png;base64,', '', $value);
                        $avatar_image = str_replace(' ', '+', $avatar_image);
                        File::delete(public_path(config('constants.UPLOAD.TEAM')) . '/' . $team->avatar_image);
                        File::put(public_path(config('constants.UPLOAD.TEAM')) . '/' . $photoName, base64_decode($avatar_image));

                        $avatar_image = $photoName;
                    }
                }
                else {
                    $photoName = 'avatar_'.time() . '.jpg';
                    $avatar_image = str_replace('data:image/png;base64,', '', $value);
                    $avatar_image = str_replace(' ', '+', $avatar_image);
                    File::put(public_path(config('constants.UPLOAD.TEAM')) . '/' . $photoName, base64_decode($avatar_image));
                    $avatar_image = $photoName;
                }
                $flag = true;
            }

        }
        //  no choose image
        if (!$flag) {
            $avatar_image = '';
            File::delete(public_path(config('constants.UPLOAD.TEAM')) . '/' . $team->avatar_image);
        }

        $requestData['avatar_image'] = $avatar_image;

        $team->update($requestData);

        Session::flash('flash_message', __('admin.companies.flash_messages.updateTeam'));

        return redirect()->route("companies", ['activeTeamTab' => true]);
    }

    public function destroyTeam($id)
    {
        $team = Team::findOrFail($id);
        //delete image
        if (!empty($team->avatar_image) && File::exists(public_path(config('constants.UPLOAD.TEAM')) . '/' . $team->avatar_image)) {
            unlink(public_path(config('constants.UPLOAD.TEAM')) . '/' . $team->avatar_image);
        }
        $team->delete();

        Session::flash('flash_message', __('admin.companies.flash_messages.deleteTeam'));
        return redirect()->route("companies", ['activeTeamTab' => true]);
    }

    public function upload()
    {
        return;
    }

}
