<?php

namespace App\Http\Controllers\CustomerModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use App\Van;

class ViewAboutController extends Controller
{
    public function viewAbout()
    {
        $numberOfOperators = count(Member::allOperators()->get());
        $numberOfVans = count(Van::all());
        $numberOfDrivers = count(Member::allDrivers()->get());
    	return view('customermodule.user.about.customerAbout',compact('numberOfOperators','numberOfVans','numberOfDrivers'));
    }
}
