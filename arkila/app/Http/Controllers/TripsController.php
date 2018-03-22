<?php

namespace App\Http\Controllers;

use App\Trip;
use App\Van;
use App\Destination;
use App\Member;
use App\Terminal;
use Illuminate\Validation\Rule;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terminals = Terminal::whereNotIn('terminal_id',[auth()->user()->terminal_id])->get();
        $trips = Trip::whereNotNull('queue_number')
            ->orderBy('queue_number')->get();

        $drivers = Member::whereNotIn('member_id', function($query){
            $query->select('driver_id')
                ->from('trip')
                ->whereNotNull('queue_number');
        })->get();

        $vans = Van::whereNotIn('plate_number', function($query){
            $query->select('plate_number')
                ->from('trip')
                ->whereNotNull('queue_number');
        })->get();


        return view('trips.queue', compact('terminals','trips','vans','destinations','drivers'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Terminal $destination, Van $van, Member $member )
    {
        if( is_null(Trip::where('terminal_id',$destination->terminal_id)
            ->where('plate_number',$van->plate_number)
            ->whereNotNull('queue_number')->first()) ){
            $queueNumber = Trip::where('terminal_id',$destination->terminal_id)
                ->whereNotNull('queue_number')
                    ->count()+1;

            Trip::create([
                'terminal_id' => $destination->terminal_id,
                'plate_number' => $van->plate_number,
                'driver_id' => $member->member_id,
                'remarks' => NULL,
                'queue_number' => $queueNumber
            ]);
            session()->flash('success', 'Van Succesfully Added to the queue');
            return 'success';
        }
        else{
            session()->flash('error', 'Van is already on the Queue');
            return 'Van is already on the Queue';
        }

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRemarks(Trip $trip)
    {
        $this->validate(request(),[
            'value' => [Rule::in('OB','CC','ER', "NULL")]
        ]);

        $trip->update([
            'remarks' => request('value')
        ]);

        return "Success";
    }

    public function updateDestination(Trip $trip){
        $this->validate(request(),[
            'destination' => 'required|exists:terminal,terminal_id'
        ]);

        $queueNum = count(Trip::where('terminal_id',request('destination'))->whereNotNull('queue_number')->get())+1;
        $trips =Trip::where('terminal_id',$trip->terminal_id)->whereNotNull('queue_number')->get();

        foreach( $trips as $tripObj){
            if($trip->trip_id == $tripObj->trip_id || $tripObj->queue_number < $trip->queue_number ){
                continue;
            }else{
                $tripObj->update([
                    'queue_number' => ($tripObj->queue_number)-1
                ]);
            }
        }

        $trip->update([
            'terminal_id' => request('destination'),
            'queue_number' => $queueNum
        ]);

        return back();
    }

    public function updateQueueNumber(Trip $trip){
        $tripsArr = [];
        $trips = Trip::whereNotNull('queue_number')->orderBy('queue_number')->get();


        $beingTransferredKey = $trip->queue_number;
        $beingReplacedKey = request('value');


        $beingTransferredVal = $trip->trip_id;
        $beingReplacedVal = Trip::where('queue_number',request('value'))->first()->trip_id;

        $tripsCount = Trip::whereNotNull('queue_number')->count();

        $this->validate(request(),[
            'value' => 'required|digits_between:1,'.$tripsCount,
        ]);

        for($i = 0,$n = 1; $i < count($trips) ; $i++,$n++){
            $tripsArr[$n] =  $trips[$i]->trip_id;
        }


        $tripsArr[$beingReplacedKey] = $beingTransferredVal;


        if($beingTransferredKey > $beingReplacedKey){

            $beingReplacedKey += 1;

            for($i = $beingReplacedKey; $i<= $beingTransferredKey; $i++)
            {
                    $beingTransferredVal =  $tripsArr[$i];
                    $tripsArr[$i] = $beingReplacedVal;
                    $beingReplacedVal = $beingTransferredVal;

            }

            foreach($tripsArr as $queueNum => $tripId){
                $trip = Trip::find($tripId);

                $trip->update([
                    'queue_number' => $queueNum
                ]);
            }

        }else{

            $beingReplacedKey -= 1;


            for($i = $beingReplacedKey; $i>= $beingTransferredKey; $i--) {
                    $beingTransferredVal = $tripsArr[$i];
                    $tripsArr[$i] = $beingReplacedVal;
                    $beingReplacedVal = $beingTransferredVal;


            }

            foreach($tripsArr as $queueNum => $tripId){
                $trip = Trip::find($tripId);

                $trip->update([
                    'queue_number' => $queueNum
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();

        session()->flash('success', 'Trip Successfully Deleted');
        return back();
    }

    public function updateVanQueue(){
        $vans = request('vanQueue');
        $tripArr = [];
        if(is_array($vans)) {
            foreach($vans[0] as $key => $vanInfo){
                if($van = Van::find($vanInfo['plate'])){
                   $van->updateQueue($key);
                }
            }

            $trips = Trip::whereNotNull('queue_number')->orderBy('queue_number')->get();

            foreach($trips as $trip){
                array_push($tripArr,
                    [
                        'trip_id' =>$trip->trip_id,
                       'plate_number' => $trip->plate_number,
                       'queue_number' => $trip->queue_number
                    ]);
            }
            return response()->json($tripArr);
        }
        else{
            return "Operator Not Found";
        }


    }

}
