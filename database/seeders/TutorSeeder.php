<?php

namespace Database\Seeders;

use App\Models\Tutor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tutor::factory(10)->create();
        Tutor::create([
            'first_name' => 'Nurul Izzah',
            'last_name'  => 'Binti Shahrul Nizam',
            'username'   => 'Ustazah Izzah',
            'ic_number'  => '030710101656',
            'birth_date' => '2003-07-10',
            'age'        => 22,
            'gender'     => 'Female',
            'phone_number'      => '0132788701',
            'role'       => 'Admin',
            'email'      => 'izzahfsn@gmail.com',
            'status'     => 'active',
            'password' => Hash::make('030710101656'),
        ]);
    }
}
