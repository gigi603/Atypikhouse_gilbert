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
            'photo' => 'image|mimes:jpg,png,jpeg|dimensions:min_width=450,min_height=300,max_width=1920,max_height=1080',
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
            'photo.dimensions' => 'Votre image doit faire minimum 450px de largeur et 300px de hauteur et maximum 1920px de largeur et 1080px de hauteur'
        ];
    }
}
