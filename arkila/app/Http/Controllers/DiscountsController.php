<?php

namespace App\Http\Controllers;
use App\FeesAndDeduction;
use App\Rules\checkCurrency;
use Illuminate\Http\Request;

class DiscountsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.createDiscount');
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
            "type" => "Discount"
        ]);

        return redirect('/home/settings');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FeesAndDeduction $discount)
    {
        return view('settings.editDiscount', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeesAndDeduction $discount)
    {
        $this->validate(request(),[
            "description" => "unique:fees_and_deductions,description,".$discount->fad_id.",fad_id|required|max:30",
            "amount" => ['required',new checkCurrency]
        ]);

        $discount->update(request(["description","amount"]));
        return redirect('/home/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeesAndDeduction $discount)
    {
        $discount->delete();
        return back();
    }
}
