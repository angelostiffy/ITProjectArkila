<?php

namespace App\Http\Middleware;

use Closure;

class CustomerAuthenticated
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
          if(Auth::user()->isDriver()){
            return redirect(route('drivermodule.dashboard'));
          }else if(Auth::user()->isSuperAdmin()){
            return redirect('home/vans');
          }else if(Auth::user()->isAdmin()){
            return redirect('home/settings');
          }else{
            return $next($request);
          }
        }

        abort(404);
    }
}
