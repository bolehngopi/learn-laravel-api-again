<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReturRequest extends FormRequest
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
            'costumer_id' => 'required|integer|exists:costumers,id',
        'id_penalties' => 'required|integer|exists:penalties,id',
        'date_borrow' => 'required|date',
        'date_return' => 'required|date',
        'discount' => 'required|integer',
        'total' => 'required|integer',
        ];
    }
}
