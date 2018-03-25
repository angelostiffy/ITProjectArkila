<?php

namespace App\Http\Controllers\DriverModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destination;
use App\Announcement;
use App\Terminal;
use App\Trip;

class DriverHomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth::driver');
    // }

    public function index()
    {
      $announcements = Announcement::latest()->where('viewer', '=', 'Public')
                                    ->orWhere('viewer', '=', 'Driver Only')->get();
      $destinations = Destination::all();
      $terminals = Terminal::all();
      $trips = Trip::join('member', 'trip.driver_id', '=', 'member.member_id')
                    ->join('terminal', 'trip.terminal_id', '=', 'terminal.terminal_id')
                    ->join('destination', 'terminal.terminal_id', '=', 'destination.terminal_id')
                    ->join('van', 'trip.plate_number', '=', 'van.plate_number')
                    ->where('member.operator_id', '=', null)
                    ->where('member.role', '=', 'Driver')
                    ->where('trip.status', '<>', 'Departed')
                    ->orderBy('trip.created_at','asc')
                    ->select('trip.trip_id as trip_id', 'trip.queue_number as queueId', 'trip.plate_number as plate_number', 'trip.remarks as remarks', 'terminal.description as terminaldesc')->get();
      return view('drivermodule.index', compact('destinations','announcements', 'trips','terminals'));
    }
}
