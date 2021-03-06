<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkPlateNumber implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (preg_match('/^[A-Z\d]+$|^([A-Z\d])+[- ]([A-Z\d])+$/',$value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The entered plate number must be in a valid format.';
    }
}
