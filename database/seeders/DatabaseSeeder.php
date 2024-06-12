<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PaysTableSeeder::class,
            AuteursTableSeeder::class,
            EditeursTableSeeder::class,
            LanguesTableSeeder::class,
            ActeursTableSeeder::class,
            RealisateursTableSeeder::class,
            UtilisateursTableSeeder::class,
            CastingsTableSeeder::class,
            LivresTableSeeder::class,
            DVDSTableSeeder::class,
            DVDLanguesTableSeeder::class,
            NoteTableSeeder::class,
            ReservationsTableSeeder::class,
            LivreLanguesTableSeeder::class,
            // Add more seeders as needed
        ]);
    }
}
