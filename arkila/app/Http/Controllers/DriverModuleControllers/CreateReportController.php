<?php

namespace App\Http\Controllers\DriverModuleControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Destination;
use App\Terminal;

class CreateReportController extends Controller
{
  public function createReport()
  {
    $terminals = Terminal::all();
    $destinations = Destination::join('terminal', 'destination.terminal_id', '=', 'terminal.terminal_id')->select('terminal.terminal_id as term_id', 'destination.destination_id as destid', 'destination.description')->get();
    return view('drivermodule.report.driverReport',compact('terminals', 'destinations'));
  }

  public function showDestination()
  {
    $destinations = Destination::where('terminal_id', '=', request('id'))->get();
    return response()->json($destinations);
  }
}
