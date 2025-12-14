<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexcontroller;
use App\Http\Controllers\OpcionesController;
use App\Http\Controllers\PlantillaController;

Route::get('/', [indexcontroller::class, 'index'])->name('home');
Route::get('/opciones', [OpcionesController::class, 'index'])->name('opciones.index');
Route::view('/acerca', 'pages.acerca')->name('acerca');
Route::view('/contacto', 'pages.contacto')->name('contacto');

Route::get('/plantilla/hojas_calculo', function () {
    return view('plantillas.hojas_calculo.proximamente');
})->name('plantilla.hojas_calculo');

Route::post('/plantilla/{categoria}/convertir', [PlantillaController::class, 'convertir'])->name('plantilla.convertir');

Route::get('/plantilla/{categoria}', [PlantillaController::class, 'verCategoria'])->name('plantilla.ver');
Route::get('/plantilla/{categoria}/{archivo}', [PlantillaController::class, 'verArchivo'])->name('plantilla.archivo');