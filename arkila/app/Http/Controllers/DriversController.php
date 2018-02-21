<?php

namespace App\Http\Controllers;

use Validator;
use App\Driver;
use App\Operator;
use Illuminate\Http\Request;
use App\Http\Requests\DriverRequest;


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
        $drivers = Driver::all();
        $operators = Operator::all();
        return view('drivers.create', compact('drivers','operators'));//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverRequest $request)
    {
        $emContactNumber = '+63'.request('peContactnum');
        $perContactNumber = '+63'.request('contactn');

        Driver::create ([
            'member_id' => $request->member,
            'operator_id' => $request->operator,
            'first_name' => $request->first,
            'last_name' => $request->last,
            'middle_name' => $request->middle,
            'address' => $request->address,
            'contact_number' => $perContactNumber,
            'provincial_address' => $request->paddress,
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
            'emergency_contactno' => $emContactNumber,
            'SSS' => $request->sss,
            'license_number' => $request->licenseNum,
            'expiry_date' => $request->exp,
        ]);

        return redirect('/home/drivers')->with('success', 'Information created successfully');
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
        $operator = Operator::all();
        return view('drivers.edit', compact('driver', 'operator'));
        
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(DriverRequest $request, Driver $driver)
    {

        $emContactNumber = '+63'.request('peContactnum');
        $perContactNumber = '+63'.request('contactn');

        $driver->update([
            'member_id' => $request->member,
            'operator_id' => $request->operator,
            'last_name' => $request->last,
            'first_name' => $request->first,
            'middle_name' => $request->middle,
            'address' => $request->address,
            'contact_number' => $perContactNumber,
            'provincial_address' =>  $request->paddress,
            'age' =>  $request->age,
            'birth_date' =>  $request->birthdate,
            'birth_place' =>  $request->bplace,
            'gender' =>  $request->gender,
            'citizenship' =>  $request->citizenship,
            'civil_status' =>  $request->cstatus,
            'number_of_children' =>  $request->nochild,
            'spouse' =>  $request->spouse,
            'spouse_birthdate' =>  $request->spousebday,
            'father_name' =>  $request->father,
            'father_occupation' =>  $request->fatheroccup,
            'mother_name' =>  $request->mother,
            'mother_occupation' =>  $request->motheroccup,
            'person_in_case_of_emergency' =>  $request->personemergency,
            'emergency_address' =>  $request->peAddress,
            'emergency_contactno' => $emContactNumber,
            'SSS' =>  $request->sss,
            'license_number' =>  $request->licenseNum,
            'expiry_date' =>  $request->exp,

            ]);
        //       

        if($driver){
            return redirect()->route('drivers.show', ['driver' => $driver->driver_id])->with('success', 'Information updated successfully');       
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
        $findDriver = Driver::find($driver->driver_id);
        if($findDriver->delete()){
            return redirect()->route('drivers.index');
        }       //
    }
}
