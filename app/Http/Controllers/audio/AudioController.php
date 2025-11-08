<?php

namespace App\Http\Controllers\Audio;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AudioController extends Controller
{
    public function index()
    {
        $path = resource_path('views/plantillas/audio');
        $archivos = File::files($path);
        $plantillas = [];

        foreach ($archivos as $archivo) {
            $nombre = pathinfo($archivo->getFilename(), PATHINFO_FILENAME);
            $nombre = preg_replace('/(\.blade|\.php)$/i', '', $nombre);
            if (strtolower($nombre) === 'indexaudio') continue;

            $plantillas[] = [
                'nombre' => $nombre,
                'ruta' => route('audio.show', ['archivo' => $nombre])
            ];
        }

        return view('plantillas.audio.indexaudio', compact('plantillas'));
    }

    public function show($archivo)
    {
        $view = "plantillas.audio.$archivo";

        if (strtolower($archivo) === 'indexaudio') {
            abort(404);
        }

        if (!view()->exists($view)) {
            abort(404);
        }

        return view($view);
    }
}
