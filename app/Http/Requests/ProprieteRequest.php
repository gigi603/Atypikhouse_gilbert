<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProprieteRequest extends FormRequest
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
            'propriete' => 'required|min:2|max:30|regex:/^[\pL\s\-\']+$/u'
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
            'propriete.required' => 'Veuillez saisir une proprieté',
            'propriete.regex' => "Veuillez saisir uniquement des lettres, les tirets et apostrophes sont autorisés ",
            'propriete.min' => "Votre proprieté doit faire minimum 2 caractères",
            'propriete.max' => "Votre proprieté ne doit pas depasser 255 caractères"
        ];
    }
}
