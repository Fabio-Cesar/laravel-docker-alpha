<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field cannot be empty!',
            'name.string' => 'The name field must be a string!',
            'name.max' => 'The name field is too large! Maximum of 255 characters',
            'email.required' => 'The email field cannot be empty!',
            'email.email' => 'The email informed is not valid'
        ];
    }
}
