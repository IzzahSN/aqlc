<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ic = $this->faker->numerify('############');
        return [
            'first_name'   => $this->faker->firstName,
            'last_name'    => $this->faker->lastName,
            'ic_number'    => $ic,
            'birth_date'   => $this->faker->date(),
            'age'          => $this->faker->numberBetween(3, 17),
            'gender'       => $this->faker->randomElement(['Male', 'Female']),
            'address'      => $this->faker->address,
            'admission_date' => $this->faker->date(),
            'status'       => 'active',
        ];
    }
}
