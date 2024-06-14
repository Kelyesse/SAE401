<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActeursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $acteurs = [
            [
                'nom' => 'Depardieu',
            ],
            [
                'nom' => 'Binoche',
            ],
            [
                'nom' => 'Reno',
            ],
            [
                'nom' => 'Dujardin',
            ],
            [
                'nom' => 'Huppert',
            ],
            [
                'nom' => 'DiCaprio',
            ],
            [
                'nom' => 'Winslet',
            ],
            [
                'nom' => 'Pitt',
            ],
            [
                'nom' => 'Johansson',
            ],
            [
                'nom' => 'Oldman',
            ],
        ];

        // Insert data into the 'acteurs' table
        DB::table('acteurs')->insert($acteurs);
    }
}
