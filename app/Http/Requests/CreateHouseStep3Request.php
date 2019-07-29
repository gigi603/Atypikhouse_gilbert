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
            'description' => 'required'
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
            'title.regex'  => 'Votre titre doit contenir que des lettres et non des caractères spéciaux',
            'category.required_if' => "Veuillez choisir le type d'hebergement de votre annonce",
            'description.required' => 'Veuillez saisir une description de votre annonce',
        ];
    }
}
