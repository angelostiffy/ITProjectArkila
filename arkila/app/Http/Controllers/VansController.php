<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Van;

class VansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = Van::latest();
        return view('vans',compact('vans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            "plateNumber" => 'required|between:6,8',
            "model" =>  'required',
            "operatorId" => ['required|numeric', new checkOperator],
            "driverId" => ['numeric', new checkDriver],
            "seatingCapacity" => 'required|between:2,10|numeric'
            ]);

        Van::create(request(['plateNumber','model','operatorId','driverId','seatingCapacity']));
    	session()->flash('message','Van successfully created');
    	return redirect('home/vans');

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
        return view('vans.edit', compact('van'));
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
            "plateNumber" => 'required|between:6,8',
            "model" =>  'required',
            "operatorId" => ['required|numeric', new checkOperator],
            "driverId" => ['numeric', new checkDriver],
            "seatingCapacity" => 'required|between:2,10|numeric'
            ]);
    	$van->update(request(['plateNumber','model','operatorId','driverId','seatingCapacity']));
    	session()->flash('message','Van '.request('plateNumber').'Successfully Edited');
    	return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Van $van)
    {
        $van->destroy();
    	return back();
    }
}
