<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


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
        return [
            'firstName' => 'required|max:35',
            'lastName' => 'required|max:35',
            'middleName' => 'required|max:35',
            'address' => 'required|max:100',
            'contactNumber' => 'numeric|digits:10',
            'provincialAddress' => 'required|max:100',
            'age' => 'required|numeric',
            'birthDate' => 'required|date',
            'birthPlace' => 'required|max:50',
            'gender' => [
                'required',
                Rule::in(['Male', 'Female'])
            ],
            'citizenship' => 'required|max:35',
            'cStatus' => [
                'required',
                Rule::in(['Single', 'Married', 'Divorced']) 
            ],
            'noChild' => 'max:2',
            'spouse' => 'max:120',
            'spouseBirthDate' => 'nullable|date',
            'father' => 'max:120',
            'fatherOccupation' => 'max:50',
            'mother' => 'max:120',
            'motherOccupation' => 'max:50',
            'pCaseofEmergency' => 'required|max:120',
            'emergencyAddress' => 'required|max:50',
            'emergencyContactNo' => 'required|numeric|digits:10',
            'sssId' => 'required|unique:operators,SSS',
        ];
    }
}
