<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "email" => "required|email",
            "password" => "required|regex:/^[0-9\pL\s\d\'\’\-\(\)\.\,\@\?\!\;\^\"\:]+$/u"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Veuillez saisir une adresse email',
            'email.email' => 'Veuillez saisir une adresse email valide',
            'password.required' => "Un mot de passe est requis",
            'password.regex' => "Les caractères spéciaux autorisés sont : les ponctuations, slash, arobathes, tirets, apostrophes, parentheses et les guillemets"
        ];
    }
}
