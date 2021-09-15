<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => ['required',
            Password::min(8)                //minimo 8 caracteres
                ->letters()                 //minimo una letra
                ->mixedCase()               //minimo una myus y una minus
                ->numbers()                 //minimo un numero
            ],
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'o nome e obrigatorio',
            'email.required' => 'o emial e obrigatorio',
            'email.email' => 'este email nao e valido',
            'email.unique' => 'este email ja existe',
            'password.required' => 'a senha e obrigatoria',
        ];
    }
}
