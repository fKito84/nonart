<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Importamos els nous controladors de la API 
use App\Http\Controllers\Api\APIController;
use App\Http\Controllers\Api\ObraAPIController;
use App\Http\Controllers\Api\TallerAPIController;
use App\Http\Controllers\Api\CarritoAPIController;
use App\Http\Controllers\Api\AuthAPIController;

/*
RUTAS PÚBLICAS 
*/

// Pantalla de Inici 
Route::get('/home', [APIController::class, 'index']);
Route::get('/informacion', [APIController::class, 'informacion']);

// Rutes obres y tallers 
Route::apiResource('obras', ObraAPIController::class)->only(['index', 'show']);
Route::apiResource('talleres', TallerAPIController::class)->only(['index', 'show']);

// Autenticació i Registre 
Route::post('login', [AuthAPIController::class, 'login']);
Route::post('registro', [AuthAPIController::class, 'registro']);

// Recuperar contrasenya
Route::post('contrasenya', [AuthAPIController::class, 'enviarResetContrasenya']);
Route::post('canviarContrasenya', [AuthAPIController::class, 'resetContrasenyaValidate']);


/*
 RUTAS PROTEGIDES amb Token de Sanctum 
*/
Route::middleware(['auth:sanctum'])->group(function () {
    
    // Perfil del Usuario
    Route::get('/usuario', [AuthAPIController::class, 'verUsuario']);
    
    // Cerrar sesión (Destruye el token en el móvil)
    Route::post('logout', [AuthAPIController::class, 'logout']);

    // Carrito de compras (El usuario debe estar logueado para comprar)
    Route::apiResource('carrito', CarritoAPIController::class);
    Route::post('/carrito/pagar', [CarritoAPIController::class, 'procesarPago']);

    // --- RUTAS EXCLUSIVAS DEL ADMINISTRADOR ---
    // (Dentro de los controladores tendremos que verificar que el usuario tiene 'role' == 'admin')
    Route::prefix('admin')->group(function () {
        Route::get('/', [AuthAPIController::class, 'verUsuarioAdmin']); // Dashboard del admin en la App
        Route::post('/toggle-dia', [AuthAPIController::class, 'toggleDisponibilitat']); // Abrir/cerrar días
        
        // El admin sí puede crear, actualizar y borrar obras/talleres
        Route::apiResource('obras', ObraAPIController::class)->except(['index', 'show']);
        Route::apiResource('talleres', TallerAPIController::class)->except(['index', 'show']);
    });
});