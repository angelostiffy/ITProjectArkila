<?php

namespace App\Http\Middleware;

use Closure;

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
          if(Auth::user()->isCustomer()){
            return redirect('home/user-management');
          }else if(Auth::user()->isDriver()){
            return redirect(route('drivermodule.dashboard'));
          }else if(Auth::user()->isAdmin()){
            return redirect('home/settings');
          }else{
            return $next($request);
          }
        }

        abort(404);
    }
}
