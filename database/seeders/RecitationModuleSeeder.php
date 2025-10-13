<?php

namespace Database\Seeders;

use App\Models\RecitationModule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecitationModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Iqra Series
        RecitationModule::create([
            'recitation_name' => 'Iqra 1',
            'first_page' => 1,
            'end_page' => 31,
            'is_complete_series' => 0,
            'level_type' => 'Iqra',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Iqra 2',
            'first_page' => 1,
            'end_page' => 30,
            'is_complete_series' => 0,
            'level_type' => 'Iqra',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Iqra 3',
            'first_page' => 1,
            'end_page' => 30,
            'is_complete_series' => 0,
            'level_type' => 'Iqra',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Iqra 4',
            'first_page' => 1,
            'end_page' => 30,
            'is_complete_series' => 0,
            'level_type' => 'Iqra',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Iqra 5',
            'first_page' => 1,
            'end_page' => 30,
            'is_complete_series' => 0,
            'level_type' => 'Iqra',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Iqra 6',
            'first_page' => 1,
            'end_page' => 31,
            'is_complete_series' => 0,
            'level_type' => 'Iqra',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Finish Iqra Series',
            'first_page' => 1,
            'end_page' => 182,
            'is_complete_series' => 1,
            'level_type' => 'Iqra',
            'badge' => null,
        ]);

        // Al-Quran Series

        RecitationModule::create([
            'recitation_name' => 'Juz 1',
            'first_page' => 1,
            'end_page' => 21,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 2',
            'first_page' => 22,
            'end_page' => 41,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 3',
            'first_page' => 42,
            'end_page' => 61,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 4',
            'first_page' => 62,
            'end_page' => 81,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 5',
            'first_page' => 82,
            'end_page' => 101,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 6',
            'first_page' => 102,
            'end_page' => 120,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 7',
            'first_page' => 121,
            'end_page' => 141,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 8',
            'first_page' => 142,
            'end_page' => 161,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 9',
            'first_page' => 162,
            'end_page' => 181,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 10',
            'first_page' => 182,
            'end_page' => 200,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 11',
            'first_page' => 201,
            'end_page' => 221,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 12',
            'first_page' => 222,
            'end_page' => 241,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 13',
            'first_page' => 242,
            'end_page' => 261,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 14',
            'first_page' => 262,
            'end_page' => 281,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 15',
            'first_page' => 282,
            'end_page' => 301,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 16',
            'first_page' => 302,
            'end_page' => 321,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 17',
            'first_page' => 322,
            'end_page' => 341,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 18',
            'first_page' => 342,
            'end_page' => 361,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 19',
            'first_page' => 362,
            'end_page' => 381,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 20',
            'first_page' => 382,
            'end_page' => 401,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 21',
            'first_page' => 402,
            'end_page' => 421,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 22',
            'first_page' => 422,
            'end_page' => 441,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 23',
            'first_page' => 442,
            'end_page' => 461,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 24',
            'first_page' => 462,
            'end_page' => 481,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 25',
            'first_page' => 482,
            'end_page' => 501,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 26',
            'first_page' => 502,
            'end_page' => 521,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 27',
            'first_page' => 522,
            'end_page' => 541,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 28',
            'first_page' => 542,
            'end_page' => 561,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 29',
            'first_page' => 562,
            'end_page' => 581,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Juz 30',
            'first_page' => 582,
            'end_page' => 604,
            'is_complete_series' => 0,
            'level_type' => 'Quran',
            'badge' => null,
        ]);

        RecitationModule::create([
            'recitation_name' => 'Khatam Al-Quran',
            'first_page' => 1,
            'end_page' => 604,
            'is_complete_series' => 1,
            'level_type' => 'Quran',
            'badge' => null,
        ]);
    }
}
