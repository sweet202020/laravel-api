<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => [
                'required',
                Rule::unique('projects')->ignore($this->project->id),
                'min:5',
                'max:100'
            ],
            'description' => 'required|max:500',
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

            'title.required' => 'il titolo e` richiesto, non eliminarlo',
            'title.min' => 'il titolo deve contenere almeno :min caratteri',
            'title.max' => 'il titolo puo` contenere massimo :max caratteri',
            'description.required' => 'la descrizione e` richiesta, non eliminarla',
            'description.max' => 'la descrizione puo` contenere massimo :max caratteri',
            'difficulty.required' => 'la difficolta` e` richiesta, non eliminarla',
            'difficulty.max' => 'la difficolta` puo` contenere solo :max caratteri',
            'language.max' => 'il linguaggio puo` contenere solo :max caratteri',
            'language.required' => 'il linguaggio e` richiesto, non eliminarlo',
            'cover_image.max' => 'il file e` troppo grande',
            'cover_image.image' => 'il file deve essere un immagine'
        ];
    }
}
