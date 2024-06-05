<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notes = [
            [
                'id_utilisateur' => 1, // Assuming user with ID 1 exists
                'id_livre' => 1, // Assuming book with ID 1 exists
                'id_dvd' => null,
                'type_ressource' => 'livre',
                'note' => 4.5,
                'commentaire' => 'Très bon livre, j\'ai adoré!',
                'date_note' => '2024-06-05', // Assuming the date of the note
            ],
            [
                'id_utilisateur' => 2, // Assuming user with ID 2 exists
                'id_livre' => null,
                'id_dvd' => 1, // Assuming DVD with ID 1 exists
                'type_ressource' => 'dvd',
                'note' => 3.8,
                'commentaire' => 'Un bon film mais la fin était prévisible.',
                'date_note' => '2024-06-10', // Assuming the date of the note
            ],
            // Add more examples as needed
        ];

        // Insert data into the 'note' table
        DB::table('note')->insert($notes);
    }
}
