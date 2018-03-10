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
        if($user->isCustomer()){
          return redirect('home/user-management');
        }else if($user->isDriver()){
          return redirect(route('drivermodule.dashboard'));
        }else if($user->isSuperAdmin()){
          return redirect('home/vans');
        }else if($user->isAdmin()){
          return redirect('home/settings');
        }else{
          abort(404);
        }
        //return $user;
    }
}
