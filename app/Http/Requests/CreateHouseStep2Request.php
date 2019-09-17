<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateHouseStep2Request extends FormRequest
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
            'telephone' =>'required|phone:FR,BE,IT,ES|numeric|digits:10',
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
            'telephone.required' => 'Veuillez saisir votre numéro de téléphone',
            'telephone.phone' => 'Veuillez saisir un numéro de telephone valide',
            'telephone.digits' => 'Veuillez saisir un numéro de téléphone à 10 chiffres',
            'telephone.numeric' => 'Veuillez saisir un numéro de téléphone valide',
        ];
    }
}
