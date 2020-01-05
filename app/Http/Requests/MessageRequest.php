<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'content' => 'required|max:1000|min:2|regex:/^[0-9\pL\s\'\-\()\.\,\@\?\!\;\"\:]+$/u',
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
            'content.required' => 'Veuillez saisir votre message',
            'content.min' => "Veuillez saisir un message de minimum 2 caractères",
            'content.max' => 'Votre message ne doit pas dépasser 1000 caractères',
            'content.regex' => 'Les caractères spéciaux permis sont : les ponctuations, apostrophes, accents, parenthèses, tirets et arobases',
        ];
    }

    
}
