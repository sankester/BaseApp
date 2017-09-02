<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAccessPortal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $portal_name)
    {
        $redirect =  $next($request);
        if (Auth::check()) {
            if(!Auth::user()->isPortal($portal_name)){
                $redirect = Auth::user()->role->default_page;
                flash('You dont have access in portal')->error()->important();
                return redirect($redirect);
            }
        }
        return $redirect;
    }
}
