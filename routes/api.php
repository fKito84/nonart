<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthAPIController;
use App\Http\Controllers\Api\CarritoAPIController;
use App\Http\Controllers\Api\ObraAPIController;
use App\Http\Controllers\Api\TallerAPIController;

// Rutes públiques — no necessiten token
Route::apiResource('obras', ObraAPIController::class)->only(['index', 'show']);
Route::apiResource('talleres', TallerAPIController::class)->only(['index', 'show']);

// Autenticació i Registre
Route::post('login', [AuthAPIController::class, 'login']);
Route::post('registro', [AuthAPIController::class, 'registro']);

// Recuperar contrasenya
Route::post('contrasenya', [AuthAPIController::class, 'enviarResetContrasenya']);
Route::post('canviarContrasenya', [AuthAPIController::class, 'resetContrasenyaValidate']);

/*
|--------------------------------------------------------------------------
| RUTES PROTEGIDES amb Token de Sanctum
| L'usuari ha d'estar autenticat per accedir
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum'])->group(function () {

    // Perfil de l'usuari autenticat
    Route::get('/usuario', [AuthAPIController::class, 'verUsuario']);

    // Tancar sessió (destrueix el token al mòbil)
    Route::post('logout', [AuthAPIController::class, 'logout']);

    // Carrito — noms propis per no col·lisionar amb la ruta web
    // La web usa route('carrito.store'), la API usa la URL directa /api/carrito
    Route::apiResource('carrito', CarritoAPIController::class)->names([
        'index'   => 'api.carrito.index',
        'store'   => 'api.carrito.store',
        'show'    => 'api.carrito.show',
        'update'  => 'api.carrito.update',
        'destroy' => 'api.carrito.destroy',
    ]);

    // Processar el pagament del carrito
    Route::post('/carrito/pagar', [CarritoAPIController::class, 'procesarPago'])->name('api.carrito.pagar');

    /*
        RUTES EXCLUSIVES DE L'ADMINISTRADOR
  
    */
    Route::prefix('admin')->group(function () {

        // Tauler de l'administrador a l'App
        Route::get('/', [AuthAPIController::class, 'verUsuarioAdmin']);

        // Obrir / tancar dies del calendari
        Route::post('/toggle-dia', [AuthAPIController::class, 'toggleDisponibilitat']);

        // L'admin pot crear, actualitzar i esborrar obres i tallers
        Route::apiResource('obras', ObraAPIController::class)->except(['index', 'show']);
        Route::apiResource('talleres', TallerAPIController::class)->except(['index', 'show']);
    });

});