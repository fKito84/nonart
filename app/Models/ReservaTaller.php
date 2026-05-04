<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail; 
use App\Mail\AlertaStockMail;


class ReservaTaller extends Model
{
    protected $table = 'reserva_talleres'; 
    protected $fillable = [ 'user_id',  'taller_id',  'personas_reserva',  'data_taller', 
                            'estat',  'notes' ];


    public function taller()
    {
        return $this->belongsTo(Taller::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    public function reservaStocks()
    {
        return $this->hasMany(ReservaStock::class, 'reserva_id');
    }

     // gestio de el stock
    public function gestionarStock($tecnicaTaller, $cantidadPersonas)
    {
        // busquem els materials que siguin iguals 
        // que els de la tecnica i que no siguin reutilitzables
        $materialesADestinar = Stock::where('reutilitzable', 0)
            ->where(function($query) use ($tecnicaTaller) {
                $query->where('tecnica', $tecnicaTaller)
                    ->orWhere('nom_material', 'LIKE', '%lienzo%');
            })->get();
        Log::info("Tècnica cercada: " . $tecnicaTaller);
        Log::info("Materials trobats: " . $materialesADestinar->count());
        foreach ($materialesADestinar as $material) {
            
            // Calculo el que es gasta de cada material
            $totalConsumido = 1 * $cantidadPersonas;

            // poso a la taula lo que es consumeix d'aquest material a la reserva 
            ReservaStock::create([
                'reserva_id'          => $this->id,
                'stock_id'            => $material->id,
                'quantitat_consumida' => $totalConsumido 
            ]);

            // actualitzem cada material
            $material->quantitat -= $totalConsumido;
            $material->save();

            // Si baixa de 20 Alerta d'aquest material
            if ($material->quantitat < 20) {
                $this->alertaAdmin($material);
            }
        }
    }
    // enviem alerta a l'admin
    private function alertaAdmin($material)
    {
        $mensaje = "ALERTA DE STOCK: Queden només {$material->quantitat} unitats de {$material->nom_material}!";

        $admins = User::where('role', 'admin')->get();
        if ($admins->isNotEmpty()) {
            Mail::to($admins)->send(new AlertaStockMail($material));
        }
       
        Log::warning($mensaje);

    }

}
    

    

    


