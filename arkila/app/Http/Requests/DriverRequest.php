<?php

namespace App\Http\Requests;

use App\Rules\checkAge;
use App\Rules\checkName;
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
        switch($this->method())
        {
            case 'POST':
            {

                return [
                    'lastName' => ['required',new checkName,'max:35'],
                    'firstName' => ['required',new checkName,'max:35'],
                    'operator' => 'nullable|exists:member,member_id|numeric',
                    'middleName' => ['required',new checkName,'max:35'],
                    'contactNumber' => 'digits:10',
                    'address' => 'required|max:100',
                    'provincialAddress' => 'required|max:100',
                    'birthDate' => ['required','date_format:m/d/Y','after:1/1/1918', new checkAge],
                    'birthPlace' => 'alpha|required|max:50',
                    'gender' => [
                        'required',
                        Rule::in(['Male', 'Female'])
                    ],
                    'citizenship' => 'alpha|required|max:35',
                    'civilStatus' => [
                        'required',
                        Rule::in(['Single', 'Married', 'Divorced'])
                    ],
                    'nameOfSpouse' => ['required_with:spouseBirthDate','max:120', 'nullable',new checkName],
                    'spouseBirthDate' => 'required_with:nameOfSpouse|nullable|date|before:today',
                    'fathersName' => ['required_with:fatherOccupation','max:120', 'nullable',new checkName],
                    'fatherOccupation' => 'required_with:fathersName|max:50',
                    'mothersName' => ['required_with:motherOccupation','max:120', 'nullable',new checkName],
                    'motherOccupation' => 'required_with:mothersName|max:50',
                    'contactPerson' => ['required','max:120', new checkName],
                    'contactPersonAddress' => 'required|max:50',
                    'contactPersonContactNumber' => 'required|digits:10',
                    'sss' => 'unique:member,SSS|required|max:10',
                    'licenseNo' => 'required|max:20',
                    'licenseExpiryDate' => 'required|date|after:today',
                    'children.*' => ['required_with:childrenBDay.*','distinct', 'nullable',new checkName],
                    'childrenBDay.*' => 'required_with:children.*|nullable|date|before:tomorrow'
                ];
            }
            case 'PATCH':
            {

                return [
                    'lastName' => ['required',new checkName,'max:35'],
                    'firstName' => ['required',new checkName,'max:35'],
                    'operator' => 'nullable|exists:member,member_id|numeric',
                    'middleName' => ['required',new checkName,'max:35'],
                    'contactNumber' => 'digits:10',
                    'address' => 'required|max:100',
                    'provincialAddress' => 'required|max:100',
                    'birthDate' => ['required','date_format:m/d/Y','after:1/1/1918', new checkAge],
                    'birthPlace' => 'alpha|required|max:50',
                    'gender' => [
                        'required',
                        Rule::in(['Male', 'Female'])
                    ],
                    'citizenship' => 'alpha|required|max:35',
                    'civilStatus' => [
                        'required',
                        Rule::in(['Single', 'Married', 'Divorced'])
                    ],
                    'nameOfSpouse' => ['required_with:spouseBirthDate','max:120', 'nullable',new checkName],
                    'spouseBirthDate' => 'required_with:nameOfSpouse|nullable|date|before:today',
                    'fathersName' => ['required_with:fatherOccupation','max:120', 'nullable',new checkName],
                    'fatherOccupation' => 'required_with:fathersName|max:50',
                    'mothersName' => ['required_with:motherOccupation','max:120', 'nullable',new checkName],
                    'motherOccupation' => 'required_with:mothersName|max:50',
                    'contactPerson' => ['required','max:120', 'nullable',new checkName],
                    'contactPersonAddress' => 'required|max:50',
                    'contactPersonContactNumber' => 'required|digits:10',
                    'sss' => 'unique:member,SSS,'.$this->route('driver')->member_id.',member_id|required|max:10',
                    'licenseNo' => 'required|max:20',
                    'licenseExpiryDate' => 'required|date|after:today',
                    'children.*' => ['required_with:childrenBDay.*','distinct', 'nullable',new checkName],
                    'childrenBDay.*' => 'required_with:children.*|nullable|date|before:tomorrow'
                ];
            }
            default:break;
        }
    }    
}

