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
      $tripsMade = $member->trips;
      $user = User::where('user_type','Super-admin')->first();
      $superAdmin = $user->terminal;
      $passengerPerDestination = null;
      $destinations = Transaction::join('destination', 'destination.destination_id', '=', 'transaction.destination_id')
                          ->selectRaw('trip_id as tripid, destination.description as destdesc, COUNT(destination.description) as counts')
                          ->groupBy(['trip_id','destination.description'])->get();

      // $tempArr = null;
      // $counter = 0;
      // foreach($tripsMade as $tripKey => $tripMade){
      //
      //   foreach($destinations as $key => $values){
      //     // if($values->tripid != $tripMade->trip_id){
      //     //       continue;
      //     // }
      //     echo $values->tripid . " " . $values->destdesc . " " . $values->counts . "<br/>";
      //
      //   }
      //
      //   //print_r($tempArr);
      // }
      // dd($tripsMade);
      return view('drivermodule.triplog.driverTripLog', compact('tripsMade', 'superAdmin', 'destinations'));
    }
}
