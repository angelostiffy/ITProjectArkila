<?php

namespace App\Http\Controllers;

use App\FeesAndDeduction;
use App\Rules\checkCurrency;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = FeesAndDeduction::latest()->where('type','fee')->get();
        return view('fees.index',compact($fees));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            "description" => "unique:fees_and_deductions,description|required|max:30",
            "amount" => ['required',new checkCurrency]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeesAndDeduction $fee)
    {
        $this->validate(request(),[
            "description" => "unique:fees_and_deductions,description,".$fee->fad_id.",fad_id|required|max:30",
            "amount" => ['required',new checkCurrency]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeesAndDeduction $fee)
    {
        $fee->delete();
        return back();
    }
}
