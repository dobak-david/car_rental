<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cars;
use App\Models\Reservations;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        for ($i = 0; $i < 10; $i++) {
            $car = Cars::factory()->create([]);
            if ($i % 2 == 0) {
                if ($i % 3 == 0) {
                    Reservations::factory()->create([
                        'berlo_telefon' => 36300000000 + $i,
                        'auto_id' => $car->id,
                        'berles_vege' => fake()->dateTimeBetween('-2 days', '-1 days')
                    ]);
                } else {
                    Reservations::factory()->create([
                        'berlo_telefon' => 36300000000 + $i,
                        'auto_id' => $car->id,
                    ]);
                }
            }
        }
    }
}
