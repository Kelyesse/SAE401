<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Realisateur extends Model
{
    protected $table = 'realisateurs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nom',
        'prenom',
        'biographie',
        'id_nationalite'
    ];

    public $timestamps = true;

    public function nationalite()
    {
        return $this->belongsTo(Pays::class, 'id_nationalite');
    }

    public function realisateur()
    {
        return $this->belongsTo(Realisateur::class, 'id_realisateur', 'id');
    }

}
