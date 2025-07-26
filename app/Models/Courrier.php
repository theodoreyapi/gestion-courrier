<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    protected $fillable = [
        'nombre_courrier',
        'objet_courrier',
        'numero_courrier',
        'nature_niveau',
        'note_courrier',
        'delai_courrier',
        'status_courrier',
        'user_id',
        'bureau_id',
        'categorie_id',
    ];

    protected $table = 'courrier';

    protected $primaryKey = 'id_courrier';
}
