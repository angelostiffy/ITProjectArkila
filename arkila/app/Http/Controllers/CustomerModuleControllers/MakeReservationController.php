<?php

namespace App\Http\Controllers\CustomerModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MakeReservationController extends Controller
{
    public function createReservation()
    {
    	return view('customermodule.user.reservation.customerReservation');
    }

    public function storeReservation()
    {
    	
    }
}
