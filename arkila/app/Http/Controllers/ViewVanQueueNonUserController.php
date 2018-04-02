<?php

namespace App\Http\Controllers;

use App\Trip;
use App\Terminal;
use App\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewVanQueueNonUserController extends Controller
{
    public function showQueue()
    {
    	$terminals = Terminal::all();
    	$farelist = Destination::all();
    	$trips = Trip::where('queue_number', 1)->get();

    	return view('customermodule.non-user.indexFairListAndTrips', compact('terminals', 'farelist', 'trips'));
    }
}
