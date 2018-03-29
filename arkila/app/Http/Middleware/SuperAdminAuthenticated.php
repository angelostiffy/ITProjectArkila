<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SuperAdminAuthenticated
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
        if(Auth::check()){
          if(Auth::user()->isCustomer() && Auth::user()->isEnable()){
            return redirect(route('customermodule.user.index'));
          }

          if(Auth::user()->isDriver() && Auth::user()->isEnable()){
            return redirect(route('drivermodule.index'));
          }
          if(Auth::user()->isAdmin() && Auth::user()->isEnable()){
            return redirect('home/settings');
          }

          if(Auth::user()->isSuperAdmin() && Auth::user()->isEnable()){
            return $next($request);
          }
        }

        abort(404);
    }
}
