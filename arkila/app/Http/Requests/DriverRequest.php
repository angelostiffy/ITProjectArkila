<?php

namespace App\Http\Requests;

use App\Rules\checkAge;
use App\Rules\checkContactNum;
use App\Rules\checkLicenseNumber;
use App\Rules\checkName;
use App\Rules\checkOccupation;
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
                    'lastName' => ['bail','required',new checkName,'max:35'],
                    'firstName' => ['bail','required',new checkName,'max:35'],
                    'operator' => 'bail|nullable|exists:member,member_id|numeric',
                    'middleName' => ['bail','required',new checkName,'max:35'],
                    'contactNumber' => ['bail',new checkContactNum],
                    'address' => 'bail|required|max:100',
                    'provincialAddress' => 'bail|required|max:100',
                    'birthDate' => ['bail','required','date_format:m/d/Y','after:1/1/1918', new checkAge],
                    'birthPlace' => ['bail',new checkName,'required','max:50'],
                    'gender' => [
                        'bail',
                        'required',
                        Rule::in(['Male', 'Female'])
                    ],
                    'citizenship' => 'bail|alpha|required|max:35',
                    'civilStatus' => [
                        'bail',
                        'required',
                        Rule::in(['Single', 'Married', 'Divorced', 'Widowed'])
                    ],
                    'nameOfSpouse' => ['bail','required_if:civilStatus,Married','required_with:spouseBirthDate','max:120', 'nullable',new checkName],
                    'spouseBirthDate' => 'bail|required_with:nameOfSpouse|nullable|date|before:today',
                    'fathersName' => ['bail','required_with:fatherOccupation','max:120', 'nullable',new checkName],
                    'fatherOccupation' => ['bail','required_with:fathersName','max:50','nullable', new checkOccupation],
                    'mothersName' => ['bail','required_with:motherOccupation','max:120', 'nullable',new checkName],
                    'motherOccupation' => ['bail','required_with:mothersName','max:50','nullable', new checkOccupation],
                    'contactPerson' => ['bail','required','max:120', new checkName],
                    'contactPersonAddress' => 'bail|required|max:50',
                    'contactPersonContactNumber' => ['bail','required',new checkContactNum],
                    'sss' => 'bail|unique:member,SSS|required|max:10',
                    'licenseNo' => ['bail','required','max:20'],
                    'licenseExpiryDate' => 'bail|required|date|after:today',
                    'children.*' => ['bail','required_with:childrenBDay.*','distinct', 'nullable',new checkName, 'max:120'],
                    'childrenBDay.*' => 'bail|required_with:children.*|nullable|date|before:tomorrow'
                ];
            }
            case 'PATCH':
            {

                return [
                    'lastName' => ['bail','required',new checkName,'max:35'],
                    'firstName' => ['bail','required',new checkName,'max:35'],
                    'operator' => 'bail|nullable|exists:member,member_id|numeric',
                    'middleName' => ['bail','required',new checkName,'max:35'],
                    'contactNumber' => ['bail',new checkContactNum],
                    'address' => 'bail|required|max:100',
                    'provincialAddress' => 'bail|required|max:100',
                    'birthDate' => ['bail','required','date_format:m/d/Y','after:1/1/1918', new checkAge],
                    'birthPlace' => ['bail',new checkName,'required','max:50'],
                    'gender' => [
                        'bail',
                        'required',
                        Rule::in(['Male', 'Female'])
                    ],
                    'citizenship' => 'bail|alpha|required|max:35',
                    'civilStatus' => [
                        'bail',
                        'required',
                        Rule::in(['Single', 'Married', 'Divorced', 'Widowed'])
                    ],
                    'nameOfSpouse' => ['bail','required_if:civilStatus,Married','required_with:spouseBirthDate','max:120', 'nullable',new checkName],
                    'spouseBirthDate' => 'bail|required_with:nameOfSpouse|nullable|date|before:today',
                    'fathersName' => ['bail','required_with:fatherOccupation','max:120', 'nullable',new checkName],
                    'fatherOccupation' => ['bail','required_with:fathersName','max:50', 'nullable',new checkOccupation],
                    'mothersName' => ['bail','required_with:motherOccupation','max:120', 'nullable',new checkName],
                    'motherOccupation' => ['bail','required_with:mothersName','max:50', 'nullable',new checkOccupation],
                    'contactPerson' => ['bail','required','max:120', 'nullable',new checkName],
                    'contactPersonAddress' => 'bail|required|max:50',
                    'contactPersonContactNumber' => ['bail','required',new checkContactNum],
                    'sss' => 'bail|unique:member,SSS,'.$this->route('driver')->member_id.',member_id|required|max:10',
                    'licenseNo' => ['bail','required','max:20'],
                    'licenseExpiryDate' => 'bail|required|date|after:today',
                    'children.*' => ['bail','required_with:childrenBDay.*','distinct', 'nullable',new checkName, 'max:120'],
                    'childrenBDay.*' => 'bail|required_with:children.*|nullable|date|before:tomorrow'
                ];
            }
            default:break;
        }
    }    
}

