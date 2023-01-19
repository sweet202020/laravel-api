<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:projects,title|min:5|max:100',
            'description' => 'required|max:300',
            'difficulty' => 'required|max:30',
            'language' => 'required|max:50',
            'cover_image' => 'nullable|image|max:300',
            'type_id' => 'nullable|exists:types,id',
            'technologies'=>'nullable|exists:technologies,id'
        ];
    }
    public function messages()
    {
        return [

            'title.required' => 'il titolo e` richiesto',
            'title.unique' => 'il titolo deve essere univoco',
            'title.min' => 'il titolo deve contenere almeno :min caratteri',
            'title.max' => 'il titolo puo` contenere massimo :max caratteri',
            'description.required' => 'la descrizione e` richiesta',
            'description.max' => 'la descrizione puo` contenere massimo :max caratteri',
            'difficulty.max' => 'la difficolta` puo` contenere solo :max caratteri',
            'difficulty.required' => 'la difficolta` e` richiesta',
            'language.max' => 'il linguaggio puo` contenere solo :max caratteri',
            'language.required' => 'il linguaggio e` richiesto',
            'cover_image.max' => 'il file e` troppo grande',
            'cover_image.image' => 'il file deve essere un immagine'

        ];
    }
}
