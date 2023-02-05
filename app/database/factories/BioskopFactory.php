<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bioskop>
 */
class BioskopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'naziv' => $this->faker->company(),
            'kontakt' => $this->faker->phoneNumber(),
            'lokacija' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail()
        ];
    }
}