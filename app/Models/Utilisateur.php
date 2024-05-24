<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table = 'utilisateurs'; // Nom de la table associée au modèle

    protected $primaryKey = 'id'; // Clé primaire de la table

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
        'type_utilisateur',
        'adresse',
        'ville',
        'complement',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
