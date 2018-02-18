<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkCurrency implements Rule
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
        return preg_match('/(^\d{1,3}\,\d{3}\,\d{3},\d{3}|^\d{1,3}\,\d{3}\,\d{3}|^\d{1,3}\,\d{3}|^\d{1,3})(\.\d{2})$/',$value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Wrong currency format, the entered data must have commas and decimal point';
    }
}
