<?php

namespace App\Http\Controllers\DriverModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Trip;
use App\Member;
class ViewVanQueueController extends Controller
{
    public function showVanQueue()
    {
      $trips = Trip::join('member', 'trip.driver_id', '=', 'member.member_id')
                    ->join('terminal', 'trip.terminal_id', '=', 'terminal.terminal_id')
                    ->join('van', 'trip.plate_number', '=', 'van.plate_number')
                    ->where('member.operator_id', '=', null)
                    ->where('member.role', '=', 'Driver')
                    ->where('trip.status', '<>', 'Departed')
                    ->orderBy('trip.created_at','asc')
                    ->select('trip.trip_id as trip_id', 'trip.queue_number as queueId', 'trip.plate_number as plate_number', 'trip.remarks as remarks', 'terminal.description as terminaldesc')->get();
      // return response(view('drivermodule.index', compact('trips')), 200, ['Content-Type' => 'application/json']);

      return response()->json($trips);
    }
}
