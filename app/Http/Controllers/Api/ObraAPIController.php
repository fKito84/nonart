<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Obra;
use Illuminate\Http\Request;

class ObraAPIController extends Controller
{
    public function index()
    {
        // Agrupem obres per col·leccions 
        $obrasAgrupadas = Obra::all()->groupBy('coleccion');
        
        // Enviem les obres 
        return response()->json([
            'status' => 'success',
            'data' => $obrasAgrupadas
        ]);
    }

    public function show(Obra $obra)
    {
        // Enviem el detall obra
        return response()->json([
            'status' => 'success',
            'data' => $obra
        ]);
    }
}