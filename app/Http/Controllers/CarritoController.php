<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;
use App\Models\Taller;
use App\Models\Venda;
use App\Models\ReservaTaller; 
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // carguem el carret amb les dades del session
        $carrito = session()->get('carrito', []);
        
        // calculem
        $subtotal = 0;
        foreach ($carrito as $item) {
            $subtotal += $item['precio'] * $item['cantidad'];
        }

        $iva = $subtotal * 0.21;
        $total_amb_iva = $subtotal + $iva;

        return view("carrito", compact('carrito', 'subtotal', 'iva', 'total_amb_iva'));
    }
   
    public function store(Request $request)
    {
        $carrito = session()->get('carrito', []);
        // AFEGIR UNA OBRA  
        if ($request->has('obra_id')) {
            $id = $request->input('obra_id');
            $obra = Obra::findOrFail($id);

            if (!$obra->disponible) {
                return back()->with('error', 'Ho sentim, aquesta obra ja ha estat venuda.');
            }

            // Creamos una clave única para el array
            $cartKey = 'obra_' . $obra->id;

            if (isset($carrito[$cartKey])) {
                return back()->with('info', 'Aquesta obra ja és al teu carret.');
            }

            $carrito[$cartKey] = [
                "id" => $obra->id,
                "titulo" => $obra->titulo,
                "precio" => $obra->precio,
                "imagen" => $obra->imagen,
                "cantidad" => 1, 
                "tipo" => "obra" 
            ];

            session()->put('carrito', $carrito);
            return back()->with('success', 'Obra afegida al carret correctament!');
        }

        // AFEGIR UNA RESERVA DE TALLER
        if ($request->has('taller_id')) {
        
            $request->validate([
                'taller_id' => 'required',
                'fecha' => 'required|date',
                'horari' => 'required|string',
                'cantidad' => 'required|integer|min:1' // Validamos la cantidad
            ]);

            $id = $request->input('taller_id');
            $taller = Taller::findOrFail($id);
            $fecha = $request->input('fecha');
            $horari = $request->input('horari');
            $cantidad = $request->input('cantidad'); // Recogemos la cantidad
            
            $cartKey = 'taller_' . $taller->id . '_' . $fecha . '_' . $horari;

            if (isset($carrito[$cartKey])) {
                // Si ya lo tiene en el carrito, le sumamos las plazas nuevas
                $carrito[$cartKey]['cantidad'] += $cantidad;
                session()->put('carrito', $carrito);
                return back()->with('success', 'Hem afegit més places a la teva reserva.');
            }

            $carrito[$cartKey] = [
                "id" => $taller->id,
                "titulo" => $taller->nom . ' (Data: ' . date('d/m/Y', strtotime($fecha)) . ' - ' . $horari . ')',
                "precio" => $taller->preu, 
                "imagen" => 'talleres/fotoTaller.png', 
                "cantidad" => $cantidad, 
                "tipo" => "taller",
                "detalles" => [
                    "fecha" => $fecha,
                    "horari" => $horari
                ]
            ];

            session()->put('carrito', $carrito);
            return back()->with('success', 'Reserva afegida al carret!');
        }

        return back()->with('error', 'No s\'ha pogut identificar l\'article.');
    }
   
    public function show(string $id)
    {
        //
    }

    /*
      No es pot editar desde el carret ni actualitzar
    
    */
   
    public function destroy(string $id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return back()->with('success', 'Article eliminat del carret.');
        
    }
    
    public function procesarPago(Request $request)
    {
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('error', 'El teu carret està buit.');
        }
        // comfirmacio autoritzat
        $userId = Auth::id(); 
        foreach ($carrito as $item) {
            if ($item['tipo'] == 'obra') {
                Venda::create([
                    'user_id' => $userId,
                    'obra_id' => $item['id'],
                    'preu_final' => $item['precio'],
                    'data_venda' => now(),
                    'estat_enviament' => 'pendent'
                ]);

            } elseif ($item['tipo'] == 'taller') {
            //resrvar taller
            $reserva = ReservaTaller::create([
                'user_id'          => $userId,
                'taller_id'        => $item['id'],
                'personas_reserva' => $item['cantidad'], // <-- Guardamos el número real
                'data_taller'      => $item['detalles']['fecha'], 
                'estat'            => 'pendent', 
                'notes'            => $item['detalles']['horari'] // Podemos guardar aquí el horario
            ]);

            // resrvamos los materiales para la reserva stock materiales
            $reserva->reservarMateriales(); 
        }
        }
        // Buido el cistell 
        session()->forget('carrito');

        // Redirigimos al panel del usuario
        return redirect()->route('usuari.index')->with('success', 'Compra realitzada amb èxit!');
    }
}
