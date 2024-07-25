<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumber implements Rule
{
    
    protected $countryCode;

    public function __construct($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function passes($attribute, $value)
    {
        // Check if country code is provided
        if ($this->countryCode && substr($value, 0, 1) == '0') {
            return false; // Invalid if it starts with zero
        }

        // Check if the phone number contains only digits and is within the length limit
        // Adjust the max length as needed
        return preg_match('/^[0-9]{1,15}$/', $value); 
 

    }

    public function message()
    {
        return 'The :attribute should not start with zero if a country code is provided and must be a valid phone number.';
    }


}
