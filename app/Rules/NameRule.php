<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NameRule implements Rule
{
    
    public function __construct()
    {
        //
    }

    
    public function passes($attribute, $value)
    {
        $value2 = preg_replace("/\s/", '', $value);
        if (preg_match("/[\W]/", $value2)) {         //regex: 
            return false;
        } else {
            return true;
        }
        
    }

    
    public function message()
    {
        return 'O nome nao deve conter simbolos especiais.';
    }
}
