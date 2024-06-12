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
                'id_acteur' => 1,
                'id_dvd' => 1,
            ],
            [
                'id_acteur' => 2,
                'id_dvd' => 1,
            ],
            [
                'id_acteur' => 3,
                'id_dvd' => 2,
            ],
            [
                'id_acteur' => 4,
                'id_dvd' => 3,
            ],
            [
                'id_acteur' => 5,
                'id_dvd' => 4,
            ],
            [
                'id_acteur' => 6,
                'id_dvd' => 2,
            ],
            [
                'id_acteur' => 7,
                'id_dvd' => 3,
            ],
            [
                'id_acteur' => 8,
                'id_dvd' => 4,
            ],
            [
                'id_acteur' => 9,
                'id_dvd' => 5,
            ],
            [
                'id_acteur' => 10,
                'id_dvd' => 6,
            ],
        ];

        // Insérer les données dans la table 'castings'
        DB::table('castings')->insert($castings);
    }
}
