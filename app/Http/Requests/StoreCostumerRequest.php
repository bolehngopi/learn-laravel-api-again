<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCostumerRequest extends FormRequest
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
            'no_ktp' => 'integer|max:16|required',
            'name' => 'string|required',
            'date_of_birth' => 'date|required',
            'email' => 'string|unique:costumers',
            'phone' => 'integer|required',
            'description' => 'string'
        ];
    }
}
