<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Taller extends Model
{
    use HasFactory;

    protected $fillable = [ 'nom','descripcio','tecnica','duracio_hores','capacitat_max','preu','actiu'];

    protected $casts = [
        'preu' => 'decimal:2',
        'duracio_hores' =>  'decimal:2',
        'capacitat_max' => 'integer',
        'actiu' => 'boolean',
    ];

    public function reserva_tallers()
    {
        return $this->hasMany(ReservaTaller::class);
    }

    // Relació amb l'estoc (Un taller necessita diversos materials)
    public function stocks()
    {
        return $this->belongsToMany(Stock::class, 'taller_stock') 
                    ->withPivot('quantitat_per_persona');
    }
}