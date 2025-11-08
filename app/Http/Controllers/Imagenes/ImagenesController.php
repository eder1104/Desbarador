<?php

namespace App\Http\Controllers\Imagenes;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ImagenesController extends Controller
{
    public function index()
    {
        $path = resource_path('views/plantillas/imagenes');
        $archivos = File::files($path);
        $imagenes = [];

        foreach ($archivos as $archivo) {
            $nombre = pathinfo($archivo->getFilename(), PATHINFO_FILENAME);
            $nombre = preg_replace('/(\.blade|\.php)$/i', '', $nombre);
            if (strtolower($nombre) === 'indeximagenes') continue;

            $imagenes[] = [
                'nombre' => $nombre,
                'ruta' => route('imagenes.show', ['archivo' => $nombre])
            ];
        }

        return view('plantillas.imagenes.indeximagenes', compact('imagenes'));
    }

    public function show($archivo)
    {
        $archivos = File::files(resource_path('views/plantillas/imagenes'));
        $encontrado = null;

        foreach ($archivos as $file) {
            $nombre = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $nombreLimpio = preg_replace('/(\.blade|\.php)$/i', '', $nombre);
            if (strtolower($nombreLimpio) === strtolower($archivo) && strtolower($nombreLimpio) !== 'indeximagenes') {
                $encontrado = $nombreLimpio;
                break;
            }
        }

        if (!$encontrado) abort(404);

        return view("plantillas.imagenes.$encontrado");
    }
}
