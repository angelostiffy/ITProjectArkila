<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeesAndDeduction;
use App\Destination;
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
        $destinations = Destination::all();
        $terminals = Destination::orderBy('terminal', 'asc')->groupBy('terminal')->get();

        

        return view('settings.index', compact('fees','destinations', 'terminals', 'discounts'));
    }
}
