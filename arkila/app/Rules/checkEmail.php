<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;

class checkEmail implements Rule
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
        $checkUserEmail = User::where('users.email', $value);
        return (count($checkUserEmail) > 0 ? true : false);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The email you typed already exists!';
    }
}
