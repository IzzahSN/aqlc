<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tutor>
 */
class TutorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ic = $this->faker->numerify('############');
        $prefix = $this->faker->randomElement(['Ustaz', 'Ustazah']);

        return [
            'first_name'   => $this->faker->firstName,
            'last_name'    => $this->faker->lastName,
            'username' => $prefix . ' ' . $this->faker->firstName,
            'ic_number'    => $ic,
            'birth_date'   => $this->faker->date(),
            'age'          => $this->faker->numberBetween(20, 35),
            'gender'       => $this->faker->randomElement(['Male', 'Female']),
            'address'      => $this->faker->address,
            'email'        => $this->faker->unique()->safeEmail,
            'phone_number' => '01' . $this->faker->numberBetween(0, 9) . '-' . $this->faker->numerify('#######'),
            'university'   => 'University of Malaya',
            'programme'    => 'Bachelor of Islamic Studies',
            'grade'        => $this->faker->randomFloat(2, 3.0, 4.0),
            'resume'       => null,
            'bg_description' => $this->faker->sentence,
            'role'         => $this->faker->randomElement(['Admin', 'Tutor']),
            'status'       => 'active',
            'profile'      => null,
            'password'     => Hash::make($ic), // guna IC yang sama untuk hash
        ];
    }
}
