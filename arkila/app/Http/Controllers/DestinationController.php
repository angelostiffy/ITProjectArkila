<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Destination;
use App\Rules\checkCurrency;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Response;

class DestinationController extends Controller
{

    // protected $rules = 
    // [
    //     "destination" => "unique:destinations,description|required|max:40",
    //     "terminal" => [
    //         'required',
    //         Rule::in(['Cabanatuan City', 'San Jose City']),
    //         'max:40'
    //     ],
    //     "amount" => ['required', new checkCurrency, 'numeric','min:0']
    // ];
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(),[
            "destination" => "unique:destinations,description|required|max:40",
            "terminal" => [
                'required',
                Rule::in(['Cabanatuan City', 'San Jose City']),
                'max:40'
            ],
            "amountDestination" => ['required', new checkCurrency, 'numeric','min:0']
        ]);

        Destination::create([
            "description" => request('destination'),
            "terminal" => request('terminal'),
            "amount" => request('amountDestination')
        ]);

        return redirect('/home/settings');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $destination = request('editDestination');
        // $terminal = request('editTerminal');
        // $amount = request('editAmountDestination');
        // dd(compact('destination', 'terminal', 'amount'));
        // $this->validate(request(),[
        //     "editDes" => "unique:destinations,description,".$destination->destination_id.",destination_id|required|max:40",
        //     "editTerminal" => [
        //         'required',
        //         Rule::in(['Cabanatuan City', 'San Jose City']),
        //         'max:40'
        //     ],
        //     "editAmountDestination" => ['required', new checkCurrency, 'numeric','min:0'],
        // ]);

        // $validator = Validator::make($request->all(), [
        //     "editDes" => "unique:destinations,description,".$destination->destination_id.",destination_id|required|max:40",
        //     "editTerminal" => [
        //         'required',
        //         Rule::in(['Cabanatuan City', 'San Jose City']),
        //         'max:40'
        //     ],
        //     "editAmountDestination" => ['required', new checkCurrency, 'numeric','min:0'],
        // ]);
        // $destination = new Destination;
        $validator = Validator::make($request->all(), [
            "editDes" => "unique:destinations,description,".$id.",destination_id|required|max:40",
            "editTerminal" => [
                'required',
                Rule::in(['Cabanatuan City', 'San Jose City']),
                'max:40'
            ],
            "editAmountDestination" => ['required', new checkCurrency, 'numeric','min:0'],
        ]);
        // dd($validator->fails());
        if($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else{
            $destination = Destination::find($id);
            $destination->description = $request->editDes;
            $destination->terminal = $request->editTerminal;
            $destination->amount = $request->editAmountDestination;
            $destination->save();

            
            
            // $destination->update([
            //     'description' => request('editDes'),
            //     'terminal' => request('editTerminal'),
            //     'amount' => request('editAmountDestination'),
            // ]);

            return response()->json($destination);
        }

        
        // return redirect('/home/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();
        return back();
    }
}
