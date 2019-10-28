<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHouseStep5Request extends FormRequest
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
            'photo' => 'image|mimes:jpg,png,jpeg|size:500|dimensions:min_width=450,min_height=300,max_width=1280,max_height=1000',
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
            'photo.required' => 'Veuillez mettre une photo de votre hebergement',
            'photo.image' => 'Veuillez mettre une image au format jpg,png ou jpeg',
            'photo.size' => "L'image doit faire minimum 500ko",
            'photo.dimensions' => 'Votre doit faire minimum 450px de largeur et 300 de hauteur'
        ];
    }
}
