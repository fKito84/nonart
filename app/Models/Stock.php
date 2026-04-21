<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [ 'nom_material', 'descripcio','quantitat','quantitat_minima','preu_unitat',
                            'proveidor','reutilitzable' ];

    protected $casts = [
        'quantitat' => 'integer',
        'quantitat_minima' => 'integer',
        'preu_unitat' => 'decimal:2',
        'reutilitzable' => 'boolean', 
    ];
}