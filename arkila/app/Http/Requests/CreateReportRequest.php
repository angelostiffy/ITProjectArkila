<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Rules\checkCurrency;
use App\Rules\checkTime;
use App\Member;

class CreateReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $member = Member::where('user_id', Auth::id())->first();
        $member_van = $member->van->first();

        $rules = [
          "dateDeparted" => "required|date_format:m/d/Y",
          "timeDeparted" => [new checkTime, "required"],
          "totalPassengers" => "numeric|min:1|max:".$member_van->seating_capacity."|required",
          "totalBookingFee" => [new checkCurrency, "required"],
          "numberOfDiscount" => "array",
          "numberOfDiscount.*" => "numeric|min:1"
        ];
        
        foreach($this->request->get('numberOfDiscount') as $key => $value){
          $rules['numberOfDiscount.'.$key] = 'numeric|min:1';
        }

        return $rules;
    }

    public function messages()
    {
      $messages = [
        "dateDeparted.required" => "Please enter the date of departure",
        "dateDeparted.date_format" => "Please enter the correct format for the date of departure: mm/dd/yyyy",
        "timeDeparted.required" => "Please enter time of departure",
        "totalPassengers.numeric" => "Please enter a valid number for the total number of passengers",
        "totalPassengers.required" => "Please enter the total number of passenger of your trip",
        "totalBookingFee.required" => "Please enter the booking fee of your trip",
        "numberOfDiscount.array" => "Cannot proceed with unless you refresh",
        // "numberOfDiscount.*.numeric" => "The number of discount must be numeric",
        // "numberOfDiscount.*.min" => "The number of discounts must greater than 0",
      ];

      foreach($this->request->get('numberOfDiscount') as $key => $value){
        // if($messages['numberOfDiscount.'.$key.'.numeric']){
        //
        // }
        //
        // if($messages['numberOfDiscount.'.$key.'.min']){
        //
        // }
        $messages['numberOfDiscount.'.$key.'.min'] = "The number of discount must greater than 0";
        $messages['numberOfDiscount.'.$key.'.numeric'] = "The number of discount must be numeric";
        break;
      }

      return $messages;
    }
}
