<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateHouseStep1Request extends FormRequest
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
            'adresse' => 'required|regex:/^[0-9\pL\s\-\'\,]+$/u|max:80',
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
            'adresse.required' => 'Veuillez saisir une adresse valide',
            'adresse.regex' => "Votre adresse n'est pas valide",
            'adresse.max' => "Votre adresse n'est pas valide, elle est anormalement trop longue"
        ];
    }
}
