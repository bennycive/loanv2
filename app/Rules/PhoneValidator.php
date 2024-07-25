<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneValidator implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * 
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     * 
     * 
     */
    public function passes($attribute, $value)
    {
        // Remove non-numeric characters from the phone number
        $value = preg_replace('/\D/', '', $value);

        // Check if the phone number starts with '255' and is followed by 9 digits
        if (strpos($value, '255') === 0) {
            // If the number starts with '2550', remove the '0' after '255'
            if (substr($value, 3, 1) == '0') {
                $value = substr_replace($value, '', 3, 1);
            }

            // Validate if the phone number length is exactly 12 characters (255 + 9 digits)
            return strlen($value) == 12;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must start with 255 and be followed by nine digits.';
    }

    
}
