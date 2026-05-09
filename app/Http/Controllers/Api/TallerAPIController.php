<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Taller;
use App\Models\CalendarioExcepcion;
use App\Models\ReservaTaller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Necessari per llegir carpetes

class TallerAPIController extends Controller
{
    public function index()
    {
        // 1. Tallers BD
        $talleres = Taller::all();

        // 2. Excepcions calendari
        $excepcions = CalendarioExcepcion::all()->keyBy('data_excepcion');

        // 3. Ocupació real
        $reservasTodas = ReservaTaller::with(['taller'])->get();
        $eventosCalendario = [];
        
        foreach($reservasTodas as $reserva) {
            $dataNeta = \Carbon\Carbon::parse($reserva->data_taller)->format('Y-m-d');
            
            if (!isset($eventosCalendario[$dataNeta])) {
                $eventosCalendario[$dataNeta] = [];
            }

            $trobat = false;
            foreach ($eventosCalendario[$dataNeta] as &$event) {
                if ($event['taller'] === ($reserva->taller?->nom ?? 'Taller') && $event['horari'] === $reserva->notes) {
                    $event['ocupacio'] += $reserva->personas_reserva;
                    $trobat = true;
                    break;
                }
            }

            if (!$trobat) {
                $eventosCalendario[$dataNeta][] = [
                    'taller' => $reserva->taller?->nom ?? 'Taller',
                    'horari' => $reserva->notes,
                    'ocupacio' => $reserva->personas_reserva
                ];
            }
        }

        // Llegeix fotos carpeta Laravel
        $ruta = public_path('images/talleres');
        $imatges = [];
        if (File::exists($ruta)) {
            $arxius = File::files($ruta);
            $imatges = array_map(function($f) { return $f->getFilename(); }, $arxius);
        }

        // 5. Retorna dades
        return response()->json([
            'status' => 'success',
            'data' => [
                'talleres' => $talleres,
                'excepcions' => $excepcions,
                'eventosCalendario' => $eventosCalendario,
                'imagenes_galeria' => $imatges // Afegeix fotos al JSON
            ]
        ]);
    }
}