<?php

namespace App\Http\Controllers\CustomerModuleControllers;

use App\Van;
use App\Member;
use App\Http\Controllers\Controller;

class CustomerNonUserHomeController extends Controller
{
    public function indexNonUser()
    {

        if(auth()->user()){
            return redirect('/home');
        }else{
            return view('index');
        }

    }

    public function aboutNonUser()
    {
        $numberOfOperators = count(Member::allOperators()->get());
        $numberOfVans = count(Van::all());
        $numberOfDrivers = count(Member::allDrivers()->get());
        return view('customermodule.non-user.about.customerAbout',compact('numberOfOperators','numberOfVans','numberOfDrivers'));
    }

    public function register()
    {
    	return view('customermodule.non-user.sign-up.signUp');
    }
}
