<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Http\Controllers\Controller;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
    }
    public function index()
    {
        $breadcrumbs = [
            'title' => 'Admin',
            'links' => [
                [
                    'href' => url('admin'),
                    'text' => 'Dashboard'
                ]
            ]
        ];
        $perPage = config('constants.PAGE_SIZE');

        $users =  User::select('users.*')->orderBy('created_at', 'desc');
        $users = $users->paginate($perPage);
        return view('admin.users.index', compact('breadcrumbs','users'));
    }

    public function logout(Request $request)
    {
        $language = Session::get('lang');        
        App::setLocale($language);
        Auth::logout();
        return redirect('/');
    }
}
