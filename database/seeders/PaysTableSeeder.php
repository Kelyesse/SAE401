<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pays = [
            ['nom' => 'France'],
            ['nom' => 'United States'],
            ['nom' => 'Germany'],
            // Add more countries as needed
        ];

        // Insert data into the 'pays' table
        DB::table('pays')->insert($pays);
    }
}
