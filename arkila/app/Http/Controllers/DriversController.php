<?php

namespace App\Http\Controllers;

use App\Member;
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
        $drivers = Member::drivers()->get();

        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Member::drivers()->get();
        $operators = Member::operators()->get();
        return view('drivers.create', compact('drivers','operators'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverRequest $request)
    {
        $emContactNumber = '+63'.$request->emergencyContactNumber;
        $perContactNumber = '+63'.$request->contactNumber;
        $children = array_combine($request->children,$request->ChildrenBDay);

        $createdDriver = Member::create([
            'last_name'=> $request->lastName,
            'first_name' => $request->firstName,
            'operator_id' => $request->operator,
            'middle_name' => $request->middleName,
            'contact_number' => $perContactNumber,
            'role' => 'Operator',
            'address' => $request->address,
            'provincial_address' => $request->provincialAddress,
            'birth_date' => $request->birthDate,
            'birth_place' => $request->birthPlace,
            'age' => $request->age,
            'gender' => $request->gender,
            'citizenship' => $request->citizenship,
            'civil_status' => $request->civilStatus,
            'number_of_children' => $request->noChild,//
            'spouse' => $request->spouse,
            'spouse_birthdate' => $request->spouseBirthDate,
            'father_name' => $request->fathersName,
            'father_occupation' => $request->fatherOccupation,
            'mother_name' => $request->mothersName,
            'mother_occupation' => $request->motherOccupation,
            'person_in_case_of_emergency' => $request->personInCaseOfEmergency,
            'emergency_address' => $request->emergencyAddress,
            'emergency_contactno' => $emContactNumber,
            'SSS' => $request->sss,
            'license_number' => $request->driverLicense,
            'expiry_date' => $request->driverLicenseExpiryDate,
        ]);

        $createdDriver->addChildren($children);


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

        $emContactNumber = '+63'.$request->emergencyContactNumber;
        $perContactNumber = '+63'.$request->contactNumber;
        $children = array_combine($request->children,$request->ChildrenBDay);

        $driver->update([
            'last_name'=> $request->lastName,
            'first_name' => $request->firstName,
            'operator_id' => $request->operator,
            'middle_name' => $request->middleName,
            'contact_number' => $perContactNumber,
            'role' => 'Operator',
            'address' => $request->address,
            'provincial_address' => $request->provincialAddress,
            'birth_date' => $request->birthDate,
            'birth_place' => $request->birthPlace,
            'age' => $request->age,
            'gender' => $request->gender,
            'citizenship' => $request->citizenship,
            'civil_status' => $request->civilStatus,
            'number_of_children' => $request->noChild,//
            'spouse' => $request->spouse,
            'spouse_birthdate' => $request->spouseBirthDate,
            'father_name' => $request->fathersName,
            'father_occupation' => $request->fatherOccupation,
            'mother_name' => $request->mothersName,
            'mother_occupation' => $request->motherOccupation,
            'person_in_case_of_emergency' => $request->personInCaseOfEmergency,
            'emergency_address' => $request->emergencyAddress,
            'emergency_contactno' => $emContactNumber,
            'SSS' => $request->sss,
            'license_number' => $request->driverLicense,
            'expiry_date' => $request->driverLicenseExpiryDate,
        ]);

        $driver->children()->delete();
        $driver->addChildren($children);

        return redirect()->route('drivers.show',compact('driver'))->with('success', 'Information updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $driver)
    {
        $driver->delete();
        return back();

    }
}
