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
        return view('operators.index', ['operators' => $operators]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operators.viewDriverOperator');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperatorRequest $request)
    {

        $emContactNumber = '+63'.$request->emergencyContactNo;
        $perContactNumber = '+63'.$request->contactNumber;
        Member::create([
            'first_name' => $request->firstName,
            'last_name'=> $request->lastName,
            'middle_name' => $request->middleName,
            'address' => $request->address,
            'contact_number' => $perContactNumber,
            'provincial_address' => $request->provincialAddress,
            'age' => $request->age,
            'birth_date' => $request->birthDate,
            'birth_place' => $request->birthPlace,
            'gender' => $request->gender,
            'citizenship' => $request->citizenship,
            'civil_status' => $request->cStatus,
            'number_of_children' => $request->noChild,
            'spouse' => $request->spouse,
            'spouse_birthdate' => $request->spouseBirthDate,
            'father_name' => $request->father,
            'father_occupation' => $request->fatherOccupation,
            'mother_name' => $request->mother,
            'mother_occupation' => $request->motherOccupation,
            'person_in_case_of_emergency' => $request->pCaseofEmergency,
            'emergency_address' => $request->emergencyAddress,
            'emergency_contactno' => $emContactNumber,
            'SSS' => $request->sssId, 
        ]);
        

        return redirect('/home/operators')->with('success', 'Information created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Member $operator)
    {
        dd($operator);
        $drivers = Member::drivers()->get();
        $vans = $operator->van();
        return view('operators.show',compact('operator', 'drivers', 'vans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $operator)
    {
        return view('operators.edit', compact('operator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Member $operator, OperatorRequest $request)
    {
        // $this->validate(request(),[
        //     'firstName' => 'required|max:35',
        //     'lastName' => 'required|max:35',
        //     'middleName' => 'required|max:35',
        //     'address' => 'required|max:100',
        //     'contactNumber' => 'numeric|digits:10',
        //     'provincialAddress' => 'required|max:100',
        //     'age' => 'required|numeric',
        //     'birthDate' => 'required|date',
        //     'birthPlace' => 'required|max:50',
        //     'gender' => [
        //         'required',
        //         Rule::in(['Male', 'Female'])
        //     ],
        //     'citizenship' => 'required|max:35',
        //     'cStatus' => [
        //         'required',
        //         Rule::in(['Single', 'Married', 'Divorced']) 
        //     ],
        //     'noChild' => 'required|max:3',
        //     'spouse' => 'max:120',
        //     'spouseBirthDate' => 'date',
        //     'father' => 'max:120',
        //     'fatherOccupation' => 'max:50',
        //     'mother' => 'max:120',
        //     'motherOccupation' => 'max:50',
        //     'pCaseofEmergency' => 'required|max:120',
        //     'emergencyAddress' => 'required|max:50',
        //     'emergencyContactNo' => 'required|numeric|digits:10',
        //     'sssId' => 'required',    
        // ]);

        


        $emContactNumber = '+63'.request('emergencyContactNo');
        $perContactNumber = '+63'.request('contactNumber');

        $operator->update([
            'first_name' => $request->firstName,
            'last_name'=> $request->lastName,
            'middle_name' => $request->middleName,
            'address' => $request->address,
            'contact_number' => $perContactNumber,
            'provincial_address' => $request->provincialAddress,
            'age' => $request->age,
            'birth_date' => $request->birthDate,
            'birth_place' => $request->birthPlace,
            'gender' => $request->gender,
            'citizenship' => $request->citizenship,
            'civil_status' => $request->cStatus,
            'number_of_children' => $request->noChild,
            'spouse' => $request->spouse,
            'spouse_birthdate' => $request->spouseBirthDate,
            'father_name' => $request->father,
            'father_occupation' => $request->fatherOccupation,
            'mother_name' => $request->mother,
            'mother_occupation' => $request->motherOccupation,
            'person_in_case_of_emergency' => $request->pCaseofEmergency,
            'emergency_address' => $request->emergencyAddress,
            'emergency_contactno' => $emContactNumber,
            'SSS' => $request->sssId, 
        ]);
             
        if($operator){
            return redirect()->route('operators.show', ['operator' => $operator->operator_id])->with('success', 'Information updated successfully');       
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $operator)
    {
        $findOperator = Operator::find($operator->operator_id);
        if($findOperator->delete()){
            return redirect()->route('operators.index');
        }
        
    }
}
