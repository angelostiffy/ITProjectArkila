<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ledger;
use App\Rules\checkName;
use App\Rules\checkCurrency;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LedgersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ledgers = Ledger::all();
        return view('ledger.index', compact('ledgers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ledger.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate(request(), [
            'payor' => ['bail', new checkName, 'required', 'max:25'],
            'particulars' => 'bail|required|max:30',
            'or' =>  'bail|required|unique:ledger,or_number|max:15',
            'amount' => ['bail',new checkCurrency,'numeric','min:0'],
            'type' => [
                'bail',
                'required',
                Rule::in(['Revenue', 'Expense'])
            ],
        ]);

        Ledger::create([
            'payee' => $request->payor,
            'description' => $request->particulars,
            'or_number' => $request->or,
            'amount' => $request->amount,
            'type' => $request->type,    
        ]);

        return redirect('/home/ledger');
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
    public function edit(Ledger $ledger)
    {
        return view('ledger.edit', compact('ledger'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Ledger $ledger)
    {
        $this->validate(request(), [
            'payor' => ['bail', new checkName, 'required', 'max:25'],
            'particulars' => 'bail|required|max:30',
            'or' =>  'bail|required|max:15|unique:ledger,or_number,'.$ledger->ledger_id.',ledger_id',
            'amount' => ['bail',new checkCurrency,'numeric','min:0'],
            'type' => [
                'bail',
                'required',
                Rule::in(['Revenue', 'Expense'])
            ],
        ]);
        
        $ledger->update([
            'payee' => request('payor'),
            'description' => request('particulars'),
            'or_number' => request('or'),
            'amount' => request('amount'),
            'type' => request('r1'), 
        ]);

        return redirect('/home/ledger');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ledger $ledger)
    {
        $ledger->delete();
        return back();
    }
}
