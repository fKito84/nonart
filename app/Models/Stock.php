<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [ 'nom_material', 'descripcio','tecnica','quantitat','preu_unitat',
                            'proveidor','reutilitzable' ];

    protected $casts = [
        'quantitat' => 'integer',
        'preu_unitat' => 'decimal:2',
        'reutilitzable' => 'boolean', 
    ];


    public function reservaStocks()
    {
        return $this->hasMany(ReservaStock::class, 'stock_id');
    }
}