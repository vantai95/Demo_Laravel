<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Session, File;
use App\Services\CommonService;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('q');
        $perPage = Session::get('perPage') > 0 ? Session::get('perPage') : config('constants.PAGE_SIZE');

        $breadcrumbs = [
            'title' => __('admin.categories.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/categories'),
                    'text' => __('admin.categories.breadcrumbs.title')
                ]
            ]
        ];

        $categories = Category::select('categories.*')
        ->orderBy('created_at', 'desc');

        if (!empty($keyword)) {
            $keyword = CommonService::correctSearchKeyword($keyword);
            $categories = $categories->where(function ($query) use ($keyword) {
                $query->orWhere('categories.title_vi', 'LIKE', $keyword);
                $query->orWhere('categories.title_en', 'LIKE', $keyword);
            });
        }

        $categories = $categories->paginate($perPage);

        return view('admin.categories.index', compact('breadcrumbs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            'title' => __('admin.categories.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/categories'),
                    'text' => __('admin.categories.breadcrumbs.title')
                ]
            ]
        ];
        return view('admin.categories.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customMessages = [
            'jumbotron_image.required' => trans('admin.categories.validate.jumbotron_image.required'),
            'banner_image.required' => trans('admin.categories.validate.banner_image.required'),
            'homepage_image.required' => trans('admin.categories.validate.homepage_image.required'),
            'title_en.required' => trans('admin.categories.validate.title_en.required'),
            'title_vi.required' => trans('admin.categories.validate.title_vi.required'),
        ];

        $this->validate($request, [
            'jumbotron_image' => 'required',
            'banner_image' => 'required',
            'homepage_image' => 'required',
            'title_en' => 'required',
            'title_vi' => 'required',
        ], $customMessages);

        $requestData = $request->all();

        if (isset($requestData['jumbotron_image'])) {
            $base64_str = substr($requestData['jumbotron_image'], strpos($requestData['jumbotron_image'], ",") + 1);
            if (CommonService::isBase64Encoded($base64_str)) {
                $thumbnailName = 'jumbotron_'.time() . '.jpg';
                $thumbnail = base64_decode($base64_str);
                file_put_contents(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $thumbnailName, $thumbnail);
                $requestData['jumbotron_image'] = $thumbnailName;
            }
        }

        if (isset($requestData['banner_image'])) {
            $base64_str = substr($requestData['banner_image'], strpos($requestData['banner_image'], ",") + 1);
            if (CommonService::isBase64Encoded($base64_str)) {
                $thumbnailName = 'banner_'.time() . '.jpg';
                $thumbnail = base64_decode($base64_str);
                file_put_contents(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $thumbnailName, $thumbnail);
                $requestData['banner_image'] = $thumbnailName;
            }
        }

        if (isset($requestData['homepage_image'])) {
            $base64_str = substr($requestData['homepage_image'], strpos($requestData['homepage_image'], ",") + 1);
            if (CommonService::isBase64Encoded($base64_str)) {
                $thumbnailName = 'homepage_'.time() . '.jpg';
                $thumbnail = base64_decode($base64_str);
                file_put_contents(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $thumbnailName, $thumbnail);
                $requestData['homepage_image'] = $thumbnailName;
            }
        }

        Category::create($requestData);

        Session::flash('flash_message', __('admin.categories.flash_messages.create'));
        return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrfail($id);

        $breadcrumbs = [
            'title' => __('admin.categories.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/categories'),
                    'text' => __('admin.categories.breadcrumbs.title')
                ]
            ]
        ];

        return view('admin.categories.edit', compact('breadcrumbs','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customMessages = [
            'jumbotron_image.required' => trans('admin.categories.validate.jumbotron_image.required'),
            'banner_image.required' => trans('admin.categories.validate.banner_image.required'),
            'homepage_image.required' => trans('admin.categories.validate.homepage_image.required'),
            'title_en.required' => trans('admin.categories.validate.title_en.required'),
            'title_vi.required' => trans('admin.categories.validate.title_vi.required'),
        ];

        $this->validate($request, [
            'jumbotron_image' => 'required',
            'banner_image' => 'required',
            'homepage_image' => 'required',
            'title_en' => 'required',
            'title_vi' => 'required',
        ], $customMessages);

        $requestData = $request->all();
        $category = Category::findOrFail($id);

        //retrieve image from database
        $jumbotron_image = empty($category->jumbotron_image) ? '' : $category->jumbotron_image;
        $flag_jumbotron = false;

        $banner_image = empty($category->banner_image) ? '' : $category->banner_image;
        $flag_banner = false;

        $homepage_image = empty($category->homepage_image) ? '' : $category->homepage_image;
        $flag_homepage = false;

         //choose image  co anh
        foreach ($requestData as $key => $value) {
            if (strpos($key, 'jumbotron_image') !== false) {
                if($jumbotron_image != '')//trong db co anh
                {
                    if (strpos($value,  $category->jumbotron_image ) === false) {
                        $photoName = 'jumbotron_'.time() . '.jpg';
                        $jumbotron_image = str_replace('data:image/png;base64,', '', $value);
                        $jumbotron_image = str_replace(' ', '+', $jumbotron_image);
                        File::delete(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $category->jumbotron_image);
                        File::put(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $photoName, base64_decode($jumbotron_image));

                        $jumbotron_image = $photoName;
                    }
                }
                else {
                    $photoName = 'jumbotron_'.time() . '.jpg';
                    $jumbotron_image = str_replace('data:image/png;base64,', '', $value);
                    $jumbotron_image = str_replace(' ', '+', $jumbotron_image);
                    File::put(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $photoName, base64_decode($jumbotron_image));
                    $jumbotron_image = $photoName;
                }
                $flag_jumbotron = true;
            }

            if (strpos($key, 'banner_image') !== false) {
                if($banner_image != '')//trong db co anh
                {
                    if (strpos($value,  $category->banner_image ) === false) {
                        $photoName = 'banner_'.time() . '.jpg';
                        $banner_image = str_replace('data:image/png;base64,', '', $value);
                        $banner_image = str_replace(' ', '+', $banner_image);
                        File::delete(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $category->banner_image);
                        File::put(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $photoName, base64_decode($banner_image));

                        $banner_image = $photoName;
                    }
                }
                else {
                    $photoName = 'banner_'.time() . '.jpg';
                    $banner_image = str_replace('data:image/png;base64,', '', $value);
                    $banner_image = str_replace(' ', '+', $banner_image);
                    File::put(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $photoName, base64_decode($banner_image));
                    $banner_image = $photoName;
                }
                $flag_banner = true;
            }

            if (strpos($key, 'homepage_image') !== false) {
                if($homepage_image != '')//trong db co anh
                {
                    if (strpos($value,  $category->homepage_image ) === false) {
                        $photoName = 'homepage_'.time() . '.jpg';
                        $homepage_image = str_replace('data:image/png;base64,', '', $value);
                        $homepage_image = str_replace(' ', '+', $homepage_image);
                        File::delete(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $category->homepage_image);
                        File::put(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $photoName, base64_decode($homepage_image));

                        $homepage_image = $photoName;
                    }
                }
                else {
                    $photoName = 'homepage_'.time() . '.jpg';
                    $homepage_image = str_replace('data:image/png;base64,', '', $value);
                    $homepage_image = str_replace(' ', '+', $homepage_image);
                    File::put(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $photoName, base64_decode($homepage_image));
                    $homepage_image = $photoName;
                }
                $flag_homepage = true;
            }
        }
        //  no choose image
        if (!$flag_jumbotron) {
            $jumbotron_image = '';
            File::delete(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $category->jumbotron_image);
        }

        if (!$flag_banner) {
            $banner_image = '';
            File::delete(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $category->banner_image);
        }

        if (!$flag_homepage) {
            $homepage_image = '';
            File::delete(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $category->homepage_image);
        }

        $requestData['jumbotron_image'] = $jumbotron_image;
        $requestData['banner_image'] = $banner_image;
        $requestData['homepage_image'] = $homepage_image;

        $category->update($requestData);

        Session::flash('flash_message', __('admin.categories.flash_messages.update'));

        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        //delete image
        if (!empty($category->jumbotron_image) && File::exists(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $category->jumbotron_image)) {
            unlink(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $category->jumbotron_image);
        }
        if (!empty($category->banner_image) && File::exists(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $category->banner_image)) {
            unlink(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $category->banner_image);
        }
        if (!empty($category->homepage_image) && File::exists(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $category->homepage_image)) {
            unlink(public_path(config('constants.UPLOAD.CATEGORY')) . '/' . $category->homepage_image);
        }
        $category->delete();

        Session::flash('flash_message', __('admin.categories.flash_messages.delete'));

        return redirect("admin/categories");
    }

    public function upload()
    {
        return;
    }
}
