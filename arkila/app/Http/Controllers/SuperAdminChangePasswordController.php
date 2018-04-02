<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SuperAdminChangePasswordController extends Controller
{
    public function viewAccountSettings()
    {
      $superAdminid = Auth::id();
      return view('changepassword.index', compact('superAdminid'));
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

    public function updatePassword(User $superAdminid)
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
