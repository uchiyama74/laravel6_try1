<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'title' => 'bail|required|unique:posts|max:255',
            'body' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です。'
        ];
    }

    public function attributes()
    {
        return [
            'body' => '本文',
        ];
    }
}
