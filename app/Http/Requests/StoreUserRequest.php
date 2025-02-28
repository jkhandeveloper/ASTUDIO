<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
{
    return [
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed'
    ];
}

public function failedValidation(Validator $validator)
{
    throw new HttpResponseException(response()->noContent(422));
}
public function messages()
{
    return [
        'first_name.required' => 'First name is required.',
        'first_name.string' => 'First name must be a valid text.',
        'first_name.max' => 'First name cannot exceed 50 characters.',
        'last_name.required' => 'Last name is required.',
        'email.required' => 'Email is required.',
        'email.email' => 'Enter a valid email address.',
        'email.unique' => 'This email is already registered.',
        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least 8 characters.',
        'password.confirmed' => 'Passwords do not match.'
    ];
}
}
