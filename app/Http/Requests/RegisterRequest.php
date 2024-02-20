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
            'numero' => ['required','integer','digits_between:9,10'],
            'role'=> 'required|string',
            'pregunta'=> 'required|string',
            'respuesta'=> 'required|string',
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
            'g-recaptcha-response' => 'required'

        ];
    }
}
/**
 * 'g-recaptcha-response'=> function ($attribute, $value, $fail){
       *         $secretKey = config('services.recaptcha.secret');
            **    $response = $value;
           *     $userIP = $_SERVER['REMOTE_ADDR'];
           *     $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
            *    $response = \file_get_contents($url);
            *    $response = json_decode($response);
            *    if(!$response->success){
             *       $response->session()->flash('g-recaptcha-response', 'Por favor marcar la recaptcha');
              *      $response->session()->flash('alert-class', 'alert-danger');
*
              *      $fail($attribute.'Google reCaptcha fallado');
           *     }
          *  }
 */



