<?php

namespace App\Http\Requests;

use App\Rules\checkAge;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Member;


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
        $driver = Member::drivers()->where('member_id',$this->member_id);
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'lastName' => 'required|max:35',
                    'firstName' => 'required|max:35',
                    'operator' => 'nullable|exists:member,member_id|numeric',
                    'middleName' => 'required|max:35',
                    'contactNumber' => 'numeric|digits:10',
                    'address' => 'required|max:100',
                    'provincialAddress' => 'required|max:100',
                    'birthDate' => ['required','date', new checkAge],
                    'birthPlace' => 'required|max:50',
                    'gender' => [
                        'required',
                        Rule::in(['Male', 'Female'])
                    ],
                    'citizenship' => 'required|max:35',
                    'civilStatus' => [
                        'required',
                        Rule::in(['Single', 'Married', 'Divorced'])
                    ],
                    'nameOfSpouse' => 'required_with:spouseBirthDate|max:120',
                    'spouseBirthDate' => 'required_with:nameOfSpouse|nullable|date|before:today',
                    'fathersName' => 'required_with:fatherOccupation|max:120',
                    'fatherOccupation' => 'required_with:fathersName|max:50',
                    'mothersName' => 'required_with:motherOccupation|max:120',
                    'motherOccupation' => 'required_with:mothersName|max:50',
                    'contactPerson' => 'required|max:120',
                    'contactPersonAddress' => 'required|max:50',
                    'contactPersonContactNumber' => 'required|numeric|digits:10',
                    'sss' => 'unique:member,SSS|required|max:10',
                    'licenseNo' => 'required|max:20',
                    'licenseExpiryDate' => 'required|date|before:today',
                    'children.*' => 'required_with:childrenBDay.*|distinct',
                    'childrenBDay.*' => 'required_with:children.*|nullable|date|before:tomorrow'
                ];
            }
            case 'PATCH':
            {
                return [
                    'lastName' => 'required|max:35',
                    'firstName' => 'required|max:35',
                    'operator' => 'nullable|exists:member,member_id|numeric',
                    'middleName' => 'required|max:35',
                    'contactNumber' => 'numeric|digits:10',
                    'address' => 'required|max:100',
                    'provincialAddress' => 'required|max:100',
                    'birthDate' => ['required','date', new checkAge],
                    'birthPlace' => 'required|max:50',
                    'gender' => [
                        'required',
                        Rule::in(['Male', 'Female'])
                    ],
                    'citizenship' => 'required|max:35',
                    'civilStatus' => [
                        'required',
                        Rule::in(['Single', 'Married', 'Divorced'])
                    ],
                    'spouse' => 'required_with:spouseBirthDate|max:120',
                    'spouseBirthDate' => 'required_with:spouse|nullable|date|before:today',
                    'fathersName' => 'required_with:fatherOccupation|max:120',
                    'fatherOccupation' => 'required_with:fathersName|max:50',
                    'mothersName' => 'required_with:motherOccupation|max:120',
                    'motherOccupation' => 'required_with:mothersName|max:50',
                    'personInCaseOfEmergency' => 'required|max:120',
                    'emergencyAddress' => 'required|max:50',
                    'emergencyContactNumber' => 'required|numeric|digits:10',
                    'sss' => 'unique:operators,SSS,'.$driver->operator_id.',operator_id|required|max:10',
                    'driverLicense' => 'required|max:20',
                    'driverLicenseExpiryDate' => 'required|date|before:today',
                    'children.*' => 'required_with:childrenBDay.*|distinct',
                    'childrenBDay.*' => 'required_with:children.*|nullable|date|before:tomorrow'
                ];
            }
            default:break;
        }
    }    
}

