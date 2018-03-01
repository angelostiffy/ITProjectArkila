<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeesAndDeduction;
use App\Destination;
use App\Terminal;
use App\User;
class HomeController extends Controller
{
//    /**   
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

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

        

        return view('settings.index', compact('fees','destinations', 'terminals', 'discounts'));
    }

    public function usermanagement()
    {
        $userAdmins = User::join('terminal', 'users.terminal_id', '=', 'terminal.terminal_id')->orderBy('users.created_at', 'desc')->admin()->select('users.id as userid','users.name', 'users.username', 'terminal.terminal_id', 'terminal.description')->get();
        $userDrivers = User::driver()->where('users.terminal_id','=', null)->get();
        $userCustomers = User::customer()->where('users.terminal_id','=', null)->get();
        return view('usermanagement.index', compact('userAdmins', 'userDrivers', 'userCustomers'));
    }
}
