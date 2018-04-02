<?php

namespace App\Http\Controllers\DriverModuleControllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Member;
use App\Trip;


class DriverProfileController extends Controller
{
      public function showDriverProfile()
      {
        $driverId = Auth::id();
        $profile = Member::where('user_id', $driverId)->first();
        $driverTrips = Trip::all();
        $counter = 0;
        foreach($driverTrips as $driverTrip){
          if($driverTrip->driver_id === Auth::id()){
              $counter++;
          }
        }


        return view('drivermodule.profile.driverProfile', compact('profile', 'counter', 'driverId'));

      }

      public function changeNotificationStatus()
      {
          $id = request('id');

          $user = Member::findOrFail($id);
          if($user->notification === "Enable"){
              $user->notification = "Disable";
              $message = ["success" => "You have successfully disabled your notifications"];
          }elseif($user->notification === "Disable"){
              $user->notification = "Enable";
              $message = ["success" => "You have successfully enabled your notifications"];
          }

          $user->save();
          return response()->json($message);
      }

      public function checkCurrentPassword()
      {
        if(Auth::id() == request('id')){

          $checkCurrentPassword = Hash::check(request('current_password'), Auth::user()->password);
          if($checkCurrentPassword){
            return response()->json([
              'success' => $checkCurrentPassword
            ]);
          }else{
            return response()->json([
              'success' => $checkCurrentPassword
            ]);
          }
        }
        return response()->json([
          'message' => 'You do not have access to that account! '
        ]);
      }

      public function updatePassword(User $driverId)
      {
        $checkCurrentPassword = Hash::check(request('current_password'), Auth::user()->password);
        if(!$checkCurrentPassword){
            return redirect('/home/profile')->with('error', 'Password does not match');
        }
        $this->validate(request(), [
            "password" => "required|confirmed",
        ]);

        Auth::user()->password = Hash::make(request('password'));
        Auth::user()->save();
        Auth::logout();
        return redirect('/login')->with('success', 'Successfully changed password');
      }
}
