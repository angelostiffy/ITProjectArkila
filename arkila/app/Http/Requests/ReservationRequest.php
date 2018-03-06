<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Reservation;
use App\Rules\checkCurrency;
use App\Rules\checkTime;
use App\Rules\checkName;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ReservationRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $dateNow = Carbon::now();
        $thisDate = $dateNow->setTimezone('Asia/Manila');
        
        $dateFormattedNow = $thisDate->format('m/d/Y');
        $timeFormattedNow = $thisDate->format('h:i A');


        $dateToday = $request->date;
        $dateCarbon = new Carbon(request('date'));
        $dateFormatted = $dateCarbon->format('m/d/Y');

        if ($dateFormatted !== $dateFormattedNow) {
                return [
                    "name" => [new checkName, 'required', 'max:50'],
                    "date" => "required|date_format:m/d/Y|after_or_equal:today",
                    "dest" => "required",
                    "time" => [new checkTime, 'required'],
                    "seat" => "required|numeric|digits_between:1,2|min:0|max:15",
                    "contact" => "required|numeric|digits:10",
                    "amount" => [new checkCurrency,'numeric','min:0'],
                ];
        } else {
            return [
                "name" => [new checkName, 'required', 'max:50'],
                "date" => "required|date_format:m/d/Y|after_or_equal:today",
                "dest" => "required",
                "time" => [new checkTime, 'required', 'after:' . $timeFormattedNow],
                "seat" => "required|numeric|digits_between:1,2|min:1|max:15",
                "contact" => "required|numeric|digits:10",
                "amount" => [new checkCurrency,'numeric','min:0'],
            ];
        }
    }

    public function messages() 
    {
        $dateNow = Carbon::now();
        $thisDate = $dateNow->setTimezone('Asia/Manila')->format('h:i A');


        return [
            "name.required" => "Please enter the customers name",
            "name.max" => "Name must be less than or equal to 50 characters",
            "date.required" => "Please enter the preffered departure date",
            "date.date_format" => "Please enter a valid date format (mm/dd/yyyy)",
            "time.required" => "Please enter the preffered departure time",
            "time.after" => "The time must be a time after ". $thisDate ."",
            "seat.required" => "Please enter the number of seat for the reservation",
            "seat.numeric" => "The seat must be a number",
            "seat.digits_between" => "Please enter a number of seat between 1-15",
            "contact.required" => "Please enter the contact number",
            "contact.numeric" => "The contact number must be a number",
            "contact.digits" => "Contact number must be exactly 10 digits (926XXXXXXX)",

        ];
    }
}
