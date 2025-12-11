<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\indexcontroller;
use App\Http\Controllers\OpcionesController;
use App\Http\Controllers\PlantillaController;

use App\Http\Controllers\audio\AudioController;
use App\Http\Controllers\audio\Mp3Controller;
use App\Http\Controllers\audio\WavController;
use App\Http\Controllers\audio\AacController;
use App\Http\Controllers\audio\AiffController;
use App\Http\Controllers\audio\AlacController;
use App\Http\Controllers\audio\FlacController;
use App\Http\Controllers\audio\M4aController;
use App\Http\Controllers\audio\OggController;
use App\Http\Controllers\audio\WmaController;
use App\Http\Controllers\audio\ConvertController as AudioConvertController;

use App\Http\Controllers\documentos\documentoscontroller;
use App\Http\Controllers\documentos\PdfController;
use App\Http\Controllers\documentos\WordController;
use App\Http\Controllers\documentos\ExcelController;
use App\Http\Controllers\documentos\PowerpointController;
use App\Http\Controllers\documentos\TxtController;
use App\Http\Controllers\documentos\RtfController;
use App\Http\Controllers\documentos\CsvController;
use App\Http\Controllers\documentos\HtmlController;
use App\Http\Controllers\documentos\ConvertController as DocumentosConvertController;

use App\Http\Controllers\Imagenes\ImagenesController;
use App\Http\Controllers\Imagenes\JpgController;
use App\Http\Controllers\Imagenes\PngController;
use App\Http\Controllers\Imagenes\JpegController;
use App\Http\Controllers\Imagenes\GifController;
use App\Http\Controllers\Imagenes\WebpController;
use App\Http\Controllers\Imagenes\BmpController;
use App\Http\Controllers\Imagenes\TiffController;
use App\Http\Controllers\Imagenes\SvgController;
use App\Http\Controllers\Imagenes\ConvertController as ImagenesConvertController;

use App\Http\Controllers\video\VideoController;
use App\Http\Controllers\video\Mp4Controller;
use App\Http\Controllers\video\ConvertController as VideoConvertController;

Route::get('/', [indexcontroller::class, 'index'])->name('home');
Route::get('/opciones', [OpcionesController::class, 'index'])->name('opciones.index');

Route::prefix('plantilla/audio')->name('plantillas.audio.')->group(function () {
    Route::get('/', [AudioController::class, 'index'])->name('index');
    Route::get('/Mp3', [Mp3Controller::class, 'index'])->name('mp3');
    Route::get('/Wav', [WavController::class, 'index'])->name('wav');
    Route::get('/aac', [AacController::class, 'index'])->name('aac');
    Route::get('/aiff', [AiffController::class, 'index'])->name('aiff');
    Route::get('/alac', [AlacController::class, 'index'])->name('alac');
    Route::get('/flac', [FlacController::class, 'index'])->name('flac');
    Route::get('/m4a', [M4aController::class, 'index'])->name('m4a');
    Route::get('/ogg', [OggController::class, 'index'])->name('ogg');
    Route::get('/wma', [WmaController::class, 'index'])->name('wma');
    Route::post('/convertir', [AudioConvertController::class, 'convertIndex'])->name('convert.convertIndex');
});

Route::prefix('plantilla/documentos')->name('plantillas.documentos.')->group(function () {
    Route::get('/', [documentoscontroller::class, 'index'])->name('index');
    Route::get('/pdf', [PdfController::class, 'index'])->name('pdf');
    Route::get('/word', [WordController::class, 'index'])->name('word');
    Route::get('/excel', [ExcelController::class, 'index'])->name('excel');
    Route::get('/powerpoint', [PowerpointController::class, 'index'])->name('powerpoint');
    Route::get('/txt', [TxtController::class, 'index'])->name('txt');
    Route::get('/rtf', [RtfController::class, 'index'])->name('rtf');
    Route::get('/csv', [CsvController::class, 'index'])->name('csv');
    Route::get('/html', [HtmlController::class, 'index'])->name('html');
    Route::post('/convertir', [DocumentosConvertController::class, 'convertIndex'])->name('convert.convertIndex');
});

Route::prefix('plantilla/imagenes')->name('plantillas.imagenes.')->group(function () {
    Route::get('/', [ImagenesController::class, 'index'])->name('index');
    Route::get('/jpg', [JpgController::class, 'index'])->name('jpg');
    Route::get('/png', [PngController::class, 'index'])->name('png');
    Route::get('/jpeg', [JpegController::class, 'index'])->name('jpeg');
    Route::get('/gif', [GifController::class, 'index'])->name('gif');
    Route::get('/webp', [WebpController::class, 'index'])->name('webp');
    Route::get('/bmp', [BmpController::class, 'index'])->name('bmp');
    Route::get('/tiff', [TiffController::class, 'index'])->name('tiff');
    Route::get('/svg', [SvgController::class, 'index'])->name('svg');
    Route::post('/convertir', [ImagenesConvertController::class, 'convertIndex'])->name('convert.convertIndex');
});

Route::prefix('plantilla/video')->name('plantillas.video.')->group(function () {
    Route::get('/', [VideoController::class, 'index'])->name('index');
    Route::get('/mp4', [Mp4Controller::class, 'index'])->name('mp4');
    Route::post('/convertir', [VideoConvertController::class, 'convertIndex'])->name('convert.convertIndex');
});

Route::get('/plantilla/ver/{categoria}', [PlantillaController::class, 'ver'])->name('plantilla.ver');

Route::get('/plantilla/hojas_calculo', function () {
    return view('plantillas.hojas_calculo.proximamente');
})->name('plantilla.hojas_calculo');

Route::view('/acerca', 'pages.acerca')->name('acerca');
Route::view('/contacto', 'pages.contacto')->name('contacto');