<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProjectRequest extends FormRequest
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
        'name' => 'required|string|max:255',
        'status' => 'required|in:active,inactive',
    ];
}

public function render($request, Throwable $exception)
{
    if ($exception instanceof ValidationException) {
        return response()->noContent(422); // Empty response with 422 status
    }

    return parent::render($request, $exception);
}
public function messages()
{
    return [
        'name.required' => 'The project name is required.',
        'name.string' => 'The project name must be a valid text.',
        'name.max' => 'The project name cannot exceed 255 characters.',
        'status.required' => 'The project status is required.',
        'status.in' => 'The status must be either "active" or "inactive".'
    ];
}
}
