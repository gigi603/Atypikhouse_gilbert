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
            "ville" => "required",
            "category_id" => "required|not_in:0",
            "start_date" => "required",
            "end_date" => "required",
            "nb_personnes" => "required|not_in:0"
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
            "ville.required" => "Vous devez saisir une ville",
            "category_id.required" => "Vous devez choisir un type d'hebergement",
            "start_date.required" => "Vous devez choisir votre date de départ",
            "end_date.required" => "Vous devez choisir une date de retour",
            "nb_personnes.required" => "Vous devez choisir un nombre de personnes"
        ];
    }
}
