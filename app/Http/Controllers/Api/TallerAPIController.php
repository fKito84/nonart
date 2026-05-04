<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Taller;
use App\Models\CalendarioExcepcion;
use Illuminate\Http\Request;

class TallerAPIController extends Controller
{
    public function index()
    {
        // Busquem tallers
        $talleres = Taller::all();

        // Agafem les excepcions del calendari 
        $excepcions = CalendarioExcepcion::all()->keyBy('data_excepcion');

        // Enviem dades 
        return response()->json([
            'status' => 'success',
            'data' => [
                'talleres' => $talleres,
                'excepcions' => $excepcions
            ]
        ]);
    }

    public function show(Taller $taller)
    {
        // Enviem el detall d'un taller 
        return response()->json([
            'status' => 'success',
            'data' => $taller
        ]);
    }
}