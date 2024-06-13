<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editeur extends Model
{
    use HasFactory;
    protected $table = 'editeurs'; // Nom de la table associée au modèle

    protected $primaryKey = 'id'; // Clé primaire de la table


    // Relation avec les livres publiés par cet éditeur
    public function livres()
    {
        return $this->hasMany(Livre::class, 'editeur_id');
    }
}
