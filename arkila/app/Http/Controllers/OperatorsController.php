<?php

namespace App\Http\Controllers;

use App\Operator;
use Illuminate\Http\Request;

class OperatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operators = Operator::all();
        return view('operators.index', ['operators' => $operators]); 
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newOperator = [
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'middle_name' => $request->middleName,
            'address' => $request->address,
            'contact_number' => $request->contactNumber,
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
            'emergency_contactno' => $request->emergencyContactNo,
            'SSS' => $request->sssId,
        ];

        $save = Operator::insert($newOperator);
         if($save){
            return redirect('/home/operators');
         }else{
            return redirect()->back->withInput();
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Operator $operator)
    {
        return view('operators.show',compact('operator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Operator $operator)
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
    public function update(Request $request, Operator $operator)
    {
        $operatorUpdate = Operator::where('operator_id', $operator->operator_id)
        ->update([
            'first_name' => $request->input('firstName'),
            'middle_name' => $request->input('middleName'),
            'last_name' => $request->input('lastName'),
            'contact_number' => $request->input('contactNumber'),
            'address' => $request->input('address'),
            'provincial_address' => $request->input('provincialAddress'),
            'age' => $request->input('age'),
            'birth_date' => $request->input('birthDate'),
            'birth_place' => $request->input('birthPlace'),
            'gender' => $request->input('gender'),
            'citizenship' => $request->input('citizenship'),
            'civil_status' => $request->input('cStatus'),
            'number_of_children' => $request->input('noChild'),
            'spouse' => $request->input('spouse'),
            'spouse_birthdate' => $request->input('spouseBirthDate'),
            'father_name' => $request->input('father'),
            'father_occupation' => $request->input('fatherOccupation'),
            'mother_name' => $request->input('mother'),
            'mother_occupation' => $request->input('motherOccupation'),
            'person_in_case_of_emergency' => $request->input('pCaseofEmergency'),
            'emergency_address' => $request->input('emergencyAddress'),
            'emergency_contactno' => $request->input('emergencyContactNo'),
            'SSS' => $request->input('sssId'),
        ]);

        if($operatorUpdate){
            return redirect()->route('operators.show', ['operator' => $operator->operator_id]);       
        }
        return back()->withinput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operator $operator)
    {
        $findOperator = Operator::find($operator->operator_id);
        if($findOperator->delete()){
            return redirect()->route('operators.index');
        }
        
    }
}
