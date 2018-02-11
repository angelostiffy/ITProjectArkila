<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();

        return view('drivers.index', ['drivers' => $drivers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newDriver = [
            'first_name' => $request->first,
            'last_name' => $request->last,
            'middle_name' => $request->middle,
            'address' => $request->address,
            'contact_number' => $request->contactn,
            'provincial_address' => $request->paddress,
            'age' => $request->age,
            'birth_date' => $request->birthdate,
            'birth_place' => $request->bplace,
            'gender' => $request->gender,
            'citizenship' => $request->citizenship,
            'civil_status' => $request->cstatus,
            'number_of_children' => $request->nochild,
            'spouse' => $request->spouse,
            'spouse_birthdate' => $request->spousebday,
            'father_name' => $request->father,
            'father_occupation' => $request->fatheroccup,
            'mother_name' => $request->mother,
            'mother_occupation' => $request->motheroccup,
            'person_in_case_of_emergency' => $request->personemergency,
            'emergency_address' => $request->peAddress,
            'emergency_contactno' => $request->peContactnum,
            'SSS' => $request->sss,
            'license_number' => $request->licenseNum,
            'expiry_date' => $request->exp,
        ];

        $save = Driver::insert($newDriver);

        if($save)
            return redirect('/home/drivers');

        else
            return redirect()->back->withInput();
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {

        
        return view('drivers.show',compact('driver'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {        
        return view('drivers.edit', compact('driver'));
        
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $driverUpdate = Driver::where('driver_id', $driver->driver_id)
        ->update([
            'driver_id' => $request->input('id'),
            'last_name' => $request->input('driver-lastname'),
            'first_name' => $request->input('driver-firstname'),
            'middle_name' => $request->input('driver-middlename'),
            'address' => $request->input('driver-address'),
            'status' => $request->input('driver-status'),

            ]);
        //
        if ($driverUpdate) {
            return redirect('/home/drivers');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
