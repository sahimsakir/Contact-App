<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'company' => 'nullable',
            'bio' => 'nullable',
            'profile_picture' => 'nullable|mimes:jpeg,bmp,png',
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => "Please enter your :attribute!",
            'profile_picture.mimes' => "Selected image should in jpeg or bmp or png!",

        ];
    }
    public function handleRequest()
    {
        $profileData = $this->validated();
        $profile = $this->user();

        if($this->hasFile('profile_picture')){
            $picture = $this->profile_picture;
            $picture->move(public_path('assets/images/profile-pictures'), $fileName = "profile-picture-{$profile->id}.".$picture->getClientOriginalExtension());
            $profileData['profile_picture'] = $fileName;
        }
        return $profileData;
    }
}
