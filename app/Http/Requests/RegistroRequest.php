<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PassworRules;

class RegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                PassworRules::min(8)->letters()->symbols()->numbers()    //Illuminate\Validation\Rules\Password as PassworRules;;
            ]
        ];
    }

    public function messages() 
    {
        return [
            'name' => 'El Nombre es obligatorio',
            'email.required' => 'El Email es obligatorio',
            'email.email' => 'El Email no es valido',
            'email.unique' => 'El usuario ya esta registrado',
            'password' => 'El Password debe de contener al menos 8 caracteres, un simbolo y un numero'
        ];
    }
}
