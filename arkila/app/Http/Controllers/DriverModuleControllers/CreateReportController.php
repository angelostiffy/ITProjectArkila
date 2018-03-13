<?php

namespace App\Http\Controllers\DriverModuleControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Rules\checkCurrency;
use App\Rules\checkTime;
use Carbon\Carbon;
use App\Destination;
use App\Terminal;
use App\Member;
use App\Ticket;
use App\Trip;

class CreateReportController extends Controller
{
  public function createReport()
  {
    $terminals = Terminal::all();
    $destinations = Destination::join('terminal', 'destination.terminal_id', '=', 'terminal.terminal_id')->select('terminal.terminal_id as term_id', 'destination.destination_id as destid', 'destination.description')->get();
    return view('drivermodule.report.driverReport',compact('terminals', 'destinations'));
  }

  public function storeReport()
  {
    
    // $this->validate(request(),[
    //   "dateDeparted" => "required|date_format:m/d/Y|after_or_equal:today",
    //   "timeDeparted" => [new checkTime, "required"],
    //   "totalPassengers" => "numeric|required",
    //   "totalBookingFee" => [new checkCurrency, "required"]
    // ]);

    // $totalPassengers = (float)request('totalPassengers');
    // $communityFund = number_format(5 * $totalPassengers, 2, '.', '');
    // Trip::create([
    //   'driver_id' => Member::where('user_id', Auth::id())->select('user_id')->first(),
    //   'terminal_id' => request('termId'),
    //   'plate_number' => Van::join('member_van','van.plate_number', '=','member_van.plate_number')
    //                        ->join('member', 'member_van.member_id', '=', request('termId')
    //                        ->select('van.plate_number as plate_number')->first(),
    //   'status' => 'Departed',
    //   'total_passengers' => $totalPassengers,
    //   'total_booking_fee' => request('totalBookingFee'),
    //   'community_fund' => $communityFund,
    //   'date_departed' => Carbon::createFromTimestamp(strtotime(request('dateDeparted') . request('timeDeparted'))),
    // ]);

    // for($i = 0; $i < $totalPassengers; $i++){
    //   Ticket::create([
    //     'destination_id' => 
    //   ]);  
    // }                     
    // return redirect('');     

    dd(request('destination'));               
  }
}
