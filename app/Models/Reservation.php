<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_utilisateur',
        'id_ressource',
        'type_ressource',
        'date_debut',
        'date_retour_prevue',
        'statut'
    ];

    protected $dates = [
        'date_debut',
        'date_retour_prevue',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur', 'id');
    }

    public function ressource()
    {
        if ($this->type_ressource === 'livre') {
            return $this->belongsTo(Livre::class, 'id_ressource');
        } elseif ($this->type_ressource === 'dvd') {
            return $this->belongsTo(Dvd::class, 'id_ressource');
        } else {
            return null;
        }
    }
}
