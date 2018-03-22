<?php

namespace App\Http\Controllers\DriverModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Trip;
use App\Member;

class TripLogController extends Controller
{
    public function viewTripLog()
    {
      $member = Member::where('user_id', Auth::id())->first();
      $tripsMade = $member->trips;
      return view('drivermodule.triplog.driverTripLog', compact('tripsMade'));
    }
}
