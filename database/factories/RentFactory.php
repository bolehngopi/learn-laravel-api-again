<?php

namespace Database\Factories;

use App\Models\Costumer;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rent>
 */
class RentFactory extends Factory
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
            'no_car' => $this->faker->randomDigitNot(0),
            'date_borrow' => $this->faker->dateTimeThisCentury(),
            'date_return' => $this->faker->dateTimeThisYear(),
            'down_payment' => $this->faker->randomNumber(),
            'discount' => $this->faker->randomNumber(),
            'total' => $this->faker->randomNumber()
        ];
    }
}
