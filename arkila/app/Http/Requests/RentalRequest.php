<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\checkName;
use App\Rules\checkTime;
use Carbon\Carbon;
use Illuminate\Http\Request;


class RentalRequest extends FormRequest
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
                "lastName" => [new checkName, 'required', 'max:50'],
                "firstName" => [new checkName, 'required', 'max:50'],
                "middleName" => [new checkName, 'required', 'max:50'],
                "date" => "required|date_format:m/d/Y|after_or_equal:today",
                "destination" => "required|max:50",
                "model" => "required|max:50",
                "time" => [new checkTime, 'required'],
                "days" => "required|numeric|digits_between:1,2|min:1",
                "contactNumber" => "required|numeric|digits:10",
        
            ];
        } else {
            return [
                "lastName" => [new checkName, 'required', 'max:50'],
                "firstName" => [new checkName, 'required', 'max:50'],
                "middleName" => [new checkName, 'required', 'max:50'],
                "date" => "required|date_format:m/d/Y|after_or_equal:today",
                "destination" => "required|max:50",
                "model" => "required|max:50",
                "time" => [new checkTime, 'required', 'after:' . $timeFormattedNow],
                "days" => "required|numeric|digits_between:1,2|min:1",
                "contactNumber" => "required|numeric|digits:10",
         
                ];
        }
    }

    public function messages() 
    {
        return [
            "lastName.required" => "Please enter the customers last name",
            "lastName.max" => "Last name must be less than or equal to 50 characters",
            "firstName.required" => "Please enter the customers first name",
            "firstName.max" => "First name must be less than or equal to 50 characters",
            "middleName.required" => "Please enter the customers middle name",
            "middleName.max" => "Middle name must be less than or equal to 50 characters",

            "date.required" => "Please enter the preffered departure date",
            "date.date_format" => "Please enter a valid date format (mm/dd/yyyy)",
            "time.required" => "Please enter the preffered departure time",
            "days.required" => "Please enter the number of days",
            "days.numeric" => "Please enter a number",
            "days.digits_between" => "The days must be between 1-15",
            "days.min" => "The number of days must be atleast 1",
            "model.required" => "Please enter the preffered van model",
            "model.max" => "Van model must be less than or equal to 50 characters",
            "contactNumber.required" => "Please enter the contact number",
            "contactNumber.numeric" => "Please enter a number",
            "contactNumber.digits" => "Contact number must be exactly 10 digits (926XXXXXXX)",

        ];
    }
}
