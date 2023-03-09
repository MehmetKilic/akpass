<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class PasswordStoreRequest extends FormRequest
{
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
            'category_id' => 'required|integer',
            'title' => 'required|string',
            'url' => 'required|url',
            'username' => 'required',
            'password' => 'required'
        ];
    }
}