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
        // $values = explode(',',$value);

        $expresion = '/\d{4}/';              //debe haber 4 digitos

        // foreach ($values as $value) {
            
            if (preg_match($expresion,$value)) {
                return true;
            }else {
                return false;
            }
        // }
    }

    
    public function message()
    {
        return 'O Numero deve conter 4 digitos';
    }
}
