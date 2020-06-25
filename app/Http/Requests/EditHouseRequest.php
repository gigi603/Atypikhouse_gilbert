<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditHouseRequest extends FormRequest
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
            'title' => 'required|max:50|regex:/^[\pL\s\-\']+$/u',
            'category_id' => 'required|required_if:category_id,0|numeric',
            'nb_personnes' => 'required|numeric|between:1,16',
            'price' => 'required|regex:/^[0-9]+$/u|max:4',
            'adresse' => 'required|regex:/^[0-9\pL\s\-\,\']+$/u|max:80',
            'photo' => 'image|mimes:jpg,png,jpeg|max:20000',
            'start_date' => 'required|date_format:d/m/Y',
            'end_date' => 'required|date_format:d/m/Y',
            'description' => 'required|max:3000|regex:/^[0-9\pL\s\d\'\’\«»\-\_\€²\()\.\,\@\?\!\;\"\/\+\=\:\ ]*$/u',
            // 'propriete' => 'required|max:500'
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
            'title.required' => 'Veuillez saisir votre titre',
            'title.max' => 'Votre titre ne doit pas dépasser 50 caractères',
            'title.regex' => 'Votre titre peut contenir que des lettres, espaces et tirets',
            'category_id.required' => "Veuillez choisir le type d'hebergement de votre annonce",
            'category_id.required_if' => "Veuillez choisir le type d'hebergement de votre annonce",
            "category_id.numeric" => "Veuillez saisir le bon type d'annonce",
            'nb_personnes.required' => "Veuillez choisir le nombre de personnes",
            'nb_personnes.numeric' => "le nombre de personnes sélectionné doit être un chiffre/nombre",
            'nb_personnes.between' => "le nombre de personnes sélectionné doit être compris entre 1 et 15",
            'adresse.required' => 'Veuillez saisir votre adresse',
            'adresse.max' => 'Votre adresse ne doit pas dépasser 80 caractères',
            'adresse.regex' => 'Votre adresse ne doit pas contenir de caractères spéciaux',
            'price.required' => 'Veuillez saisir le prix par nuit',
            'price.regex' => 'Veuillez saisir uniquement des chiffres',
            'price.max' => 'Vous ne pouvez pas mettre un montant de plus de 4 chiffres',
            'photo.required' => 'Veuillez mettre une photo de votre hebergement',
            'photo.image' => 'Veuillez mettre une image',
            'start_date.required' => "Veuillez sélectionner une date de départ",
            'start_date.date_format' => "Veuillez mettre la date au format dd/mm/yyyy",
            'end_date.required' => "Veuillez sélectionner une date de retour",
            'end_date.date' => "Veuillez mettre une date",
            'end_date.date_format' => "Veuillez mettre la date au format dd/mm/yyyy",
            'description.required' => 'Veuillez detailler votre annonce',
            'description.max' => 'La description de votre annonce ne doit pas dépasser 1000 caractères',
            'description.regex' => 'Les caractères spéciaux permis sont : les ponctuations, apostrophes, accents, parenthèses, tirets et arobases'
        ];
    }
}
