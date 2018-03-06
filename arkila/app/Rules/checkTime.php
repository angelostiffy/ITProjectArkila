<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkTime implements Rule
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
        return ((preg_match('((1[0-2]|0?[1-9]):([0-5][0-9]) ([AaPp][Mm]))', $value) ? true : false));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please enter a time format of HH:MM PM/AM.';
    }
}
