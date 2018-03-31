<?php

namespace App\Http\Controllers\DriverModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\Trip;
use App\Member;
use App\User;
class TripLogController extends Controller
{
    public function viewTripLog()
    {
      //$trips = Trip::where('driver_id', Auth::id())->get();
      $member = Member::where('user_id', Auth::id())->first();
      $tripsMade = $member;
      $user = User::where('user_type','Super-admin')->first();
      $superAdmin = $user->terminal;
      return view('drivermodule.triplog.driverTripLog', compact('tripsMade', 'superAdmin', 'destinations'));
    }

    public function viewSpecificTrip(Trip $trip)
    {
      $user = User::where('user_type','Super-admin')->first();
      $superAdmin = $user->terminal;
      $destinations = Transaction::join('destination', 'destination.destination_id', '=', 'transaction.destination_id')->join('trip', 'trip.trip_id', '=', 'transaction.trip_id')->where('transaction.trip_id', $trip->trip_id)->selectRaw('transaction.trip_id as tripid, destination.description as destdesc, COUNT(destination.description) as counts')->groupBy(['transaction.trip_id','destination.description'])->get();
      return view('drivermodule.triplog.driverTripDetails', compact('superAdmin', 'destinations', 'trip'));
    }
}
