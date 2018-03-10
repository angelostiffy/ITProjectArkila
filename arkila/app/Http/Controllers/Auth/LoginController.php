<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Closure;
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

    public function showLoginForm()
    {
        return view('login.login');
    }

    public function username()
    {
      return 'username';
    }

    public function authenticated(Request $request, $user)
    {
        if($user->isCustomer() && $user->isEnable()){
          return redirect('home/user-management');
        }

        if($user->isDriver() && $user->isEnable()){
          return redirect(route('drivermodule.dashboard'));
        }

        if($user->isSuperAdmin() && $user->isEnable()){
          return redirect('home/vans');
        }

        if($user->isAdmin() && $user->isEnable()){
          return redirect('home/settings');
        }
        // else{
        //   abort(404);
        // }
        //return $user;
        abort(404);
    }
}
