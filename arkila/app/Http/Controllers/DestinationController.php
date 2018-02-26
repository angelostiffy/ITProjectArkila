<?php

namespace App\Http\Controllers;

use App\Terminal;
use App\Destination;
use App\Rules\checkCurrency;
use App\Rules\checkTerminal;
use Illuminate\Http\Request;
use Validator;
use Response;

class DestinationController extends Controller
{

    public function create()
    {
        $terminals = Terminal::all();
        return view('settings.createDestination', compact('terminals'));
    }

    public function store()
    {
        $this->validate(request(),[
            "addDestination" => "unique:destination,description|required|max:40",
            "addDestinationTerminal" => ['required', new checkTerminal, 'max:40'],
            "addDestinationFare" => ['required', new checkCurrency, 'numeric','min:0']
        ]);


        Destination::create([
            "terminal_id" => request('addDestinationTerminal'),
            "description" => request('addDestination'),
            "amount" => request('addDestinationFare')
        ]);

        return redirect('/home/settings');
    }
    
    public function edit(Destination $destination)
    {
        return view('settings.editDestination', compact('destination'));
    }

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

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return back();
    }
}
