<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\checkUserName;
use App\Rules\checkTerminal;
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
            "userName" => "required|max:15",
            "fullName" => "required|max:50",
            "userEmail" => "email",
            "password" => "required|confirmed",
            "addUserTerminal" => ['required', new checkTerminal, 'max:40']
        ]);

        User::create([
            'username' => request('userName'),
            'name' => request('fullName'),
            'email' => request('userEmail'),
            'password' => Hash::make(request('password')),
            'terminal_id' => request('addUserTerminal'),
            'user_type' => "Admin"
        ]);

        session()->flash('message', 'Successfully added new Admin');

        return redirect('/home/user-management');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
