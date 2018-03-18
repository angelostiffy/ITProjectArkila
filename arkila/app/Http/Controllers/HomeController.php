<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\Announcement;
use App\FeesAndDeduction;
use App\Destination;
use App\Terminal;
use App\User;
use App\Van;

use App\Trip;

use App\Member;


class HomeController extends Controller
{
   // /**
   //  * Create a new controller instance.
   //  *
   //  * @return void
   //  */
   // public function __construct()
   // {
   //     $this->middleware('auth:admin');
   // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function settings(){
        $fees = FeesAndDeduction::latest()->where('type','Fee')->get();
        $discounts = FeesAndDeduction::latest()->where('type','Discount')->get();
        $destinations = Destination::join('terminal', 'destination.terminal_id', '=', 'terminal.terminal_id')->select('terminal.description as terminal', 'destination.destination_id','destination.description', 'destination.amount')->get();
        $terminals = Terminal::all();
        $tickets = Ticket::all();


        return view('settings.index', compact('fees','destinations', 'terminals', 'discounts','tickets'));
    }

    public function usermanagement()
    {
        $userAdmins = User::join('terminal', 'users.terminal_id', '=', 'terminal.terminal_id')->orderBy('users.created_at', 'desc')->admin()->select('users.id as userid','users.name', 'users.username', 'terminal.terminal_id', 'terminal.description')->get();
        $userDrivers = User::driver()->where('users.terminal_id','=', null)->get();
        $userCustomers = User::customer()->where('users.terminal_id','=', null)->get();
        return view('usermanagement.index', compact('userAdmins', 'userDrivers', 'userCustomers'));
    }


    // public function driverDashboard()
    // {
    //     $announcements = Announcement::latest()->where('viewer', '=', 'Public')->orWhere('viewer', '=', 'Driver Only')->get();
    //     // $ondeckTrip = Trip::
    //     $trips = Trip::join('member', 'trip.driver_id', '=', 'member.member_id')
    //                   ->join('destination', 'trip.destination_id', '=', 'destination.destination_id')
    //                   ->join('terminal', 'destination.terminal_id', '=', 'terminal.terminal_id')
    //                   ->join('van', 'trip.plate_number', '=', 'van.plate_number')
    //                   ->where('member.operator_id', '=', null)
    //                   ->where('member.role', '=', 'Driver')
    //                   ->where('trip.status', '<>', 'Departed')
    //                   ->orderBy('trip.created_at','asc')
    //                   ->select('trip.trip_id as trip_id', 'trip.queue_number as queueId', 'trip.plate_number as plate_number', 'trip.remarks as remarks', 'terminal.description as terminaldesc')->get();
    //     return view('drivermodule.index', compact('announcements', 'trips'));
    //   }
    public function archive() {
        $drivers = Member::latest()->where('status', 'Inactive')->get();
        $vans = Van::latest()->where('status', 'Inactive')->get();

        return view('archive.index', compact('drivers', 'vans'));


    }
}
