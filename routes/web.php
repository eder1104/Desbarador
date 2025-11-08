<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PlantillaController;
use App\Http\Controllers\OpcionesController;
use App\Http\Controllers\Audio\AudioController;
use App\Http\Controllers\Audio\ConvertController as AudioConvertController;
use App\Http\Controllers\Documentos\DocumentosController;
use App\Http\Controllers\Documentos\ConvertController as DocumentosConvertController;
use App\Http\Controllers\Imagenes\ImagenesController;
use App\Http\Controllers\Imagenes\ConvertController as ImagenesConvertController;

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::prefix('plantilla/documentos')->name('documentos.')->group(function () {
    Route::get('/', [DocumentosController::class, 'index'])->name('index');
    Route::get('/{archivo}', [DocumentosController::class, 'show'])->name('show');
    Route::get('/html', [DocumentosController::class, 'show'])->name('html');
    Route::get('/pdf', [DocumentosController::class, 'show'])->name('pdf');
    Route::get('/txt', [DocumentosController::class, 'show'])->name('txt');
    Route::get('/word', [DocumentosController::class, 'show'])->name('word');
    Route::get('/excel', [DocumentosController::class, 'show'])->name('excel');
    Route::get('/powerpoint', [DocumentosController::class, 'show'])->name('powerpoint');
    Route::get('/csv', [DocumentosController::class, 'show'])->name('csv');
    Route::get('/rtf', [DocumentosController::class, 'show'])->name('rtf');
    Route::post('/convert/{formato_origen}', [DocumentosConvertController::class, 'convertIndex'])->name('convert.convertIndex');
});

Route::view('/acerca', 'pages.acerca')->name('acerca');
Route::view('/contacto', 'pages.contacto')->name('contacto');

Route::prefix('plantilla/audio')->name('audio.')->group(function () {
    Route::get('/', [AudioController::class, 'index'])->name('index');
    Route::get('/{archivo}', [AudioController::class, 'show'])->name('show');
    Route::get('/mp3', [AudioController::class, 'show'])->name('mp3');
    Route::get('/wav', [AudioController::class, 'show'])->name('wav');
    Route::get('/ogg', [AudioController::class, 'show'])->name('ogg');
    Route::get('/aac', [AudioController::class, 'show'])->name('aac');
    Route::get('/flac', [AudioController::class, 'show'])->name('flac');
    Route::get('/m4a', [AudioController::class, 'show'])->name('m4a');
    Route::get('/wma', [AudioController::class, 'show'])->name('wma');
    Route::get('/aiff', [AudioController::class, 'show'])->name('aiff');
    Route::get('/alac', [AudioController::class, 'show'])->name('alac');
    Route::post('/convert/{formato_origen}', [AudioConvertController::class, 'convertIndex'])->name('convert.convertIndex');
});

Route::get('/plantilla/{categoria}', [PlantillaController::class, 'ver'])->name('plantilla.ver');
Route::get('/plantilla/{categoria}/{nombre}', [PlantillaController::class, 'detalle'])->name('plantilla.detalle');

Route::get('/plantilla/hojas_calculo', function () {
    return view('plantillas.hojas_calculo.proximamente');
})->name('plantilla.hojas_calculo');

Route::prefix('plantilla/imagenes')->name('imagenes.')->group(function () {
    Route::get('/', [ImagenesController::class, 'index'])->name('index');
    Route::get('/{archivo}', [ImagenesController::class, 'show'])->name('show');
    Route::get('/jpg', [ImagenesController::class, 'show'])->name('jpg');
    Route::get('/jpeg', [ImagenesController::class, 'show'])->name('jpeg');
    Route::get('/png', [ImagenesController::class, 'show'])->name('png');
    Route::get('/gif', [ImagenesController::class, 'show'])->name('gif');
    Route::get('/svg', [ImagenesController::class, 'show'])->name('svg');
    Route::get('/webp', [ImagenesController::class, 'show'])->name('webp');
    Route::get('/bmp', [ImagenesController::class, 'show'])->name('bmp');
    Route::get('/tiff', [ImagenesController::class, 'show'])->name('tiff');
    Route::post('/convert/{formato_origen}', [ImagenesConvertController::class, 'convertIndex'])->name('convert.convertIndex');
});

Route::get('/opciones', [OpcionesController::class, 'index'])->name('opciones.index');
