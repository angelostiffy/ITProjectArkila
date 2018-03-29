<?php

namespace App\Http\Controllers\CustomerModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerNonUserHomeController extends Controller
{
    public function indexNonUser()
    {
      return view('index');
    }

    public function aboutNonUser()
    {
      return view('customermodule.non-user.about.customerAbout');
    }

    public function register()
    {
    	return view('customermodule.non-user.sign-up.signUp');
    }
}
