<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email') ],
            'password' => "required|min:5|max:12|confirmed",
        ];
    }

    //error messages
    public function messages()
    {
        return [
            'password.confirmed' => 'Password doesn\'t match.'
        ];
    }
}
