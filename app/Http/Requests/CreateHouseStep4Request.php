<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHouseStep4Request extends FormRequest
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
            'price' => 'required|regex:/^[0-9]+$/u|max:4|min:2'
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
            'price.required' => 'Veuillez saisir le prix par nuit',
            'price.regex' => 'Veuillez saisir uniquement des chiffres',
            'price.min' => 'Le prix ne doit pas dépasser 2 chiffres',
            'price.max' => 'Le prix ne doit pas dépassé 4 chiffres',
        ];
    }
}
