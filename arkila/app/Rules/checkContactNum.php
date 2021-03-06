<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkContactNum implements Rule
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
        return (preg_match('/^\d{3}-\d{3}-\d{4}$/', $value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The contact number must be 10 digits in the format ###-###-####';
    }
}
