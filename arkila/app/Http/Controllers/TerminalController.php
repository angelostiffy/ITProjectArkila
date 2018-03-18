<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terminal;
use App\Rules\checkCurrency;
class TerminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.createTerminal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(),[
            "addTerminalName" => "unique:terminal,description|regex:/^[\pL\s\-]+$/u|required|max:40",
            "bookingFee" => [new checkCurrency, "numeric", "required","min:1","max:5000"],
        ]);

        Terminal::create([
            "description" => request('addTerminalName'),
            "booking_fee" => request('bookingFee'),
        ]);

        session()->flash('message', 'Terminal created successfully');
        return redirect('/home/settings');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Terminal $terminal)
    {
        return view('settings.editTerminal', compact('terminal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Terminal $terminal)
    {
        $this->validate(request(),[
            "editTerminalName" => 'regex:/^[\pL\s\-]+$/u|max:40',
            "editBookingFee" => [new checkCurrency, "numeric", "required","min:1","max:5000"],
            ]);

        $terminal->update([
            'description' => request('editTerminalName'),
            'booking_fee' => request('editBookingFee'),
        ]);

        session()->flash('message', 'Terminal updated successfully');
        return redirect('/home/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terminal $terminal)
    {
        $terminal->delete();
        session()->flash('message', 'Terminal deleted successfully');
        return back();
    }
}
