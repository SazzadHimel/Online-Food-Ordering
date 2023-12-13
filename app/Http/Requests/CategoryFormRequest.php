<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name'=> ['required', 'string'],
            'slug'=> ['required', 'string'],
            'description'=> ['required', 'string'],
            'image'=>['nullable','mimes:jpg,jpeg,png'],
            'status'=>['nullable','boolean'],
            'meta_title'=>['required','string'],
            'meta_keyword'=>['required','string'],
            'meta_description'=>['required','string'],
        ];
    }
}