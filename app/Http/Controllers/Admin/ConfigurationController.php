<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Session, File;

class ConfigurationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $configurations = Configuration::select('id', 'config_key', 'config_value')->get();
        $breadcrumbs = [
            'title' => __('admin.configurations.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/configurations'),
                    'text' => __('admin.configurations.breadcrumbs.title')
                ]
            ]
        ];

        return view('admin.configurations.index', compact( 'breadcrumbs', 'configurations'));
    }

    public function update(Request $request)
    {
        $requestData = $request->all();

        foreach ($requestData as $key => $value) {
            if(strpos($value, 'data:image/png;base64,') !== false)//có chọn ảnh
            {
                $photoName = $key.'_'.time() . '.jpg';
                $base64 = str_replace('data:image/png;base64,', '', $value);
                $base64 = str_replace(' ', '+', $base64);
                File::delete(public_path(config('constants.UPLOAD.CONFIGURATION')) . '/' . Configuration::where('config_key', $key)->value('config_value'));
                File::put(public_path(config('constants.UPLOAD.CONFIGURATION')) . '/' . $photoName, base64_decode($base64));
                Configuration::where('config_key', $key)->update(array('config_value' => $photoName));
            }
            if (empty($value)) {
                File::delete(public_path(config('constants.UPLOAD.CONFIGURATION')) . '/' . Configuration::where('config_key', $key)->value('config_value'));
                Configuration::where('config_key', $key)->update(array('config_value' => ''));
            }
        }

        Session::flash('flash_message', trans('admin.configurations.flash_messages.update'));
        return redirect('admin/configurations');
    }

    public function upload()
    {
        return;
    }
}
