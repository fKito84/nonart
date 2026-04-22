<?php
namespace App\Http\Controllers;
use App\Models\Obra;

class Controller
{
  
    //Cargo las vistas de bienvenida y de redirección
    function home() {
        //Agafo un random de 10 obres per mostrar al Inici
        $obras = Obra::inRandomOrder()->take(10)->get();
        return view ('Home',['obras'=>$obras]);
    }
    function redireccion() {
        return redirect('/');
    }

    //Carrego vista informació
    function informacion() {
        
        return view('informacion');
    }
}
