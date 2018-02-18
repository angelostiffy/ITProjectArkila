<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Driver;

class checkDriver implements Rule
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
        $driver = new Driver;
       
        return $driver->find($value) != null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The entered driver does not exist';
    }
}
