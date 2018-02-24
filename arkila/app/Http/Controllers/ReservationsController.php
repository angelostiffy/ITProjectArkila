<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\checkCurrency;
use App\Reservation;
use App\Destination;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reservations = Reservation::all();
        $destinations = Destination::all();
        return view('reservations.index', compact('reservations', 'destinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
       $validation =  $this->validate(request(),[
            "name" => "required|max:50|min:10",
            "departure_date" => "required|date",
            "destination_id" => "required|numeric|min:1",
            "number_of_seats" => "required|numeric|max:15",
            "contact_number" => "numeric|digits:10",
            "amount" => ['required',new checkCurrency,'numeric','min:0'],
        ]);
        dd($validation->fails());
        if ($validation->fails())
        {
            alert('WOW');
        }

        $seat = request('seat');
        $amount = 100*$seat;

        $perContactNumber = '+63'.request('contact');

        Reservation::create([
            'name' => request('name'),
            'departure_date' => request('date'),
            'departure_time' => request('time'),
            'destination_id' => request('dest'),
            'number_of_seats' => request('seat'),
            'contact_number' => $perContactNumber,
            'amount' => $amount,
            'type' => request('type'),

        ]);
        return redirect('/home/reservations')->with('success', 'Information created successfully');

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
    public function update(Reservation $reservation)
    {
        //
        $reservation->update([

            'status' => request('butt'),
        ]);

        return redirect()->back()->with('message', 'Reservation marked '. request('butt'));
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
