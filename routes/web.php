<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\TallerController;

//Cargo rutas par la bienvenida y la redireccion
Route::get('/', [Controller::class,'home']);
Route::get('/home', [Controller::class,'redireccion']);

//Rutas para obras se gestionan desde su controller
Route::resource('obras' , ObraController::class);
//Rutas de talleres se gestionan desde su controller
Route::resource('talleres' , TallerController::class);