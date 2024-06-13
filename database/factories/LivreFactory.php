<?php

namespace Database\Factories;

use App\Models\Livre;
use App\Models\Auteur;
use App\Models\Editeur;
use App\Models\Langue;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Livre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genres = ['Action', 'Drame', 'Romance', 'Science-fiction', 'Mystère', 'Thriller', 'Fantaisie', 'Aventure', 'Horreur', 'Dystopie', 'Humour', 'Jeunesse', 'Biographie', 'Histoire', 'Sciences naturelles', 'Sciences sociales', 'Psychologie', 'Économie', 'Politique', 'Religion'];

        return [
            'id_auteur' => Auteur::factory(),
            'isbn' => $this->faker->isbn13,
            'id_editeur' => Editeur::factory(),
            'titre' => $this->faker->sentence(3),
            'genre' => $this->faker->randomElement($genres),
            'nombre_pages' => $this->faker->numberBetween(100, 1000),
            'annee' => $this->faker->year,
            'statut' => $this->faker->randomElement(['disponible', 'indisponible']),
            'id_langue' => $this->faker->numberBetween(1, 5),
            'nombre_exemplaires' => $this->faker->numberBetween(1, 10),
            'imgUrl' => $this->faker->imageUrl(200, 300, 'books', true, 'Faker'),
            'description' => $this->faker->paragraph,
        ];
    }
}
