<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'nom_categorie',
    ];

    protected $table = 'categorie';

    protected $primaryKey = 'id_categorie';
}
