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
            ],
            [
                'nom' => 'Anglais',
            ],
            [
                'nom' => 'Espagnol',
            ],
            [
                'nom' => 'Allemand',
            ],
            [
                'nom' => 'Italien',
            ],
        ];

        // Insert data into the 'langues' table
        DB::table('langues')->insert($langues);
    }
}
