<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthenticated
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
        if(Auth::user()->customer()){
          return redirect('home/user-management');
        }else if(Auth::user()->driver()){
          return redirect(route('drivermodule.dashboard'));
        }else if(Auth::user()->superAdmin()){
          return redirect('home/vans');
        }else{
          return $next($request);
        }
      }

      abort(404);
    }
}
