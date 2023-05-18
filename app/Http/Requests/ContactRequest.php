<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'company_id'=> 'company',
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
