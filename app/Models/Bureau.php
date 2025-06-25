<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    protected $fillable = [
        'nom_bureau',
        'status_bureau',
    ];

    protected $table = 'bureau';

    protected $primaryKey = 'id_bureau';
}
