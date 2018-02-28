<?php

namespace App\Http\Controllers;

use App\Van;
use App\Member;

class VansController extends Controller {


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = Van::all();
        return view('vans.oldvan.vanList', compact('vans'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFromOperator(Member $operator)
    {
        $drivers = $operator->drivers()
            ->whereNotIn('member_id', function($query){
        $query->select('member_id')
            ->from('member_van');
        })->get();

        return view('vans.create',compact('drivers','operator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromOperator(Member $operator)
    {
        $this->validate(request(), [
            "driver" => 'exists:member|unique:member_van,member_id',
            "plateNumber" => 'unique:vans,plate_number|required|between:6,8',
            "model" =>  'required',
            "seatingCapacity" => 'required|between:2,10|numeric'
        ]);


        $van = Van::create([
            'plate_number' => request('plateNumber'),
            'model' => request('model'),
            'seating_capacity' => request('seatingCapacity')
        ]);

        $van->member()->attach($operator->member_id);
        $van->member()->attach(request('driver'));

    	session()->flash('message','Van successfully created');
    	return redirect(route('operators.show',[$operator->member_id]));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Van $van)
    {
        return view('vans.show', compact('van'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Van $van)
    {

        return view('vans.edit', compact('van','drivers','operators'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Member $van)
    {
        $this->validate(request(), [
            "plateNumber" => 'unique:vans,plate_number,'.$van->plate_number.',plate_number|required|between:6,8',
            "model" =>  'required',
            "operator" => 'exists:operators,operator_id|required|numeric',
            "driver" => 'exists:drivers,driver_id|numeric',
            "seatingCapacity" => 'required|between:2,10|numeric'
        ]);

        $van->update([
            'plate_number' => request('plateNumber'),
            'model' => request('model'),
            'operator_id' => request('operator'),
            'driver_id' => request('driver'),
            'seating_capacity' => request('seatingCapacity')
        ]);

    	session()->flash('message','Van '.request('plateNumber').'Successfully Edited');
    	return redirect(route('vans.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $van)
    {
        $van->detach();
        $van->delete();
    	return back();
    }
}
