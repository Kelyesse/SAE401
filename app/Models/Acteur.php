<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acteur extends Model
{
    protected $table = 'acteurs'; // Nom de la table associée au modèle

    protected $primaryKey = 'id'; // Clé primaire de la table

    protected $fillable = [
        'nom',
    ];

    // Relation avec la nationalité de l'acteur
    public function nationalite()
    {
        return $this->belongsTo(Pays::class, 'id_nationalite');
    }

    // Relation avec les DVDs où l'acteur a joué
    public function dvds()
    {
        return $this->belongsToMany(Dvd::class, 'castings', 'id_acteur', 'id_dvd');
    }
}
