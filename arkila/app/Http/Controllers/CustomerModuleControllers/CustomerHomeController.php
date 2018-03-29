<?php

namespace App\Http\Controllers\CustomerModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerHomeController extends Controller
{
    public function indexNonUser()
    {
      return view('index');
    }

    public function aboutNonUser()
    {
      return view('customermodule.non-user.about.customerAbout');
    }

    
}
