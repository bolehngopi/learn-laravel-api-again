<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRentRequest extends FormRequest
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
            'costumer_id' => 'integer|exists:costumers,id',
            'no_car' => 'integer',
            'date_borrow' => 'date',
            'date_return' => 'date',
            'down_payment' => 'integer',
            'discount' => 'integer',
            'total' => 'integer',
        ];
    }
}
