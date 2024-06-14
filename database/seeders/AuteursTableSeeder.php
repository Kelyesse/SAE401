<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuteursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auteurs = [
            [
                'nom' => 'Victor Hugo',
            ],
            [
                'nom' => 'Albert Camus',
            ],
            [
                'nom' => 'Émile Zola',
            ],
            [
                'nom' => 'Jean-Paul Sartre',
            ],
            [
                'nom' => 'Marguerite Duras',
            ],
            [
                'nom' => 'Antoine de Saint-Exupéry',
            ],
            [
                'nom' => 'Jane Austen',
            ],
            [
                'nom' => 'J.K. Rowling',
            ],
            [
                'nom' => 'J.R.R. Tolkien',
            ],
            [
                'nom' => 'George Orwell',
            ],
            [
                'nom' => 'Ernest Hemingway',
            ],
            [
                'nom' => 'F. Scott Fitzgerald',
            ],
        ];

        // Insert data into the 'auteurs' table
        DB::table('auteurs')->insert($auteurs);
    }
}
