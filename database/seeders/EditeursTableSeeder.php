<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EditeursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $editeurs = [
            [
                'nom' => 'Gallimard',
            ],
            [
                'nom' => 'Hachette',
            ],
            [
                'nom' => 'Flammarion',
            ],
            [
                'nom' => 'Le Seuil',
            ],
            [
                'nom' => 'Grasset',
            ],
        ];

        // Insert data into the 'editeurs' table
        DB::table('editeurs')->insert($editeurs);
    }
}
