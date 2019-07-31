<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title_uz' => 'required|string|max:255',
            'title_cyrl' => 'max:255',
            'title_ru' => 'max:255',
            'title_en' => 'max:255',
            'description_uz' => 'required|max:1000',
            'description_cyrl' => 'max:1000',
            'description_ru' => 'max:1000',
            'description_en' => 'max:1000',
            'body_uz' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:10240'
        ];
    }
}
