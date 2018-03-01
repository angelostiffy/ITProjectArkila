<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\checkUserName;
use App\Rules\checkEmail;
use App\Rules\checkTerminal;
use App\Terminal;
use App\User;

class AdminUserManagementController extends Controller
{
    
    public function index()
    {
        return view('admin.editProfile'));
    }

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
        $user = User::where('id', $id)->admin()->get();
        return view('usermanagement.editAdmin', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus()
    {

    }
}
