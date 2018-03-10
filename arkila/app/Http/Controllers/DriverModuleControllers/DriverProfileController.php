<?php

namespace App\Http\Controllers\DriverModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use App\Trip;
use Illuminate\Support\Facades\Auth;

class DriverProfileController extends Controller
{
      public function showDriverProfile()
      {
        $profile = Member::find(Auth::id());
        $driverTrips = Trip::all();
        $counter = 0;
        foreach($driverTrips as $driverTrip){
          if($driverTrip->driver_id === Auth::id()){
              $counter++;
          }
        }

        return view('drivermodule.profile.driverProfile', compact('profile', 'counter'));
      }

      public function changeNotificationStatus()
      {
          $id = request('id');

          $user = Member::findOrFail($id);
          if($user->notification === "Enable"){
              $user->status = "Disable";
              session()->flash('message', 'User successfully enabled!');
          }elseif($user->notification === "Disable"){
              $user->status = "Enable";

              session()->flash('message', 'User successfully disabled!');
          }

          $user->save();
          return response()->json($user);
      }

      public function updatePassword(Request $request)
      {
          dd($request);
      }
}
