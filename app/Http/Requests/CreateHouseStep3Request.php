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
            'title' => 'required|regex:/^[\pL\s\-\']+$/u|max:60|min:5',
            'category_id' => 'required|required_if:category_id,0|numeric',
            'nb_personnes' => 'required|numeric|between:1,16',
            'start_date' => 'required|date_format:d/m/Y',
            'end_date' => 'required|date_format:d/m/Y',
            'description' => 'required|regex:/^[0-9\pL\s\d\'\’\-\(\)\.\,\@\?\!\;\^\"\:]+$/u|max:1000|min:30'
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
            'title.min'  => 'Votre titre ne doit pas faire moins de 5 caractères',
            'title.max'  => 'Votre titre ne doit pas dépasser 60 caractères',
            'title.regex'  => 'Votre titre peut contenir que des lettres, espaces, tirets et les apostrophes',
            'category_id.required' => "Veuillez choisir le type d'hebergement de votre annonce",
            'category_id.required_if' => "Veuillez choisir le type d'hebergement de votre annonce",
            "category_id.numeric" => "Veuillez saisir le bon type d'annonce",
            'nb_personnes.required' => "Veuillez choisir le nombre de personnes",
            'nb_personnes.numeric' => "le nombre de personnes sélectionné doit être un chiffre/nombre",
            'nb_personnes.between' => "le nombre de personnes sélectionné doit être compris entre 1 et 15",
            'start_date.required' => "Veuillez sélectionner une date de départ",
            'start_date.date_format' => "Veuillez mettre la date au format dd/mm/yyyy",
            'end_date.required' => "Veuillez sélectionner une date de retour",
            'end_date.date' => "Veuillez mettre une date",
            'end_date.date_format' => "Veuillez mettre la date au format dd/mm/yyyy",
            'description.required' => 'Veuillez saisir une description de votre annonce',
            'description.min' => 'Votre description ne doit pas faire moins de 30 caractères.',
            'description.max' => 'Votre description ne doit contenir que 1000 caractères max.',
            'description.regex' => 'Les caractères spéciaux permis sont : les ponctuations, apostrophes, accents, parenthèses, tirets et arobases'
        ];
    }
}
