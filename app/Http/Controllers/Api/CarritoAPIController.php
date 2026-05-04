<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obra;
use App\Models\Taller;
use App\Models\Venda;
use App\Models\DetalleVenda;
use App\Models\ReservaTaller; 
use Illuminate\Support\Facades\Auth;

class CarritoAPIController extends Controller
{
    // L'App gestiona el carret i només crida per pagar
    public function procesarPago(Request $request)
    {
        // Rebem les dades del carret
        $carrito = $request->input('carrito', []);
        
        if (empty($carrito)) {
            return response()->json(['status' => 'error', 'message' => 'Carret buit'], 400);
        }

        // Mirem si les obres segueixen lliures
        foreach ($carrito as $key => $item) {
            if ($item['tipo'] == 'obra') {
                $obra = Obra::find($item['id']);
                if (!$obra || !$obra->disponible) {
                    return response()->json([
                        'status' => 'error', 
                        'message' => 'L\'obra ja no està disponible.'
                    ], 409);
                }
            }
        }

        // Sumem totals
        $totalComanda = 0;
        $totalArticles = 0;
        foreach($carrito as $item) {
            $totalComanda += $item['precio'] * $item['cantidad'];
            $totalArticles += $item['cantidad'];
        }

        // Creem la venda
        $venda = Venda::create([
            'user_id'         => Auth::id(),
            'quantitat_total' => $totalArticles,
            'total_comanda'   => $totalComanda,
            'metode_pagament' => 'targeta', 
            'estat'           => 'pagat'
        ]);

        // Guardem detalls i actualitzem estocs
        foreach ($carrito as $item) {
            DetalleVenda::create([
                'venda_id'      => $venda->id,
                'tipus_article' => $item['tipo'],
                'article_id'    => $item['id'],
                'quantitat'     => $item['cantidad'],
                'preu_unitat'   => $item['precio'],
                'subtotal'      => $item['precio'] * $item['cantidad']
            ]);
            
            // Si és obra, la tanquem
            if ($item['tipo'] == 'obra') {
                $obra = Obra::find($item['id']);
                $obra->disponible = false; 
                $obra->save();
            }

            // Si és taller, fem la reserva
            if ($item['tipo'] == 'taller') {
                $taller = Taller::find($item['id']);

                $totalApuntados = ReservaTaller::where('taller_id', $item['id'])
                    ->where('data_taller', $item['detalles']['fecha'])
                    ->where('notes', $item['detalles']['horari']) 
                    ->sum('personas_reserva');

                $nuevoTotal = $totalApuntados + $item['cantidad'];
                $estadoReserva = ($nuevoTotal >= 8) ? 'confirmada' : 'pendent';

                $reserva = ReservaTaller::create([
                    'user_id'          => Auth::id(),
                    'taller_id'        => $item['id'],
                    'personas_reserva' => $item['cantidad'], 
                    'data_taller'      => $item['detalles']['fecha'], 
                    'estat'            => $estadoReserva, 
                    'notes'            => $item['detalles']['horari'] ?? null
                ]);

                // Confirmem si som 8 o més
                if ($nuevoTotal >= 8) {
                    ReservaTaller::where('taller_id', $item['id'])
                        ->where('data_taller', $item['detalles']['fecha'])
                        ->where('notes', $item['detalles']['horari']) 
                        ->update(['estat' => 'confirmada']);
                }

                // Descomptem materials
                $reserva->gestionarStock($taller->tecnica, $item['cantidad']); 
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Compra feta!',
            'venda_id' => $venda->id
        ]);
    }
}