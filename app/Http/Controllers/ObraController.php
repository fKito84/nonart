<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;
//Les funcions que no estan actives o desenvolupades son perque o no se si fer-les
// ho perque encara estan per fer, sobretot perque es facin servir ha d'haber 
// la part d'admin desenvolupada i no se si es requisit per la versio minima
class ObraController extends Controller
{
    public function index()
    {
        // agrupo por colecciones , para mostrar separadas 
        $obrasAgrupadas = Obra::all()->groupBy('coleccion');
        
        return view('ObresTenda', compact('obrasAgrupadas'));
    }

    public function create()
    {
        // no la desenvolupo fins que no faci la part d'admin
        //return view ("nuevaObra");
    }

    public function store(Request $request)
    {
        /*/
        try {
            // Validamos los datos del formulario
            $validated = $request->validate([
                'titulo' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
                'tecnica' => 'required|string|max:100',
                'medidas' => 'nullable|string|max:50',
                'precio' => 'required|numeric|min:0',
                'coleccion' => 'required|string',
                'disponible' => 'boolean',
                'imagen' => 'nullable|string|max:500']
                , [
                // Mensajes de error 
                'titulo.required' => 'El títol de l\'obra és obligatori.',
                'titulo.max' => 'El títol no pot superar els 255 caràcters.',
                'tecnica.required' => 'Has d\'especificar la tècnica utilitzada.',
                'precio.required' => 'El preu és obligatori.',
                'precio.numeric' => 'El preu ha de ser un número vàlid.',
                'coleccion.required' => 'Has d\'assignar l\'obra a una col·lecció.',
            ]);
            Obra::create($validated);
            return redirect('obraTenda')->with('success', 'Obra creada correctament!');
        } catch (\Exception $e) {
            
            return back()->with('error', 'Error en crear l\'obra: ' . $e->getMessage())->withInput();
        }
            */
    }

    public function show(Obra $obra)
    {
        return view ("detalleObra",compact('obra'));
    }

    public function edit(Obra $obra)
    {
        // no la desenvolupo fins que no faci la part d'admin
        //return view ("editarObra",compact('obra'));
    }

    public function update(Request $request, Obra $obra)
    {
        /*
        try {
            // Validamos los datos 
            $validated = $request->validate([
                'titulo' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
                'tecnica' => 'required|string|max:100',
                'medidas' => 'nullable|string|max:50',
                'precio' => 'required|numeric|min:0',
                'coleccion' => 'required|string',
                'disponible' => 'boolean',
                'imagen' => 'nullable|string|max:500', 
            ], [
                'titulo.required' => 'El títol de l\'obra és obligatori.',
                'titulo.max' => 'El títol no pot superar els 255 caràcters.',
                'tecnica.required' => 'Has d\'especificar la tècnica utilitzada.',
                'precio.required' => 'El preu és obligatori.',
                'precio.numeric' => 'El preu ha de ser un número vàlid.',
                'coleccion.required' => 'Has d\'assignar l\'obra a una col·lecció.',
            ]); 
            $obra->update($validated);
            return redirect("obrasTenda")->with('success', 'Obra actualitzada correctament!');

        } catch (\Exception $e) {
            return back()->with('error', 'Error en actualitzar l\'obra: ' . $e->getMessage())->withInput();
        }*/
    }

    public function destroy(Obra $obra)
    {
        try {
            $obra->delete();
            return redirect("home")->with('success', 'Obra eliminada correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al eliminar l\'obra : ' . $e->getMessage());
        }
    }
}
