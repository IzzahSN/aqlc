<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $durationOptions = ['30 minutes', '1 hour'];
        $unitOptions = ['per month', 'per session'];

        return [
            'package_name'        => $this->faker->words(2, true),
            'package_type'        => $this->faker->randomElement(['personal', 'group']),
            'status'              => $this->faker->randomElement(['active', 'inactive']),
            'package_rate'        => $this->faker->randomFloat(2, 10, 500), // contoh RM10 - RM500
            'duration_per_sessions' => $this->faker->randomElement($durationOptions),
            'unit'                => $this->faker->randomElement($unitOptions),
            'details'             => $this->faker->sentence(8),
            'session_per_week'    => $this->faker->numberBetween(1, 5),
        ];
    }
}
