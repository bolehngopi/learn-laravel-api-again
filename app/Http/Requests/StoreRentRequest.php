<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRentRequest extends FormRequest
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
            'no_car' => 'required|integer',
            'date_borrow' => 'required|date',
            'date_return' => 'required|date',
            'down_payment' => 'required|integer',
            'discount' => 'required|integer',
            'total' => 'required|integer',
        ];
    }
}
