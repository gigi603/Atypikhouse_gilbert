<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ReservationRequest extends FormRequest
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
            'start_date' => 'required|date_format:d/m/Y',
            'end_date' => 'required|date_format:d/m/Y',
            'nb_personnes' => 'required|numeric'
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
            'start_date.required' => 'Veuillez sélectionner une date',
            'start_date.date_format' => "Votre date n'est pas bon format sélectionnez une date via le calendrier",
            'end_date.required' => 'Veuillez sélectionner une date',
            'end_date.date_format' => "Votre date n'est pas bon format sélectionnez une date via le calendrier",
            'nb_personnes.required' => "Veuillez choisir le nombre de personnes",
            'nb_personnes.numeric' => "le nombre de personnes sélectionné doit être un chiffre/nombre"
        ];
    }
}
