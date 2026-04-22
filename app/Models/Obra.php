<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Obra extends Model
{
    use HasFactory;

    protected $fillable = [ 'titulo','descripcion','tecnica', 'medidas','precio', 'coleccion',
                            'disponible','imagen'];
    protected $casts = [
        'precio' => 'decimal:2',
        'disponible' => 'boolean',
    ];

  
    public function venda()
    {
        
        //return $this->hasMany(Venda::class); 
    }
}
