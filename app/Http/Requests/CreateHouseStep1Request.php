<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateHouseStep1Request extends FormRequest
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
            'pays' => 'required|regex:/^[a-zA-Z\s\-]+$/u|max:30',
            'ville' => 'required|regex:/^[a-zA-Z\s\-]+$/u|max:30',
            'adresse' => 'required|regex:/^[a-zA-Z0-9\s\-]+$/u|max:50',
            'telephone' => 'required|regex:/(0)[0-9]{9}/|size:10'
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
            'pays.required' => 'Veuillez saisir un pays',
            'pays.max'  => 'Votre pays ne doit pas dépasser 30 caractères',
            'pays.regex'  => 'Votre pays doit contenir que des lettres et non des caractères spéciaux sauf le tiret du mileu et les espaces',
            'ville.required' => 'Veuillez saisir une ville',
            'ville.max'  => 'Votre ville ne doit pas dépasser 30 caractères',
            'ville.regex'  => 'Votre ville doit contenir que des lettres et non des caractères spéciaux sauf le tiret du mileu et les espaces',
            'adresse.required' => 'Veuillez saisir une adresse',
            'adresse.max'  => 'Votre adresse ne doit pas dépasser 30 caractères',
            'adresse.regex'  => 'Votre adresse ne doit pas contenir des caractères spéciaux sauf le tiret du mileu et les espaces',
            'telephone.required' => 'Veuillez saisir votre numéro de téléphone',
            'telephone.regex' => "Votre numéro de telephone doit contenir que des chiffres et commençant par un 0 et pas d'espaces",
            'telephone.size' => "Votre numéro de telephone doit contenir uniquement 10 chiffres et commençant par un 0  et pas d'espaces"
        ];
    }
}
