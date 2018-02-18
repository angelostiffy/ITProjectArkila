<?php

namespace App\Http\Controllers;

use App\FeesAndDeduction;
use App\Rules\checkCurrency;
use Illuminate\Http\Request;

class FeesController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.createFees');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(),[
            "description" => "unique:fees_and_deductions,description|required|max:30",
            "amount" => ['required',new checkCurrency,'numeric','min:0']
        ]);

        FeesAndDeduction::create([
            "description" => request('description'),
            "amount" =>request('amount'),
            "type" => "Fee"
        ]);

        return redirect('/home/settings');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FeesAndDeduction $fee)
    {
        return view('settings.editFees',compact('fee'));
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

        $fee->update(request(["description","amount"]));
        return redirect('/home/settings');
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
