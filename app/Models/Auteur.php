<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    protected $table = 'auteurs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nom',
        'prenom',
        'bibliographie',
        'id_nationalite'
    ];

    public $timestamps = true;

    // Relation avec le pays de nationalité
    public function nationalite()
    {
        return $this->belongsTo(Pays::class, 'id_nationalite');
    }

    // Relation avec les livres écrits par cet auteur
    public function livres()
    {
        return $this->hasMany(Livre::class, 'id_auteur');
    }
}
