<?php

namespace App\Http\Controllers;

use App\Member;
use App\Http\Requests\OperatorRequest;

class OperatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operators = Member::operators()->get();
        return view('operators.index', compact('operators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OperatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperatorRequest $request)
    {

        $children = array_combine($request->children,$request->childrenBDay);

        $createdOperator = Member::create([
            'last_name'=> $request->lastName,
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'contact_number' => $request->contactNumber,
            'role' => 'Operator',
            'address' => $request->address,
            'provincial_address' => $request->provincialAddress,
            'birth_date' => $request->birthDate,
            'birth_place' => $request->birthPlace,
            'age' => $request->birthDate,
            'gender' => $request->gender,
            'citizenship' => $request->citizenship,
            'civil_status' => $request->civilStatus,
            'number_of_children' => $request->noChild,//
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
        ]);

        $createdOperator->addChildren($children);
        return redirect('/home/operators')->with('success', 'Information created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  Member  $operator
     * @return \Illuminate\Http\Response
     */
    public function show(Member $operator){
        $children = $operator->children()->get();
        return view('operatos.show',compact('operator','children'));
    }

    public function showProfile(Member $operator)
    {
        $drivers = Member::drivers()->where('operator_id',$operator->member_id)->get();
        $vans = $operator->van();
        return view('operators.showProfile',compact('operator', 'drivers', 'vans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Member $operator
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $operator)
    {
        return view('operators.edit', compact('operator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  OperatorRequest  $request
     * @param  Member  $operator
     * @return \Illuminate\Http\Response
     */
    public function update(Member $operator, OperatorRequest $request)
    {

        $children = array_combine($request->children,$request->ChildrenBDay);

        $operator->update([
            'last_name'=> $request->lastName,
            'first_name' => $request->firstName,
            'operator_id' => $request->operator,
            'middle_name' => $request->middleName,
            'contact_number' => $request->contactNumber,
            'role' => 'Operator',
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
        ]);
        $operator->children()->delete();
        $operator->addChildren($children);

        return redirect()->route('operators.show', compact('operator'))->with('success', 'Information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Member  $operator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $operator)
    {
        $operator->drivers()->update(['operator_id'=>null]);
        $operator->delete();
        return redirect()->route('operators.index');
    }
}
