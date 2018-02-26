<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Terminal;

class checkTerminal implements Rule
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
        $terminal = Terminal::find($value);
         return ( $terminal != null ? true:false);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The entered Terminal does not exist';
    }
}
