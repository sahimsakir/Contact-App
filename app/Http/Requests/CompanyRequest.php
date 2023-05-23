<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'website' => 'nullable|url',
            'email' => 'required|email',
            'address' => 'required',
        ];
    }
    public function attributes(): array
    {
        return [
            'user_id'=> 'user',
            'email'=> 'email address',
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => "Please enter your :attribute!",
            'email.email' => "The email that you entered is not valid!",
            'email.unique' => "The email that you entered is already in use!",

        ];
    }
}
