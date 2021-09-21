<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\cpfRule;
use App\Rules\phoneRule;
use App\Rules\NumberRule;
use App\Rules\NameRule;
use Illuminate\Support\Facades\Auth;

class SaleRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;       //en el primer error no valida mas y manda el mensaje de error 
    
    public function authorize()
    {
        return Auth::user() ? true : false;
    }

    
    public function rules()
    {
        return [
            'number' => ['required','unique:numbers', 'numeric', 'min:0', 'max:9999', new NumberRule()],
            'name' => ['required', new NameRule()],
            'cpf' => ['required','size:14', new cpfRule()],
            'telephone' => ['required','numeric', new phoneRule()]
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'number.required'=>'o campo numero e obrigatorio.',
    //         'number.unique'=>'este numero ja existe.',
    //         'number.size'=>'o numero deve ter 4 digitos.',
    //         'number.min'=>'o numero nao pode ser negativo',
    //         'number.max'=>'O Numero deve conter 4 digitos',
    //         'number.size'=>'o numero deve ter 4 digitos',
    //         'name.required'=>'o nome e obrigatorio.',
    //         'cpf.required'=>'o cpf e obrigatorio.',
    //         'cpf.size'=>'o cpf e de 14 caracteres.',
    //         'telephone.required' => 'o telephone e obrigatorio',
    //         'telephone.numeric' => 'este campo e numerico',
    //     ];

    // }
}
