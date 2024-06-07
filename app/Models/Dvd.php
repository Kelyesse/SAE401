<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
{
    protected $table = 'dvds'; // Nom de la table associée au modèle

    protected $primaryKey = 'id'; // Clé primaire de la table

    protected $fillable = [
        'ian',
        'id_realisateur',
        'genre',
        'titre',
        'id_casting',
        'annee',
        'statut',
        'nombre_exemplaires',
        'id_langue',
        'duree',
        'sous_titres',
    ];

    // Relation avec le réalisateur
    public function realisateur()
    {
        return $this->belongsTo(Realisateur::class, 'id_realisateur');
    }

    public function avis()
    {
        return $this->hasMany(Note::class, 'id_dvd', 'id');
    }


    // Relation avec les langues du DVD
    public function langues()
    {
        return $this->belongsToMany(Langue::class, 'dvdlangues', 'dvd_id', 'langue_id');
    }
}
