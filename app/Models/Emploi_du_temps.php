<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi_du_temps extends Model
{
    use HasFactory;

    protected $fillable = [
        'idsalle',
        'idprof',
        'idclasse',
        'cours',
        'date'
    ];
}
?>
