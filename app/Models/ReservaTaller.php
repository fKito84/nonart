<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservaTaller extends Model
{

    protected $fillable = [ 'user_id',  'taller_id',  'personas_reserva',  'data_taller', 
                            'estat',  'notes' ];


    public function reservarMateriales()
    {
        $taller = $this->talleres;
        $num = $this->personas_reserva; 

        //Materiales según técnica 1 por persona
        $materialesTecnica = Stock::where('reutilitzable', false)
                                ->where('tecnica', $taller->tecnica)
                                ->get();

        foreach ($materialesTecnica as $material) {
            ReservaStock::create([
                'reserva_id' => $this->id,
                'stock_id'   => $material->id,
                'quantitat'  => $num, 
                'estat'      => 'pendent'
            ]);
        }

        // Lienzo 1 por persona
        $lienzo = Stock::where('nom', 'LIKE', '%Lienzo%')
                    ->orWhere('nom', 'LIKE', '%Llenç%')
                    ->first();

        if ($lienzo) {
            ReservaStock::create([
                'reserva_id' => $this->id,
                'stock_id'   => $lienzo->id,
                'quantitat'  => $num,
                'estat'      => 'pendent'
            ]);
        }
    }
}
