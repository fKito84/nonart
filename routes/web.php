<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\TallerController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AuthController;

//Cargo rutas par la bienvenida y la redireccion
Route::get('/', [Controller::class,'home']);
Route::get('/home', [Controller::class,'redireccion']);

Route::get('/informacion', [Controller::class,'informacion']);

//RESOURCE de rutas para obras, se gestionan desde su controller
Route::resource('obras' , ObraController::class);
//RESOURCE de rutas de talleres, se gestionan desde su controller
Route::resource('talleres' , TallerController::class);

//Rutas del carrito, se gestionan desde su controller
Route::get('login', [AuthController::class, 'LoginHome'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');


//Recuperar contrasenyes 

Route::get('contrasenya', [AuthController::class, 'recuperarContrasenya'])->name('password.request')->middleware('guest');
Route::post('contrasenya', [AuthController::class, 'enviarResetContrasenya'])->name('password.email')->middleware('guest');

// Rutas para recuperar contraseña reset
Route::get('canviarContrasenya/{token}', [AuthController::class, 'resetContrasenya'])->name('password.reset')->middleware('guest');
Route::post('canviarContrasenya', [AuthController::class, 'resetContrasenyaValidate'])->name('password.update')->middleware('guest');

// Rutas de registro nuevo usuario 
// Rutas de Registro
Route::get('registro', [AuthController::class, 'registroNuevo'])->name('register')->middleware('guest');
Route::post('registro', [AuthController::class, 'registro'])->name('register.post')->middleware('guest');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/usuario', [AuthController::class, 'verUsuario'])->name('usuari.index');
    //RESOURCE de rutas del carrito, se gestionan desde su controller
    Route::resource('carrito' , CarritoController::class);

    Route::post('/carrito/pagar', [CarritoController::class, 'procesarPago'])->name('carrito.pagar');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

});



//Llençar el servidor .... en aplicacio laravel nomes encendre aplicació i iniciar servidor

//En Visual Code ->Terminal del projecte-> php artisan serve ->Navegador aquesta URL->control+click->http://127.0.0.1:8000


//Tens usuari creat 
/* \App\Models\User::create([
            'name' => 'Marta',
            'email' => 'marta.agullo.online@mataro.epiaedu.cat',
            'password' => Hash::make('projecte'),
            'role' => 'client',
            'phone' => '637799999',
        ]);

*/
# Carpeta d'imatges fora ....
# estan al drive que te compartit
// I han d'anar a la carpeta public/images/  arrosegues obras i talleres  
// carpeta drive  https://drive.google.com/drive/folders/1X8tkrU3NiBKo1DTzSD0D2FivqQTyx7Cu?usp=drive_link


// la recuperacio de contrasenyes d'usuari ho porta al servei 
//  mailtrap per fer proves de correu i funciona