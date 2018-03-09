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
        return $next($request);if(Auth::check()){
          if(Auth::user()->driver()){
            return redirect(route('drivermodule.dashboard'));
          }else if(Auth::user()->superAdmin()){
            return redirect('home/vans');
          }else if(Auth::user()->admin()){
            return redirect('home/settings');
          }else{
            return $next($request);
          }
        }

        abort(404);
    }
}
