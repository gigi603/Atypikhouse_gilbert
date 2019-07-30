<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHouseStep3Request extends FormRequest
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
            'title' => 'required|regex:/^[\pL\s\-]+$/u|max:30',
            'category' => 'required_if:category_id,0',
            'nb_personnes' => 'required',
            'start_date' => 'required|date_format:d/m/Y',
            'end_date' => 'required|date_format:d/m/Y',
            'description' => 'required|regex:/^[0-9\pL\s\-\()\.\,]+$/u|max:500'
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
            'title.required' => 'Veuillez saisir le titre de votre annonce',
            'title.max'  => 'Votre titre ne doit pas dépasser 40 caractères',
            'title.regex'  => 'Votre titre doit contenir que des lettres ou des espaces',
            'category.required_if' => "Veuillez choisir le type d'hebergement de votre annonce",
            'nb_personnes.required' => "Veuillez choisir le nombre de personnes",
            'start_date.required' => "Veuillez sélectionner une date de départ",
            'start_date.date_format' => "Veuillez mettre la date au format dd/mm/yyyy",
            'end_date.required' => "Veuillez sélectionner une date de retour",
            'end_date.date' => "Veuillez mettre une date",
            'end_date.date_format' => "Veuillez mettre la date au format dd/mm/yyyy",
            'description.required' => 'Veuillez saisir une description de votre annonce',
            'description.max' => 'Votre description ne doit contenir que 500 caractères max.',
            'description.regex' => 'Les caractères spéciaux autorisés sont: les parenthèses, virgules, points et les espaces'
        ];
    }
}
