<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Costumer>
 */
class CostumerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_ktp' => $this->faker->numberBetween(1000000000000000, mt_getrandmax()),
            'name' => $this->faker->name(),
            'date_of_birth' => $this->faker->date(),
            'email' =>$this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'description' => $this->faker->text()
        ];
    }
}
