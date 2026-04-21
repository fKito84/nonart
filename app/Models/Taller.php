<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Taller extends Model
{
    use HasFactory;

    protected $fillable = [ 'nom','descripcio','duracio_hores','capacitat_max','preu','actiu'];

    protected $casts = [
        'preu' => 'decimal:2',
        'duracio_hores' =>  'decimal:2',
        'capacitat_max' => 'integer',
        'actiu' => 'boolean',
    ];

    public function reserves()
    {
        // return $this->hasMany(ReservaTaller::class);
    }
}