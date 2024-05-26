<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CostumerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'no_ktp' => $this->no_ktp,
            'name' => $this->name,
            'date_of_birth' => $this->date_of_birth,
            'email' => $this->email,
            'phone' => $this->phone,
            'description ' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'rentals' => $this->whenLoaded('rentals'),
            'returs' => $this->whenLoaded('returs'),
            // 'penalties' => $this->penalties,
        ];
    }
}
