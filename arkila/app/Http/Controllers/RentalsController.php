<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rental;
use App\Van;
use App\Http\Requests\RentalRequest;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rentals = Rental::all();
        $vans = Van::all();
        return view('rental.index', compact('vans', 'rentals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vans = Van::all();
        return view('rental.create', compact('vans'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RentalRequest $request)
    {
        $perContactNumber = '+63'.request('contactNumber');

        Rental::create([
            'last_name' => $request->lastName,
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'plate_number' => $request->model,
            'departure_date' => $request->date,
            'departure_time' => $request->time,
            'destination' => $request->destination,
            'number_of_days' => $request->days,
            'contact_number' => $perContactNumber,
            'rent_type' => 'Walk-in',
            'status' => 'Paid',
    
        ]);
        session()->flash('message', 'Rental was created successfully');
    
        return redirect('/home/rental/create');

    }    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show(Request $request)
    {

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
    public function update(Rental $rental)
    {
        $rental->update([
            'status' => request('click'),
        ]);

        return redirect()->back()->with('message', 'Rental request marked '. request('click'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental $rental)
    {
        $rental->delete();
        return back()->with('message', 'Successfully Deleted');

    }
}
