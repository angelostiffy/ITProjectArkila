<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        if(Auth::user()->customer()){
          return redirect('home/user-management');
        }else if(Auth::user()->driver()){
          return redirect(route('drivermodule.dashboard'));
        }else if(Auth::user()->superAdmin()){
          return redirect('home/vans');
        }else if(Auth::user()->admin()){
          return redirect('home/settings');
        }else{
          abort(404);
        }
    }
}
