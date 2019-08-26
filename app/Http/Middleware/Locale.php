<?php namespace App\Http\Middleware;

use App;
use Closure;
use Session;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')){
            App::setLocale(Session::get('locale'));
        }else{
            Session::put('locale', config('app.locale'));
            App::setLocale(Session::get('locale'));
        }

        return $next($request);
    }

}