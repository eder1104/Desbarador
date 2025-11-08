<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class indexcontroller extends Controller
{
    public function index()
    {
        $plantillas = [];

        $path = resource_path('views/plantillas');

        if (File::exists($path)) {
            $archivos = File::allFiles($path);

            foreach ($archivos as $archivo) {
                $nombre = pathinfo($archivo->getFilename(), PATHINFO_FILENAME);

                $nombreLegible = preg_replace('/(?<!\ )[A-Z]/', ' $0', $nombre);
                $nombreLegible = trim($nombreLegible);

                $plantillas[] = [
                    'archivo' => $archivo->getFilename(),
                    'nombre' => $nombreLegible,
                ];
            }
        }

        return view('index', compact('plantillas'));
    }
}
