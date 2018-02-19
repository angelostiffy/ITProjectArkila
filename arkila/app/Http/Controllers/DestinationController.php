<?php

namespace App\Http\Controllers;

use App\Destination;
use App\Rules\checkCurrency;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DestinationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(),[
            "destination" => "unique:destinations,description|required|max:40",
            "terminal" => [
                'required',
                Rule::in(['Cabanatuan City', 'San Jose City']),
                'max:40'
            ],
            "amount" => ['required', new checkCurrency, 'numeric','min:0']
        ]);

        Destination::create([
            "description" => request('destination'),
            "terminal" => request('terminal'),
            "amount" => request('amount')
        ]);

        return redirect('/home/settings');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Destination $destination)
    {
        $this->validate(request(),[
            "destination" => "unique:destinations,description,".$destination->destination_id.",destination_id|required|max:40",
            "terminal" => [
                'required',
                Rule::in(['Cabanatuan City', 'San Jose City']),
                'max:40'
            ],
            "amount" => ['required', new checkCurrency, 'numeric','min:0']
        ]);

        $destination->update([
            'description' => request('destination'),
            'terminal' => request('terminal'),
            'amount' => request('amount'),
        ]);
        return redirect('/home/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();
        return back();
    }
}
