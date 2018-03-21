<?php

namespace App\Http\Requests;

use App\Rules\checkName;
use App\Rules\checkOccupation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\checkAge;
use App\Rules\checkContactNum;

class OperatorRequest extends FormRequest
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
                    'lastName' => ['required',new checkName,'max:25'],
                    'firstName' => ['required',new checkName,'max:25'],
                    'middleName' => ['required',new checkName,'max:25'],
                    'contactNumber' => [new checkContactNum],
                    'address' => 'required|max:100',
                    'provincialAddress' => 'required|max:100',
                    'birthDate' => ['required','date_format:m/d/Y','after:1/1/1918', new checkAge],
                    'birthPlace' => [new checkName,'required','max:30'],
                    'gender' => [
                        'required',
                        Rule::in(['Male', 'Female'])
                    ],
                    'citizenship' => 'alpha|required|max:25',
                    'civilStatus' => [
                        'required',
                        Rule::in(['Single', 'Married', 'Divorced', 'Widowed'])
                    ],
                    'nameOfSpouse' => ['required_if:civilStatus,Married','required_with:spouseBirthDate','max:40', 'nullable',new checkName],
                    'spouseBirthDate' => 'required_with:nameOfSpouse|nullable|date|before:today',
                    'fathersName' => ['required_with:fatherOccupation','max:40', 'nullable',new checkName],
                    'fatherOccupation' => ['required_with:fathersName','max:25', 'nullable', new checkOccupation],
                    'mothersName' => ['required_with:motherOccupation','max:40', 'nullable',new checkName],
                    'motherOccupation' => ['required_with:mothersName','max:25', 'nullable', new checkOccupation],
                    'contactPerson' => ['required','max:40', 'nullable', new checkName],
                    'contactPersonAddress' => 'required|max:100',
                    'contactPersonContactNumber' => ['required', new checkContactNum],
                    'sss' => 'unique:member,SSS|required|max:10',
                    'licenseNo' => ['required_with:licenseExpiryDate','max:20'],
                    'licenseExpiryDate' => 'required_with:licenseNo|nullable|date|after:today',
                    'children.*' => ['required_with:childrenBDay.*','distinct', 'nullable', new checkName, 'max:40'],
                    'childrenBDay.*' => 'required_with:children.*|nullable|date|before:tomorrow'
                ];
            }
            case 'PATCH':
            {
//                dd($this->all());
                    return [
                        'lastName' => ['required',new checkName,'max:25'],
                        'firstName' => ['required',new checkName,'max:25'],
                        'middleName' => ['required',new checkName,'max:25'],
                        'contactNumber' => [new checkContactNum],
                        'address' => 'required|max:100',
                        'provincialAddress' => 'required|max:100',
                        'birthDate' => ['required','date_format:m/d/Y','after:1/1/1918', new checkAge],
                        'birthPlace' => [new checkName,'required','max:30'],
                        'gender' => [
                            'required',
                            Rule::in(['Male', 'Female'])
                        ],
                        'citizenship' => 'alpha|required|max:25',
                        'civilStatus' => [
                            'required',
                            Rule::in(['Single', 'Married', 'Divorced', 'Widowed'])
                        ],
                        'nameOfSpouse' => ['required_if:civilStatus,Married','required_with:spouseBirthDate','max:40', 'nullable', new checkName],
                        'spouseBirthDate' => 'required_with:nameOfSpouse|nullable|date|before:today',
                        'fathersName' => ['required_with:fatherOccupation','max:40', 'nullable', new checkName],
                        'fatherOccupation' => ['required_with:fathersName','max:25', 'nullable', new checkOccupation],
                        'mothersName' => ['required_with:motherOccupation','max:40', 'nullable',new checkName],
                        'motherOccupation' => ['required_with:mothersName','max:25', 'nullable', new checkOccupation],
                        'contactPerson' => ['required','max:40', 'nullable', new checkName],
                        'contactPersonAddress' => 'required|max:100',
                        'contactPersonContactNumber' => ['required',new checkContactNum],
                        'sss' => 'unique:member,SSS,'.$this->route('operator')->member_id.',member_id|required|max:10',
                        'licenseNo' => ['required_with:licenseExpiryDate','max:20'],
                        'licenseExpiryDate' => 'required_with:licenseNo|nullable|date|after:today',
                        'children.*' => ['required_with:childrenBDay.*','distinct', 'nullable', new checkName,'max:40'],
                        'childrenBDay.*' => 'required_with:children.*|nullable|date|before:tomorrow'
                    ];

            }
            default:break;
        }
    }
}
