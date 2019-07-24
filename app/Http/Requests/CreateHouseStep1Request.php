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
            'ville' => 'required|max:30', 
            'adresse' => 'required|max:50',
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
            'ville.required' => 'Veuillez saisir une ville',
            'adresse.required' => 'Veuillez saisir une adresse',
            'adresse.max'  => 'Votre adresse ne doit pas dépasser 30 caractères',
            'telephone.required' => 'Veuillez saisir votre numéro de téléphone',
            'telephone.regex' => "Votre numéro de telephone doit contenir que des chiffres et commençant par un 0 et pas d'espaces",
            'telephone.size' => "Votre numéro de telephone doit contenir uniquement 10 chiffres et commençant par un 0  et pas d'espaces"
        ];
    }
}
