<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
           'name'=>'required|min:4|max:120',
            'email'=>'required|min:4|max:250|unique:users|email',
            'password'=>'required|min:4|max:120',
            'type'=>'required'
        ];
    }
public function messages()
{
    return [
        'name.required' => 'el nombre es obligatorio',
        'name.min' => 'el nombre debe de tener minimo 4 caracteres',
        'email.email'  => 'el email es incorrecto',
        'type.required'=>' seleccionar tipo de usuario'
    ];
}
}
