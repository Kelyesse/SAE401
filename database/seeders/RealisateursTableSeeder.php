<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealisateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $realisateurs = [
            [
                'nom' => 'Spielberg',
            ],
            [
                'nom' => 'Scorsese',
            ],
            [
                'nom' => 'Nolan',
            ],
            [
                'nom' => 'Jeunet',
            ],
            [
                'nom' => 'Tarantino',
            ],
            [
                'nom' => 'Miller',
            ],
            [
                'nom' => 'Zemeckis',
            ],
            [
                'nom' => 'Anderson',
            ],
            [
                'nom' => 'Miyazaki',
            ],
        ];

        // Insert data into the 'realisateurs' table
        DB::table('realisateurs')->insert($realisateurs);
    }
}
