<?php

namespace App\Http\Controllers;

use App\Terminal;
use App\Ticket;

class TicketsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $terminals = Terminal::all();
        return view('settings.createTicket',compact('terminals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        $this->validate(request(),[
            "description" => "required|max:5",
            'terminal' => "required| exists:terminal,terminal_id"
        ]);

        Ticket::create([
            'ticket_number' => request('description'),
            'terminal_id' => request('terminal'),
            'isAvailable' => 1
        ]);

        return redirect(route('settings.index'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $terminals = Terminal::all();
        return view('settings.editTicket',compact('ticket','terminals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Ticket $ticket)
    {

        $this->validate(request(),[
            "description" => "required|max:5",
            'terminal' => "required| exists:terminal,terminal_id"
        ]);

        $ticket->update([
            'ticket_number' => request('description'),
            'terminal_id' => request('terminal'),
            'isAvailable' => 1
        ]);

        return redirect(route('settings.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return back();
    }
}
