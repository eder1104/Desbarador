<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PlantillaController extends Controller
{
    public function ver($categoria)
    {
        $ruta = resource_path("views/plantillas/{$categoria}");
        $plantillas = [];

        if (File::exists($ruta)) {
            $archivos = File::allFiles($ruta);

            foreach ($archivos as $archivo) {
                $nombre = pathinfo($archivo->getFilename(), PATHINFO_FILENAME);

                if (strtolower($nombre) === 'index') {
                    continue;
                }

                $nombreLegible = Str::title(preg_replace('/(?<!\ )[A-Z]/', ' $0', $nombre));

                $plantillas[] = [
                    'nombre' => $nombreLegible,
                    'archivo' => $nombre,
                    'ruta' => route('plantilla.detalle', ['categoria' => $categoria, 'nombre' => $nombre]),
                ];
            }
        }

        $vistaIndex = "plantillas.$categoria.index";

        if (!view()->exists($vistaIndex)) {
            abort(404, "No se encontró el index para la categoría $categoria");
        }

        return view($vistaIndex, compact('categoria', 'plantillas'));
    }

    public function detalle($categoria, $nombre)
    {
        $vista = "plantillas.$categoria.$nombre";

        if (!view()->exists($vista)) {
            abort(404);
        }

        return view($vista);
    }
}
