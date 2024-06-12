<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $table = 'livres';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_auteur',
        'isbn',
        'id_editeur',
        'titre',
        'genre',
        'nombre_pages',
        'annee',
        'statut',
        'id_langue',
        'nombre_exemplaires',
        'maison_edition',
        'collection',
    ];

    public function auteur()
    {
        return $this->belongsTo(Auteur::class, 'id_auteur', 'id');
    }
    public function editeur()
    {
        return $this->belongsTo(Editeur::class, 'id_editeur', 'id');
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class, 'id_langue', 'id');
    }
    public function notes()
    {
        return $this->hasMany(Note::class, 'id_livre', 'id');
    }
}



