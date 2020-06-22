<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CommentRequest extends FormRequest
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
            'comment' => 'required|min:2|max:255|regex:/^[0-9\pL\s\d\'\’\«»\-\_\€²\()\.\,\@\?\!\;\"\/\+\=\:\ ]*$/u'
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
            'comment.required' => 'Veuillez saisir un commentaire',
            'comment.regex' => "Les caractères spéciaux permis sont : les ponctuations, guillemets, apostrophes, accents, parenthèses, tirets et arobases",
            'comment.min' => "Votre commentaire doit faire minimum 2 caractères",
            'comment.max' => "Votre commentaire ne doit pas depasser 255 caractères"
        ];
    }
}
