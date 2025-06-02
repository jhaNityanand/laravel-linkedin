<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEducationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Or apply your authorization logic here
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
            return [
                'school' => ['required', 'string', 'max:255'],
                'degree' => ['nullable', 'string', 'max:255'],
                'field_of_study' => ['nullable', 'string', 'max:255'],
                'start_date' => ['nullable', 'date'],
                'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
                'description' => ['nullable', 'string'],
        ];
    }
}
