<?php

namespace App\Http\Controllers;

use App\Terminal;
use App\Destination;
use App\Rules\checkCurrency;
use App\Rules\checkTerminal;
use Illuminate\Http\Request;
use Validator;
use Response;

class DestinationController extends Controller
{

    public function create()
    {
        $terminals = Terminal::all();
        return view('settings.createDestination', compact('terminals'));
    }

    public function store()
    {
        $this->validate(request(),[
            "addDestination" => "unique:destination,description|required|max:40",
            "addDestinationTerminal" => ['required', new checkTerminal, 'max:40'],
            "addDestinationFare" => ['required', new checkCurrency, 'numeric','min:1']
        ]);


        Destination::create([
            "terminal_id" => request('addDestinationTerminal'),
            "description" => request('addDestination'),
            "amount" => request('addDestinationFare')
        ]);

        session()->flash('message', 'Destination created successfully');
        return redirect('/home/settings');
    }
    
    public function edit(Destination $destination)
    {
        return view('settings.editDestination', compact('destination'));
    }

    public function update(Destination $destination)
    {
        $this->validate(request(),[
            "editDestinationFare" => ['required', new checkCurrency, 'numeric','min:0'],
        ]);
            
        $destination->update([
            'amount' => request('editDestinationFare'),
        ]);

        session()->flash('message','Destination updated successfully');
        return redirect('/home/settings');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();
        session()->flash('message', 'Destination created successfully');
        return back();
    }
}
