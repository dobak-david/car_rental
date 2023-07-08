<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reservations>
 */
class ReservationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'berles_kezdete' => $this->faker->dateTimeBetween('-4 days','-3 days'),
            'berles_vege' => $this->faker->dateTimeBetween('1 days','3 days'),
            'berlo_neve' => $this->faker->sentence(2),
            'berlo_email' => $this->faker->email(),
            'berlo_cim' => $this->faker->sentence(4),
        ];
    }
}
