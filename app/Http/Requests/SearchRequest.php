<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            "category_id" => "required_if:category_id,0|numeric",
            "start_date" => "required|date_format:d/m/Y",
            "end_date" => "required|date_format:d/m/Y",
            "nb_personnes" => "required|numeric|between:1,16"
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
            "category.required_if" => "Veuillez choisir le type d'annonce de votre annonce",
            "category_id.numeric" => "Veuillez saisir le bon type d'annonce",
            "start_date.required" => "Vous devez choisir votre date de départ",
            "start_date.date_format" => "Veuillez mettre la date au format dd/mm/yyyy",
            "end_date.required" => "Vous devez choisir une date de retour",
            "end_date.date_format" => "Veuillez mettre la date au format dd/mm/yyyy",
            "nb_personnes.required" => "Vous devez choisir un nombre de personnes",
            "nb_personnes.numeric" => "le nombre de personnes sélectionné doit être un chiffre/nombre",
            "nb_personnes.between" => "le nombre de personnes sélectionné doit être compris entre 1 et 15"
        ];
    }
}
