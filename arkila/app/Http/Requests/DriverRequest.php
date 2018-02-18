<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class DriverRequest extends FormRequest
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
            'member' => 'required|unique:drivers,member_id|max:10',
            'operator' => 'required|max:7',
            'last' => 'required|max:35',
            'first' => 'required|max:35',
            'middle' => 'required|max:35',
            'address' => 'required|max:55',
            'contactn' =>  'numeric|digits:10',
            'paddress' =>  'required|max:55',
            'age' =>  'required|digits:2',
            'birthdate' =>  'required|date',
            'bplace' =>  'required|max:50',
            'gender' => [
                'required',
                Rule::in(['Male', 'Female'])
            ],
            'citizenship' =>  'required|max:25',
            'cstatus' => [
                'required',
                Rule::in(['Single', 'Married', 'Divorced']) 
            ],
            'nochild' =>  'max:3',
            'spouse' =>  'max:120',
            'spousebday' =>  'date',
            'father' =>  'max:120',
            'fatheroccup' =>  'max:55',
            'mother' =>  'max:120',
            'motheroccup' =>  'max:55',
            'personemergency' =>  'required|max:100',
            'peAddress' =>  'required|max:55',
            'peContactnum' =>  'required|digits:10',
            'sss' =>  'required|unique:drivers,sss|max:10',
            'licenseNum' =>  'required|unique:drivers,license_number|max:10',
            'exp' =>  'required|date',
 //
        ];
    }
    public function messages()
    {
        return [
            'member.unique' => 'Member id exists!',

        ];
    }
}