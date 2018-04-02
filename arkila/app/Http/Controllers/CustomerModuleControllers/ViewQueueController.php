<?php

namespace App\Http\Controllers\CustomerModuleControllers;

use App\Trip;
use App\Terminal;
use App\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewQueueController extends Controller
{
    public function showVanQueue()
    {
    	$terminals = Terminal::all();
    	$farelist = Destination::all();
    	$trips = Trip::where('queue_number', 1)->get();
    	return view('customermodule.user.indexFairListAndTrips', compact('terminals', 'farelist', 'trips'));
    }
}
