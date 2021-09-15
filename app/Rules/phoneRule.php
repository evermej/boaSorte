<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class phoneRule implements Rule
{
    
    public function __construct()
    {
        //
    }

    
    public function passes($attribute, $value)
    {
        $regex = '/^(?:(?:\+|00)?(55)\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/';

        if (preg_match($regex, $value) == false) {

            // O número não foi validado.
            return false;
        } else {

            // Telefone válido.
            return true;
        } 
    }

    
    public function message()
    {
        return 'o :attribute nao e valido';
    }
}
