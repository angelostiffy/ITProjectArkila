<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Rules\checkUserName;
use App\Rules\checkTerminal;
use App\Rules\checkEmail;
use App\Mail\ResetPasswordMail;
use App\Terminal;
use App\User;

class AdminUserManagementController extends Controller
{

    public function create()
    {
         $terminals = Terminal::all();
         return view('usermanagement.addAdmin', compact('terminals'));
    }


    public function store()
    {
        $this->validate(request(), [

            "fullName" => "required|max:50",
            "userName" => ['required',new checkUserName, 'max:15'],

            "userEmail" => "email|unique:users,email",
            "password" => "required|confirmed",
            "addUserTerminal" => ['required', new checkTerminal, 'max:40']
        ]);

        User::create([
            'username' => request('userName'),
            'name' => request('fullName'),
            'email' => request('userEmail'),
            'password' => Hash::make(request('password')),
            'terminal_id' => request('addUserTerminal'),
            'user_type' => 'Admin',
        ]);

        session()->flash('message', 'Successfully added new Admin');

        return redirect('/home/user-management');
    }

    
    public function edit($id)
    {
        $user = User::where('id', $id)->admin()->first();
        return view('usermanagement.editAdmin', compact('user'));
    }

    
    public function update(Request $request, $id)
    {
        //dd($user->id);
        $user = User::find($id);
        $user->password = Hash::make(str_random(8));
        $user->save();

        Mail::to('932a782243-eb8d48@inbox.mailtrap.io')->send(new ResetPasswordMail);

        session()->flash('message', 'Reset Password Successful! A Reset Password Link Has Been Sent to the User.');
        return redirect('/home/user-management'); 
    }

    

    public function changeStatus()
    {
        $id = Input::get('id');

        $user = User::findOrFail($id);
        if($user->status === "enable"){
            $user->status = "disable";
            session()->flash('message', 'User successfully enabled!');
        }elseif($user->status === "disable"){
            $user->status = "enable";

            session()->flash('message', 'User successfully disabled!');
        }
        
        $user->save();
        return response()->json($user); 
    }
}
