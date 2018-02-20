<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Van;
use App\Driver;
use App\Operator;
use App\Rules\checkDriver;
use App\Rules\checkOperator;

class VansController extends Controller {

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Operator $operator)
    {
        $drivers = Driver::all()->where('operator_id',$operator);
        return view('vans.create',compact('drivers','operator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Operator $operator)
    {
        $this->validate(request(), [
            "plateNumber" => 'unique:vans,plate_number|required|between:6,8',
            "model" =>  'required',
            "driver" => 'exists:drivers,driver_id|numeric',
            "seatingCapacity" => 'required|between:2,10|numeric'
        ]);

        Van::create([
            'plate_number' => request('plateNumber'),
            'model' => request('model'),
            'operator_id' => $operator,
            'driver_id' => request('driver'),
            'seating_capacity' => request('seatingCapacity')
        ]);

    	session()->flash('message','Van successfully created');
    	return redirect('home/operators/'.$operator);

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
        $drivers = Driver::all()->where('operator_id', $van->operator_id);
        return view('vans.edit', compact('van','drivers','operators'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Van $van)
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
    	return redirect('home/vans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Van $van)
    {
        $van->delete();
    	return back();
    }
}
