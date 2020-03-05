<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CategoryRequest extends FormRequest
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
            'category' => 'required|min:2|max:30|regex:/^[\pL\s\-\']+$/u'
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
            'category.required' => 'Veuillez saisir une categorie',
            'category.regex' => "Veuillez saisir uniquement des lettres, les tirets et apostrophes sont autorisés ",
            'category.min' => "Votre categorie doit faire minimum 2 caractères",
            'category.max' => "Votre categorie ne doit pas depasser 255 caractères"
        ];
    }
}
