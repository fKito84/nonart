<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\CalendarioExcepcion;
//Les funcions que no estan actives o desenvolupades son perque o no se si fer-les
// ho perque encara estan per fer, sobretot perque es facin servir ha d'haber 
// la part d'admin desenvolupada i no se si es requisit per la versio minima
class TallerController extends Controller
{
    public function index()
    {
        $talleres = Taller::all();
    
        // carpeta de imágenes de talleres
        $rutaCarpeta = public_path('images/talleres');
        $imagenes = [];

        if (File::exists($rutaCarpeta)) {
            $files = File::files($rutaCarpeta);
            $nombres= array_map(fn($file) => $file->getFilename(),$files);
             
            $imagenes = collect($nombres)->shuffle()->take(16);
        }
        // Afegim les exepcions dels calendaris 
        $excepcions = CalendarioExcepcion::all()->keyBy('data_excepcion');

        return view('talleres', compact('talleres', 'imagenes','excepcions'));
    }


    public function create()
    {
        // no la desenvolupo fins que no faci la part d'admin
        // return view("nuevoTaller");
    }

    public function store(Request $request)
    {
        /*
        try {
            // Validem les dades del formulari
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'descripcio' => 'nullable|string',
                'duracio_hores' => 'required|numeric|min:0.5', // Acepta decimales (ej. 2.5)
                'capacitat_max' => 'required|integer|min:1',
                'preu' => 'required|numeric|min:0',
                'actiu' => 'boolean',
            ], [
                // Missatges d'error personalitzats
                'nom.required' => 'El nom del taller és obligatori.',
                'duracio_hores.required' => 'Has d\'indicar la duració en hores.',
                'duracio_hores.numeric' => 'La duració ha de ser un número (pots usar decimals com 2.5).',
                'capacitat_max.required' => 'L\'aforament màxim és obligatori.',
                'capacitat_max.integer' => 'La capacitat ha de ser un número enter.',
                'preu.required' => 'El preu és obligatori.',
                'preu.numeric' => 'El preu ha de ser un número vàlid.',
            ]);

            // si no marca en el formulari el deixem desactivat
            $validated['actiu'] = $request->has('actiu') ? true : false;
            Taller::create($validated);
            return redirect('talleres')->with('success', 'Taller creat correctament!');

        } catch (\Exception $e) {
            // Devolvemos el error sin perder los datos que el usuario ya había escrito
            return back()->with('error', 'Error al crear el taller: ' . $e->getMessage())->withInput();
        }*/
    }

    public function show(Taller $taller)
    {
        //No hi ha detall del taller ....
    }

    public function edit(Taller $taller)
    {
        // no la desenvolupo fins que no faci la part d'admin
        // return view("editarTaller", compact('taller'));
    }

    public function update(Request $request, Taller $taller)
    {
        /*
        try {
            // Validamos los nuevos datos
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'descripcio' => 'nullable|string',
                'duracio_hores' => 'required|numeric|min:0.5',
                'capacitat_max' => 'required|integer|min:1',
                'preu' => 'required|numeric|min:0',
                'actiu' => 'boolean',
            ], [
                'nom.required' => 'El nom del taller és obligatori.',
                'duracio_hores.required' => 'Has d\'indicar la duració en hores.',
                'duracio_hores.numeric' => 'La duració ha de ser un número (pots usar decimals com 2.5).',
                'capacitat_max.required' => 'L\'aforament màxim és obligatori.',
                'capacitat_max.integer' => 'La capacitat ha de ser un número enter.',
                'preu.required' => 'El preu és obligatori.',
                'preu.numeric' => 'El preu ha de ser un número vàlid.',
            ]);

            $validated['actiu'] = $request->has('actiu') ? true : false;
            // Actualitzem el taller
            $taller->update($validated);
            return redirect("talleres")->with('success', 'Taller actualitzat correctament!');

        } catch (\Exception $e) {
            return back()->with('error', 'Error en actualitzar el taller: ' . $e->getMessage())->withInput();
        }*/
    }

    public function destroy(Taller $taller)
    {
        try {
            // Eliminem el taller
            $taller->delete();
            return redirect("talleres")->with('success', 'Taller eliminat correctament!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al eliminar el taller: ' . $e->getMessage());
        }
    }
}