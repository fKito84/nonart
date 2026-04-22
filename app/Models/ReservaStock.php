<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaStock extends Model
{
    use HasFactory;

   
    protected $table = 'reservas_stocks';

    protected $fillable = ['reserva_id','stock_id', 'quantitat', 'estat' ];

    // RELACIONS


    public function reservaTaller()
    {
        return $this->belongsTo(ReservaTaller::class, 'reserva_id');
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}