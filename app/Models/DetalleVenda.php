<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenda extends Model
{
    use HasFactory;

    protected $table = 'detalles_venda'; 

    protected $fillable = [ 'venda_id','tipus_article','article_id',
                         'quantitat', 'preu_unitat', 'subtotal' ];

    // RELACIONES

    public function venda() {
        return $this->belongsTo(Venda::class, 'venda_id');
    }

    public function obra() {
        return $this->belongsTo(Obra::class, 'article_id');
    }


    public function taller() {
        return $this->belongsTo(Taller::class, 'article_id');
    }
}