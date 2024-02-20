<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Google\ReCaptcha\V2\ReCaptcha;

class RegisterRequest extends FormRequest
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

    public function rules( )

    {

        return [
            //

            'name' => ['required', 'string', 'max:255'],
            'telefono' => ['required','integer','digits_between:9,10'],
            'role'=> 'required|string',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/', // al menos una mayúscula
                'regex:/[0-9]/', // al menos un número
                'confirmed'
            ],

            'password_confirmation' => 'required|same:password',
            'imagen' => 'nullable'

        ];
    }
}



