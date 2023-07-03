<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cars>
 */
class CarsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'marka'=>$this->faker->word(),
            'tipus'=>$this->faker->word(),
            'napAr'=>round($this->faker->numberBetween(3500,12000),-2),
            'kep'=> $this->faker->imageUrl(640, 480, 'vehicles', true)
        ];
    }
}
