<?php

namespace Database\Factories;

use App\Models\Costumer;
use App\Models\Penalty;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Retur>
 */
class ReturFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'costumer_id' => FactoryHelper::getRandomModelId(Costumer::class),
            'no_car' => $this->faker->randomNumber(5),
            'id_penalties' => FactoryHelper::getRandomModelId(Penalty::class),
            'date_borrow' => $this->faker->dateTimeThisYear->format('Y-m-d'),
            'date_return' => $this->faker->dateTimeThisYear->format('Y-m-d'),
            'discount' => $this->faker->randomFloat(2, 0, 100),
            // 'total' => $this->faker->randomFloat(2, 0, 100)
        ];
    }
}
