<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    protected $table = 'langues'; // Nom de la table associée au modèle

    protected $primaryKey = 'id'; // Clé primaire de la table

    protected $fillable = [
        'nom',
        // Ajoute d'autres colonnes ici si nécessaire
    ];

    // Relation avec les DVD ayant cette langue
    public function dvds()
    {
        return $this->hasMany(Dvd::class, 'langue_id');
    }

    // Relation avec les livres ayant cette langue
    public function livres()
    {
        return $this->hasMany(Livre::class, 'langue_id');
    }
}
