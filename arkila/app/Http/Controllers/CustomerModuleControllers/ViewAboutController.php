<?php

namespace App\Http\Controllers\CustomerModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewAboutController extends Controller
{
    public function viewAbout()
    {
    	return view('customermodule.user.about.customerAbout');
    }
}
