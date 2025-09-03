<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardian>
 */
class GuardianFactory extends Factory
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
            'age'          => $this->faker->numberBetween(30, 50),
            'gender'       => $this->faker->randomElement(['Male', 'Female']),
            'address'      => $this->faker->address,
            'email'        => $this->faker->unique()->safeEmail,
            'phone_number' => '01' . $this->faker->numberBetween(0, 9) . '-' . $this->faker->numerify('#######'),
            'status'       => 'active',
            'profile'      => null,
            'password'     => Hash::make($ic), // guna IC yang sama untuk hash
        ];
    }
}
