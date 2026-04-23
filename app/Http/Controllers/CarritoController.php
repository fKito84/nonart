<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;
use App\Models\Taller;
use App\Models\Venda;
use App\Models\detalleVenda;
use App\Models\ReservaTaller; 
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{

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
        //Agafo el cistell
        $carrito = session()->get('carrito', []);
        if (empty($carrito)) return redirect()->back()->with('error', 'Cistell buit');

        // Calculem el total
        $totalComanda = 0;
        $totalArticles = 0;
        foreach($carrito as $item) {
            $totalComanda += $item['precio'] * $item['cantidad'];
            $totalArticles += $item['cantidad'];
        }

        // Creo la venda a la taula
        $venda = Venda::create([
            'user_id'         => Auth::id(),
            'quantitat_total' => $totalArticles,
            'total_comanda'   => $totalComanda,
            'metode_pagament' => 'targeta', 
            'estat'           => 'pagat'
        ]);

        // Fico el detall de cada article a la taula detall_venda
        foreach ($carrito as $item) {
            
           
            DetalleVenda::create([
                'venda_id'      => $venda->id,
                'tipus_article' => $item['tipo'],
                'article_id'    => $item['id'],
                'quantitat'     => $item['cantidad'],
                'preu_unitat'   => $item['precio'],
                'subtotal'      => $item['precio'] * $item['cantidad']
            ]);
            // actualitzo l'obra el estat
            if ($item['tipo'] == 'obra') {
                $obra = Obra::find($item['id']);
                if ($obra) {
                    $obra->disponible = false; 
                    $obra->save();
                }
            }

            if ($item['tipo'] == 'taller') {
                // Buscamos el taller para saber su técnica
                $taller = Taller::find($item['id']);

                // mirem si hi ha una resrva amb la mateixa datai comprovo 
                // el total de persones apuntades per canviar l'estat
                // aixo hem servira despres per asignar colors al calendari amb l'estat de la reserva
                $totalApuntados = ReservaTaller::where('taller_id', $item['id'])
                    ->where('data_taller', $item['detalles']['fecha'])
                    ->sum('personas_reserva');

                $nuevoTotal = $totalApuntados + $item['cantidad'];
                $estadoReserva = ($nuevoTotal >= 8) ? 'confirmat' : 'pendent';

                // Creo la reserva
                $reserva = ReservaTaller::create([
                    'user_id'          => Auth::id(),
                    'taller_id'        => $item['id'],
                    'personas_reserva' => $item['cantidad'], 
                    'data_taller'      => $item['detalles']['fecha'], 
                    'estat'            => $estadoReserva, 
                    'notes'            => $item['detalles']['horari'] ?? null
                ]);

                // Si amb aquesta reserva arribem a 8 actualitzo l'estat de pendent a 
                // comfirmada ...
                if ($nuevoTotal >= 8) {
                    ReservaTaller::where('taller_id', $item['id'])
                        ->where('data_taller', $item['detalles']['fecha'])
                        ->update(['estat' => 'confirmada']);
                }

                // Enviem la tecnica i la cantitat de persones per 
                // la resrva d'stock
                $reserva->gestionarStock($taller->tecnica, $item['cantidad']); 
            }
        }

        session()->forget('carrito');
        return redirect()->route('usuari.index')->with('success', 'Compra realitzada amb èxit!');
    }
}
