<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Reservation;
use App\Rules\checkCurrency;

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
    public function rules()
    {
        return [
            "name" => "required|max:50",
            "date" => "required|date_format:m/d/Y|after_or_equal:today",
            "dest" => "required",
            "time" => 'required',
            "seat" => "required|numeric|digits_between:1,2",
            "contact" => "required|numeric|digits:10",
            "amount" => [new checkCurrency,'numeric','min:0'],
        ];
    }

    public function messages() 
    {
        return [
            "name.required" => "Please enter the customers name",
            "name.max" => "Name must be less than or equal to 50 characters",
            "date.required" => "Please enter the preffered departure date",
            "date.date_format" => "Please enter a valid date format (mm/dd/yyyy)",
            "time.required" => "Please enter the preffered departure time",
            "time.date_format" => "Please enter a time format of HH:MM",
            "seat.required" => "Please enter the number of seat for the reservation",
            "seat.numeric" => "Please enter a number",
            "seat.digits_between" => "Please enter a number of seat between 1-15",
            "contact.required" => "Please enter the contact number",
            "contact.numeric" => "Please enter a number",
            "contact.digits" => "Contact number must be exactly 10 digits (926XXXXXXX)",

        ];
    }
}
