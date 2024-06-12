<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casting extends Model
{
    use HasFactory;

    protected $table = 'castings'; // Nom de la table associée au modèle

    protected $primaryKey = 'id'; // Clé primaire de la table

    protected $fillable = [
        'id_dvd',
        'id_acteur',
    ];

    // Relation avec le DVD du casting
    public function dvd()
    {
        return $this->belongsTo(Dvd::class, 'id_dvd');
    }

    // Relation avec les acteurs du casting
    public function acteurs()
    {
        return $this->belongsTo(Acteur::class, 'id_acteur');
    }
}
