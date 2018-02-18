<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Driver;


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
        $driver = Driver::find(request('driverID'));
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'member' => 'unique:drivers,member_id|required|max:10',
                    'operator' => 'required|max:7',
                    'last' => 'required|max:35',
                    'first' => 'required|max:35',
                    'middle' => 'required|max:35',
                    'address' => 'required|max:55',
                    'contactn' =>  'numeric|digits:10',
                    'paddress' =>  'required|max:55',
                    'age' =>  'required|digits:2',
                    'birthdate' =>  'required|date|before:today',
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
                    'spousebday' =>  'nullable|date|before:today',
                    'father' =>  'max:120',
                    'fatheroccup' =>  'max:55',
                    'mother' =>  'max:120',
                    'motheroccup' =>  'max:55',
                    'personemergency' =>  'required|max:100',
                    'peAddress' =>  'required|max:55',
                    'peContactnum' =>  'required|digits:10',
                    'sss' =>  'required|max:10',
                    'licenseNum' =>  'required|max:10',
                    'exp' =>  'required|date',
                ];
            }
            case 'PATCH':
            {
                return [
                    'member' => 'unique:drivers,member_id,'.$driver->member_id.',member_id|required|max:10',
                    'operator' => 'required|max:7',
                    'last' => 'required|max:35',
                    'first' => 'required|max:35',
                    'middle' => 'required|max:35',
                    'address' => 'required|max:55',
                    'contactn' =>  'numeric|digits:10',
                    'paddress' =>  'required|max:55',
                    'age' =>  'required|digits:2',
                    'birthdate' =>  'required|date|before:today',
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
                    'spousebday' =>  'nullable|date|before:today',
                    'father' =>  'max:120',
                    'fatheroccup' =>  'max:55',
                    'mother' =>  'max:120',
                    'motheroccup' =>  'max:55',
                    'personemergency' =>  'required|max:100',
                    'peAddress' =>  'required|max:55',
                    'peContactnum' =>  'required|digits:10',
                    'sss' =>  'required|max:10',
                    'licenseNum' =>  'required|max:10',
                    'exp' =>  'required|date',
                ];         
            }
            default:break;
        }
    }    
}

