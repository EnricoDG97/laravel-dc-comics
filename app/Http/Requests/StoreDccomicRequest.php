<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDccomicRequest extends FormRequest
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
            'title' => 'required|min:3|max:50',
            'description' => 'nullable',
            'thumb' => 'required',
            'price' => 'required',
            'series' => 'required',
            'sale_date' => 'required',
            'type' => 'required',
       ];
    }
    
    // per i messaggi di errore personalizzati
    public function messages()
    {
        return [
            'title.required' => 'Titolo obbligatiorio',
            'title.min' => 'Titolo deve avere una lunghezza maggiore di :min caratteri'
            // . . .
        ];
    }
}
