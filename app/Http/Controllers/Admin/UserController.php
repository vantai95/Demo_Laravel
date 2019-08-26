<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Session,File;
use Illuminate\Support\Facades\Auth;
use App\Services\CommonService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            'title' => __('admin.users.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/users'),
                    'text' => __('admin.users.breadcrumbs.title')
                ]
            ]
        ];

        $keyword = $request->get('q');
        $perPage = config('constants.PAGE_SIZE');
        $users =  User::select('users.*')->orderBy('created_at', 'desc');
        if (!empty($keyword)) {
            $keyword = CommonService::correctSearchKeyword($keyword);
            $user = $users->where(function ($query) use ($keyword) {
                $query->orWhere('name', 'LIKE', $keyword);
                $query->orWhere('email', 'LIKE', $keyword);
            });
        }
        $users = $users->paginate($perPage);
        return view('admin.users.index', compact('breadcrumbs','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            'title' => __('admin.users.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/users'),
                    'text' => __('admin.users.breadcrumbs.title')
                ]
            ]
        ];
        return view('admin.users.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $user = User::create(['name' => $request->name,'email'=> $request->email,'password' => bcrypt($request->password)]);
        Session::flash('flash_message', __('admin.users.flash_messages.create'));
        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //code
    }

    public function myProfile()
    {
        $breadcrumbs = [
            'title' => __('admin.users.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/my-profile'),
                    'text' => __('admin.users.breadcrumbs.title')
                ]
            ]
        ];
        $isMyProfile = true;
        $language = Session::get('lang');        
        $user = Auth::user();
        return view('admin.users.show', compact('user', 'breadcrumbs', 'isMyProfile'));
    }

    public function myProfileUpdate(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
        ]);
        $user = Auth::user()->update(['name' => $request->name]);
        return redirect('/admin/my-profile');
    }

    public function updatePassword(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        if ($user->password) {
            $validateList = [
                'old_password' => 'required',
                'password' => 'required | min:6 | different:old_password',
                'confirm_password' => 'required|same:password',
            ];
            $validators = Validator::make($request->all(), $validateList);
            if($validators->fails()){
                return response()->json([
                    "success" => false,
                    "message" => $validators->messages()
                ]);
            }
            $currentPassword = $request->old_password;
            $newPassword = $request->password;
            if (Hash::check($currentPassword, $user->password))
            {
                $user->password = Hash::make($newPassword);
                $user->save();
                Session::flash('flash_message', __('admin.users.flash_messages.update'));
                return redirect('/admin/my-profile');
            }
            else
            {
                Session::flash('flash_message', __('admin.users.flash_messages.update_fail'));
                return redirect('/admin/my-profile');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breadcrumbs = [
            'title' => __('admin.users.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/users'),
                    'text' => __('admin.users.breadcrumbs.title')
                ]
            ]
        ];
        $language = Session::get('lang');        
        $user = User::findOrFail($id);
        $isMyProfile = false;
        return view('admin.users.edit', compact('breadcrumbs','user','isMyProfile'));

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
        $this->validate(request(), [
            'name' => 'required',
        ]);
        $user = User::where('id', $id)->update(['name' => $request->name]);
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->id == $id){
            Session::flash('flash_message', 'sjhdja');
            return redirect('/admin/users');
        }
        $users = User::findOrFail($id)->delete();
        return redirect('/admin/users');
    }
}
