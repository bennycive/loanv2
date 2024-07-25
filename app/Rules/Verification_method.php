<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AtLeastOneRadioSelected implements Rule
{
    private $fieldName;

    public function __construct($fieldName)
    {
        $this->fieldName = $fieldName;
    }

    public function passes($attribute, $value)
    {
        // Alternative approach using request object:
        return request()->has($this->fieldName);

        // Uncomment the line below if using Laravel versions < 5.4
        // return Input::get($this->fieldName) !== null;
    }

    public function message()
    {
        
        return 'Please select a verification method (Email or Phone).';
    }
}
