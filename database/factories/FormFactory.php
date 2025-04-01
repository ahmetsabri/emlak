<?php

namespace Database\Factories;

use App\Models\County;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Form>
 */
class FormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->userName(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'province_id' => Province::inRandomOrder()->first(),
            'county_id' => County::inRandomOrder()->first(),
            'note' => fake()->sentence(rand(10, 70)),
        ];
    }
}
