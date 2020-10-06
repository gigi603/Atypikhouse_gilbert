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
            "email" => "required|email|max:30",
            "password" => "required|min:8|max:30"
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
            'email.max' => 'Votre adresse peut contenir maximum 30 caractères',
            'email.email' => 'Veuillez saisir une adresse email valide',
            'password.required' => "Un mot de passe est requis",
            'password.min' => "Votre mot de passe doit contenir minimum 8 caractères",
            'password.max' => "Votre mot de passe doit contenir maximum 30 caractères",
            //'password.regex' => "Les caractères spéciaux autorisés sont : les ponctuations, slash, tirets, apostrophes, parentheses et les guillemets"
        ];
    }
}
