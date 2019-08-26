<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $action = $request->route()->getAction();
            $controller = class_basename($action['controller']);
            list($controller, $action) = explode('@', $controller);
            View::share('action', $action);
            View::share('controller', $controller);
            return $next($request);
        }

        $request->session()->put('redirect_url', $request->url());
        Auth::logout();
        return redirect('/login');
    }
}
