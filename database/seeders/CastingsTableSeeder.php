<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CastingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $castings = [
            [
                'id_acteur' => 1, // Assuming 'Gérard Depardieu' has an ID of 1 in the 'acteurs' table
                'id_dvd' => 1,    // Assuming this DVD exists with ID 1
            ],
            [
                'id_acteur' => 2, // Assuming 'Juliette Binoche' has an ID of 2 in the 'acteurs' table
                'id_dvd' => 1,    // Assuming this DVD exists with ID 1
            ],
            [
                'id_acteur' => 3, // Assuming 'Jean Reno' has an ID of 3 in the 'acteurs' table
                'id_dvd' => 2,    // Assuming this DVD exists with ID 2
            ],
            [
                'id_acteur' => 4, // Assuming 'Jean Dujardin' has an ID of 4 in the 'acteurs' table
                'id_dvd' => 3,    // Assuming this DVD exists with ID 3
            ],
            [
                'id_acteur' => 5, // Assuming 'Isabelle Huppert' has an ID of 5 in the 'acteurs' table
                'id_dvd' => 4,    // Assuming this DVD exists with ID 4
            ],
        ];

        // Insert data into the 'castings' table
        DB::table('castings')->insert($castings);
    }
}
