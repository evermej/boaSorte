<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NumberRule implements Rule
{
    
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        
        $expresion = '/\d{4}/';              //debe haber 4 digitos
        
        return (preg_match($expresion,$value)) ? true : false;
    }

    
    public function message()
    {
        return 'O Numero deve conter 4 digitos';
    }
}
