<?php

namespace App\Http\Controllers\DriverModuleControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Rules\checkCurrency;
use App\Rules\checkTime;
use Carbon\Carbon;
use App\FeesAndDeduction;
use App\Destination;
use App\Transaction;
use App\Terminal;
use App\Member;
use App\Ticket;
use App\Trip;
use App\User;

class CreateReportController extends Controller
{
  public function createReport()
  {
    $terminals = Terminal::orderBy('terminal_id')->get();
    $destinations = Destination::join('terminal', 'destination.terminal_id', '=', 'terminal.terminal_id')->select('terminal.terminal_id as term_id','terminal.description as termdesc', 'destination.destination_id as destid', 'destination.description')->get();
    $fads = FeesAndDeduction::where('type','=','Discount')->get();
    return view('drivermodule.report.driverReport',compact('terminals', 'destinations', 'fads'));

  }

  public function storeReport()
  {
    // $dateDepart = request('dateDeparted');
    // $timeDepart = request('timeDeparted');
    // $totalPassengers = request('totalPassengers');
    // $totalBookingFee = request('totalBookingFee');

    // dd(compact('dateDepart', 'timeDepart', 'totalPassengers', 'totalBookingFee'));
    // $this->validate(request(),[
    //   "dateDeparted" => "required|date_format:m/d/Y",
    //   "timeDeparted" => [new checkTime, "required"],
    //   "totalPassengers" => "numeric|required",
    //   "totalBookingFee" => [new checkCurrency, "required"]
    // ]);
    // //
    // $totalPassengers = (float)request('totalPassengers');
    // $communityFund = number_format(5 * $totalPassengers, 2, '.', '');
    // // // $user = new User;
    // // // $user->join('member', 'users.id', '=', 'member.user_id')
    // // //       ->join('member_van', 'member.member_id', '=', 'member_van.member_id')
    // // //       ->join('van', 'member_van.plate_number', '=', 'van.plate_number')
    // // //       ->where('users.id', Auth::id())->get();
    // //
    // $driver_id = Member::where('user_id', Auth::id())->select('user_id')->first();
    //  $user = User::find(Auth::id());
    //  $create = Trip::create([
    //    'driver_id' => $driver_id,
    //    'terminal_id' => request('termId'),
    //    'plate_number' => $user->member->van->pluck('plate_number'),
    //    'status' => 'Departed',
    //    'total_passengers' => $totalPassengers,
    //    'total_booking_fee' => request('totalBookingFee'),
    //    'community_fund' => $communityFund,
    //    'date_departed' => Carbon::createFromTimestamp(strtotime(request('dateDeparted') . request('timeDeparted'))),
    //  ]);
    //
    // //  return back();
    // $destinationArr = request('destination');
    // $numOfPassengers = request('qty');
    // $discountArr = request('discountId');
    // $numOfDiscount = request('numberOfDiscount');
    // $ticketArr = null;
    // $discountTransactionArr = null;
    //
    // for($i = 0; $i < count($numOfPassengers); $i++){
    //   if(!($numOfPassengers[$i] == null)){
    //     $ticketArr[$i] = array($destinationArr[$i] => $numOfPassengers[$i]);
    //   }else{
    //     continue;
    //   }
    // }
    //
    // for($j = 0; $j < count($numOfDiscount); $j++){
    //   if(!($numOfDiscount[$j] == null)){
    //     $discountTransactionArr[$j] = array($discountArr[$j] => $numOfDiscount[$j]);
    //   }else{
    //     continue;
    //   }
    // }
    // $insertTicketArr = array_values($ticketArr);
    // $insertDiscountArr = array_values($discountTransactionArr);
    //
    // //Ticket
    // foreach($insertTicketArr as $ticketKey => $innerTicketArrays){
    //   foreach($innerTicketArrays as $innerTicketKeys => $innerTicketValues){
    //     //Discount
    //     foreach($insertDiscountArr as $discountKey => $innerDiscountArrays){
    //         foreach($innerDiscountArrays as $innerDiscountKeys => $innerDiscountValues){
    //           //echo $key . " " . $innerTicketKeys . " " . $innerTicketValues . "<br/>";
    //           for($i = 1; $i <= $innerTicketValues || $i <= $innerDiscountValues; $i++){
    //             //echo $innerKeys . " " . $i . "<br/>";
    //             if(!($i > $innerDiscountValues)){
    //               Transaction::create([
    //                 "destination_id" => $innerTicketKeys,
    //                 "fad_id" => $innerDiscountKeys,
    //                 "trip_id" => 1,
    //                 "status" => 'Departed',
    //               ]);
    //             }else{
    //               Transaction::create([
    //                 "destination_id" => $innerTicketKeys,
    //                 "trip_id" => 1,
    //                 "status" => 'Departed',
    //               ]);
    //             }
    //           }
    //         }
    //     }
    //
    //   }
    // }
    // echo "<br/ >";
    // foreach($insertDiscountArr as $key => $innerArrays){
    //   foreach($innerArrays as $keySet => $innerValues){
    //     echo $key . " " . $keySet . " " . $innerValues . "<br/>";
    //     for($i = 1; $i <= $innerValues; $i++){
    //       echo $keySet . " " . $i . "<br/>";
    //     }
    //   }
    // }
    dd(request('termId'));
    //return redirect('home/create-report');





  }
}
