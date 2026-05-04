<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obra;



class APIController extends Controller
{
    
    public function index() 
    {
        // Busquem les 10 obres a mostrar 
        $obras = Obra::inRandomOrder()->take(10)->get();

        // fiquem al json 
        return response()->json([
            'status' => 'success',
            'data' => [
                'obras_destacadas' => $obras
            ]
        ], 200); 
    }

    // Función para la información (Opcional, si tu app necesita leer textos del servidor)
    public function informacion() 
    {
        return response()->json([
            'status' => 'success',
            'data' => [
                'titulo' => 'Sobre Nonart',
                'texto' => 'Aquí puedes poner el texto de información que leerá la app...'
            ]
        ], 200);
    }
}
