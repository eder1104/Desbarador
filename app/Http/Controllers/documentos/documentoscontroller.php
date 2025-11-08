<?php

namespace App\Http\Controllers\Documentos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class DocumentosController extends Controller
{
    public function index()
    {
        $path = resource_path('views/plantillas/documentos');
        $archivos = File::files($path);
        $documentos = [];

        foreach ($archivos as $archivo) {
            $nombre = pathinfo($archivo->getFilename(), PATHINFO_FILENAME);
            $nombre = preg_replace('/(\.blade|\.php)$/i', '', $nombre);
            if (strtolower($nombre) === 'indexdocumentos') continue;

            $documentos[] = [
                'nombre' => $nombre,
                'ruta' => route('documentos.show', ['archivo' => $nombre])
            ];
        }

        return view('plantillas.documentos.indexdocumentos', compact('documentos'));
    }

    public function show($archivo)
    {
        $archivos = File::files(resource_path('views/plantillas/documentos'));
        $encontrado = null;

        foreach ($archivos as $file) {
            $nombre = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $nombreLimpio = preg_replace('/(\.blade|\.php)$/i', '', $nombre);
            if (strtolower($nombreLimpio) === strtolower($archivo) && strtolower($nombreLimpio) !== 'indexdocumentos') {
                $encontrado = $nombreLimpio;
                break;
            }
        }

        if (!$encontrado) abort(404);

        return view("plantillas.documentos.$encontrado");
    }
}
