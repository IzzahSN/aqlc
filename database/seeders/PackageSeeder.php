<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // contoh data real sikit
        Package::create([
            'package_name'         => 'An-Nur Lite',
            'package_type'         => 'personal',
            'status'               => 'active',
            'package_rate'         => 20,
            'duration_per_sessions' => '30 minutes',
            'unit'                 => 'per seesion',
            'details'              => '1-to-1 personal learning, 30 minutes per session.',
            'session_per_week'     => 2,
        ]);

        Package::create([
            'package_name'         => 'An-Nur Pro',
            'package_type'         => 'group',
            'status'               => 'active',
            'package_rate'         => 100,
            'duration_per_sessions' => '1 hour',
            'unit'                 => 'per month',
            'details'              => 'Group learning session for up to 6 students.',
            'session_per_week'     => 3,
        ]);

        // generate random data dengan factory
        Package::factory()->count(5)->create();
    }
}
