<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'note';

    protected $fillable = [
        'id_utilisateur',
        'id_livre',
        'id_dvd',
        'type_ressource',
        'note',
        'commentaire',
        'date_note',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur', 'id');
    }

    public function livre()
    {
        return $this->belongsTo(Livre::class, 'id_livre', 'id');
    }

    public function dvd()
    {
        return $this->belongsTo(Dvd::class, 'id_dvd', 'id');
    }
}
