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
        $terminals = Terminal::all();
        $destinations = Destination::all();
        $trips = Trip::whereNotNull('queue_number')->orderBy('queue_number')->get();

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


        ;
        return view('trips.queue', compact('terminals','trips','vans','destinations','drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Destination $destination, Van $van, Member $member )
    {
        if( is_null(Trip::where('destination_id',$destination->destination_id)
            ->where('plate_number',$van->plate_number)
            ->whereNotNull('queue_number')->first()) ){
            $queueNumber = Trip::where('destination_id',$destination->destination_id)->count();

            Trip::create([
                'destination_id' => $destination->destination_id,
                'plate_number' => $van->plate_number,
                'driver_id' => $member->member_id,
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
    public function updateRemarks(Trip $trip)
    {
        $this->validate(request(),[
            'remarks' => [Rule::in('OB','CC','ER')]
        ]);

        $trip->update([request('remarks')]);

        return "Success";
    }

    public function updateDestination(Trip $trip, Destination $destination){
        $trip->update([
            'destination_id' => 'destination'
        ]);
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
        if(is_array($vans)) {
            foreach($vans[0] as $key => $vanInfo){
                if($van = Van::find($vanInfo['plate'])){
                   $van->updateQueue($key);
                }
            }
            return "Updated";
        }
        else{
            return "Operator Not Found";
        }


    }
}
