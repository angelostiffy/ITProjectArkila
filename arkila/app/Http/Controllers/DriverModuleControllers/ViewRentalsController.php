<?php

namespace App\Http\Controllers\DriverModuleControllers;

use App\Rental;
use App\Van;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewRentalsController extends Controller
{
    public function viewRentals()
    {
        $rentals = Rental::all();
        $vans = Van::all();
        return view('drivermodule.rentals.rental', compact('rentals', 'vans'));
    }
    
    public function updateRental(Rental $rental)
    {
        $message = null;
        $request = request('click');
        if ($rental->status == 'Accepted' && $request == 'Accepted' ) {
            return redirect()->back()->withErrors('Sorry, the rental request has been already accepted.');
        } else {
            
            $rental->update([
                'status' => request('click'),
            ]);

            if(request('click') == 'Accepted'){
                $message = 'You have accepted the rental request from ' . $rental->last_name . ', ' . $rental->first_name;     
            }else if(request('click') == 'Declined'){
                $message = 'You have accepted the rental request from ' . $rental->last_name . ', ' . $rental->first_name;
            }
        
            return redirect()->back()->with('success', $message);
        }
    }
    
}
