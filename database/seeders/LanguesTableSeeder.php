<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langues = [
            [
                'nom' => 'Français',
                'code' => 'fr',
            ],
            [
                'nom' => 'Anglais',
                'code' => 'en',
            ],
            [
                'nom' => 'Espagnol',
                'code' => 'es',
            ],
            [
                'nom' => 'Allemand',
                'code' => 'de',
            ],
            [
                'nom' => 'Italien',
                'code' => 'it',
            ],
        ];

        // Insert data into the 'langues' table
        DB::table('langues')->insert($langues);
    }
}
