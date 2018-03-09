<?php

namespace App\Http\Middleware;

use Closure;

class DriverAuthenticated
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
        if(Auth::user()->superAdmin()){
          return redirect('home/vans');
        }else if(Auth::user()->admin()){
          return redirect('home/settings');
        }else if(Auth::user()->customer()){
          return redirect('user-management');
        }else{
          return $next($request);
        }
      }

      abort(404);
    }
}
