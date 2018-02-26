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
        $drivers = Member::allDrivers()->get();

        return view('drivers.driverList', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Member::allDrivers()->get();
        $operators = Member::allOperators()->get();
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

        $children = array_combine($request->children,$request->childrenBDay);

        $createdDriver = Member::create([
            'last_name'=> $request->lastName,
            'first_name' => $request->firstName,
            'operator_id' => $request->operator,
            'middle_name' => $request->middleName,
            'contact_number' => $request->contactNumber,
            'role' => 'Driver',
            'address' => $request->address,
            'provincial_address' => $request->provincialAddress,
            'birth_date' => $request->birthDate,
            'birth_place' => $request->birthPlace,
            'age' => $request->birthDate,
            'gender' => $request->gender,
            'citizenship' => $request->citizenship,
            'civil_status' => $request->civilStatus,
            'spouse' => $request->nameOfSpouse,
            'spouse_birthdate' => $request->spouseBirthDate,
            'father_name' => $request->fathersName,
            'father_occupation' => $request->fatherOccupation,
            'mother_name' => $request->mothersName,
            'mother_occupation' => $request->motherOccupation,
            'person_in_case_of_emergency' => $request->contactPerson,
            'emergency_address' => $request->contactPersonAddress,
            'emergency_contactno' => $request->contactPersonContactNumber,
            'SSS' => $request->sss,
            'license_number' => $request->licenseNo,
            'expiry_date' => $request->licenseExpiryDate,
            'number_of_children' => sizeof($children)
        ]);

        $createdDriver->addChildren($children);


        return redirect(route('drivers.index'))->with('success', 'Information created successfully');
        //
    }

    public function createFromOperator(Member $operator){
        return view('drivers.create',compact('operator'));
    }

    public function storeFromOperator(Member $operator, DriverRequest $request){

        $children = array_combine($request->children,$request->childrenBDay);

        $operator->drivers()->create([
            'last_name'=> $request->lastName,
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'contact_number' => $request->contactNumber,
            'role' => 'Driver',
            'address' => $request->address,
            'provincial_address' => $request->provincialAddress,
            'birth_date' => $request->birthDate,
            'birth_place' => $request->birthPlace,
            'age' => $request->birthDate,
            'gender' => $request->gender,
            'citizenship' => $request->citizenship,
            'civil_status' => $request->civilStatus,
            'spouse' => $request->nameOfSpouse,
            'spouse_birthdate' => $request->spouseBirthDate,
            'father_name' => $request->fathersName,
            'father_occupation' => $request->fatherOccupation,
            'mother_name' => $request->mothersName,
            'mother_occupation' => $request->motherOccupation,
            'person_in_case_of_emergency' => $request->contactPerson,
            'emergency_address' => $request->contactPersonAddress,
            'emergency_contactno' => $request->contactPersonContactNumber,
            'SSS' => $request->sss,
            'license_number' => $request->licenseNo,
            'expiry_date' => $request->licenseExpiryDate,
            'number_of_children' => sizeof($children)
        ]);
        $operator->addChildren($children);
        return redirect(route('operators.showProfile',[$operator->member_id]));
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
        $operator = Member::allOperators();
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

        $children = array_combine($request->children,$request->childrenBDay);

        $driver->update([
            'last_name'=> $request->lastName,
            'first_name' => $request->firstName,
            'operator_id' => $request->operator,
            'middle_name' => $request->middleName,
            'contact_number' => $request->contactNumber,
            'role' => 'Driver',
            'address' => $request->address,
            'provincial_address' => $request->provincialAddress,
            'birth_date' => $request->birthDate,
            'birth_place' => $request->birthPlace,
            'age' => $request->birthPlace,
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
            'emergency_contactno' => $request->emergencyContactNumber,
            'SSS' => $request->sss,
            'license_number' => $request->driverLicense,
            'expiry_date' => $request->driverLicenseExpiryDate,
            'number_of_children' => sizeof($children)
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
