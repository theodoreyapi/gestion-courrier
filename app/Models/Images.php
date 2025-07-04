<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
     protected $fillable = [
        'fichier_image',
        'courrier_id',
    ];

    protected $table = 'images';

    protected $primaryKey = 'id_image';
}
