<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivreLanguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $livre_langues = [
            [
                'id_livre' => 1, // Assuming Book with ID 1 exists
                'id_langue' => 1, // Assuming 'Français' has an ID of 1 in the 'langues' table
            ],
            [
                'id_livre' => 1, // Assuming Book with ID 1 exists
                'id_langue' => 2, // Assuming 'Anglais' has an ID of 2 in the 'langues' table
            ],
            [
                'id_livre' => 2, // Assuming Book with ID 2 exists
                'id_langue' => 1, // Assuming 'Français' has an ID of 1 in the 'langues' table
            ],
            [
                'id_livre' => 2, // Assuming Book with ID 2 exists
                'id_langue' => 3, // Assuming 'Espagnol' has an ID of 3 in the 'langues' table
            ],
            [
                'id_livre' => 3, // Assuming Book with ID 3 exists
                'id_langue' => 1, // Assuming 'Français' has an ID of 1 in the 'langues' table
            ],
        ];

        // Insert data into the 'livre_langues' table
        DB::table('livre_langues')->insert($livre_langues);
    }
}
