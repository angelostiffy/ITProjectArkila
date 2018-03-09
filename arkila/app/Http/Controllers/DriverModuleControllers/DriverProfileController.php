<?php

namespace App\Http\Controllers\DriverModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
class DriverProfileController extends Controller
{
      public function index()
      {
         $driver = Member::find()->allDrivers()
        return view('drivermodule.profile.driverProfile');
      }
}
